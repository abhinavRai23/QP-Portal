<?php
	include '../include/secure_exam.php';
	include '../include/header.php';
	
?>
<style>
.diff{
	font-weight: bold;
	margin-bottom: 3px;
	margin-right:5px;
	font-size: 14px;

}
.data{
	color:rgb(94, 59, 59);
	font-size: 14px;
	
}
.mytable>tbody>tr>td{
	  border-top: 1px solid #fff;
}
.mytable{
	border-bottom:1px solid #ddd;
	margin-bottom: 5%;
}
#subtable{
	font-size: 12px;
}
</style>
<div class="panel-heading">
	<center>
    	<div class="header">Allot Branch</div>
    </center>
</div>
<div class="panel-body" id="panel-body">
 <?php
	if(isset($_POST['id'])) {
		// header('Location: allot_coord.php');
		$coid=$_POST['id'];
	$data = $obj->get_user_details($conn,$coid);
	if(isset($_POST['Allot']))
		{	
			$branches = $_POST['branches'];
			$userid = $_POST['id'];
			echo '<script>alert("';
			foreach ($branches as $branch) {
				$bName = $obj->get_dpt_by_id($conn,$branch)->fetch();
				if($obj->allot_coord($conn,$userid,$branch))
					echo $bName['branchName'].'('.$branch.') alloted successfully!\n';
				else
					echo 'Error in alloting '.$bName['branchName'].'('.$branch.')\n';
			}
			echo '");</script>';
		}
?>
<div class="col-md-12">
	<table class="table mytable">
      <tbody>
        <tr>
          <td class="diff" style="margin-bottom:3px;">College Name:</td>
		  <td class="data"  style="margin-bottom:3px;"><?php echo $obj->get_college_name($conn, $data['collegeId']); ?></td>
          <td class="diff">Email Id:</td>
		  <td class="data"><?php echo $data['email']; ?></td>
        </tr>
        <tr>
          <td class="diff"  style="margin-bottom:3px;">Coordinator Name:</td>
		  <td class="data"  style="margin-bottom:3px;"><?php echo $data['name']; ?></td>
          <td class="diff">Contact:</td>
		  <td class="data"><?php echo $data['mobile_no']; ?></td>
        </tr>
        <tr>
          <td class="diff">Designation:</td>
		  <td class="data"><?php echo $data['designation']; ?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
</div>
	<!-- View all allocated branches -->
	<div class="col-md-6 col-md-offset-3">
		<div class="table-responsive">
			<table class='table table-striped table-bordered table-hover' id='subtable'>
				<thead>
					<tr>
						<td>Branch Id</td>
						<td>Branch Name</td>
						<td>Remove</td>
					</tr>
				</thead>
				<?php

					$allotedlist = $obj->get_alloted($conn, $coid);
					$i=0;
					while($row = $allotedlist->fetch()) {
						$i++;
						$bid = $row['branchId'];
						$bname = $row['branchName'];
						echo "<tr>
							<td>$bid</td>
							<td>$bname</td>
							<td><button id='delete".$i."' onclick='deletebranch(\"".$coid."\",\"".$bid."\",\"".$i."\");' class='btn btn-danger'>Delete</td>
							</tr>";
					}
				?>
			</table>
		</div>
	</div>
	<div class="col-md-6"></div>
	<hr>
	
	<div class="col-md-12" style="margin:20px;font-size:13px;">
	<h4 >Allot New Branch</h4>
	<hr>
		<?php

		$branches = $obj->get_branches($conn);
		$assigned_branches = $obj->get_assigned_branches($conn)->fetchAll(PDO::FETCH_COLUMN);

		echo "<form method='post'>";
           $x=1;
           echo "<table style='width:100%'>";
		while ($branch = $branches->fetch()) {
			if(!in_array($branch["branchId"], $assigned_branches)){
				if($x==1)
					echo "<tr>";
				echo "<td><input type='checkbox' name='branches[]' value='".$branch["branchId"]."'>&nbsp;&nbsp;".$branch["branchName"]."&nbsp;($branch[branchId])&nbsp;&nbsp;</td>";
				if($x==3) {
					echo "</tr>";
					$x=0;
				}
				$x++;
				}
			     		}
		echo "</table>";
		echo "<input type='hidden' name='id' value='".$coid."'><input type='submit' name='Allot' value='ALLOT' class='btn btn-success' style='margin-top:2%; margin-left:45%;	'></form>";
		
}
else
{
	// http_redirect("allot_coord.php");
	echo "Please select Coordinator ID First";
}
		?>
	</div>
</div>        
<?php
	require ("../include/footer.php");
?>