<?php include '../include/secure_exam.php';
include '../include/header.php';
	
?>
<script type="text/javascript">
var courses = [];
"<select name='course' class='form-control'><?php
								$data = $obj->get_courses($conn);

								while ($row = $data->fetch()) {
									echo "<option value='$row[courses]'>$row[courses]</option>	";
								}
							?></select>";
	function editbranch (id) {
		document.getElementById("name_"+id).innerHTML='<input class="form-control" type="text" name="name_'+id+'" value="'+(document.getElementById("name_"+id).innerHTML)+'">';
		document.getElementById("cour_"+id).innerHTML="<select name='cour_"+id+"' class='form-control'><?php
								$data = $obj->get_courses($conn);

								while ($row = $data->fetch()) {
									echo "<option value='$row[courses]'>$row[courses]</option>	";
								}
							?></select>";
		document.getElementById("edit_"+id).innerHTML='<input class="btn btn-success" type="submit" value="Submit">';
	}
</script>
	<?php
		if(isset($_POST) && !empty($_POST))
		{
			$key = key($_POST);
			if($key[1]!='_') {next($_POST);$key = key($_POST);}
				$id = substr($key, 5);
				$name = htmlentities($_POST['name_'.$id]);
				$cour = htmlentities($_POST['cour_'.$id]);

				$course = $obj->get_courseID($conn,$cour);

				if($obj->update_branch($conn,$id,$name,$cour))
					echo '<script>alert("Branch edited successfully!");</script>';
				else
					echo '<script>alert("Error in editing Branch!");</script>';				
		}
	?>


<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    List of Branches
</div>
<div class="panel-body" id="panel-body">
	<div class="table-responsive">
	<form method="POST">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<td>S.No.</td>
					<td>Branch Id</td>
					<td>Branch Name</td>
					<td>Course</td>
					<td>Edit</td>
				</tr>
			</thead>

			<?php
				$count = 0;
				$headlist = $obj->get_branches($conn);
				while($row = $headlist->fetch()) {
					$class = ($count%2)?'even':'odd';
					$count++;
					$branchId = $row['branchId'];
					$branchName = $row['branchName'];
					$courId = $row['course'];
					echo "<tr class='$class'>";
					echo "<td>".$count."</td>";
					echo "<td>".$branchId."</td>";
					echo "<td id='name_$branchId'>".$branchName."</td>";
					echo "<td id='cour_$branchId'>".$courId."</td>";
					echo "<td id='edit_$branchId'><button class='btn btn-warning' onclick='editbranch(\"".$branchId."\");'>Edit</button></td>";
					echo "</tr>";
				}
			?>
		</table>
	</form>
	</div>
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>