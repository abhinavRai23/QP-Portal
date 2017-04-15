<?php require ('../include/header.php');
      require ('../common/connectionPDO.php');
      //require ('../common/queries.php');
        $obj = new Queries();
?>
<style>
.checkbox-inline, .radio-inline {
    padding-left: 10%;
}
textarea{
    margin:2%;
}
.s_no{
    padding-top: 15px !important;
}
.btn{
    padding:3px 12px;
}
th{
    vertical-align: middle !important;
}
thead{
    background-color: #f2f2f2; 
}
</style>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
            Notification For  Subject Approval<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
			
		<div class="panel-inside">
		<!-- part if form submitted -->
		
		<?php
			$allotedlist = $obj->get_alloted($conn, $id);
			$i=0;
			while($row = $allotedlist->fetch()) {
				$i++;
				$bid = $row['branchId'];
				$bname = $row['branchName'];
				echo "<center><h3><b>Branch Name:</b> $bname ( $bid )</h3></center>";
				$x = 0;
				$sublist = $obj->get_subjects_by_branch($conn, $bid);
				while($row = $sublist->fetch()) {
					$subjectId = $row['subjectId'];
					$subjectName = $row['subjectName'];
					$semester = $row['semester'];

					
					// $faculties = $obj->get_all_faculty_notapproved($conn, $subjectId);
					$faculties = $obj->get_faculty_by_subject($conn, $subjectId);
					if($faculties->rowCount() > 0) {
						echo "<center><h4><span style='color:rgb(107, 48, 12)'><b >Subject Name:</b> $subjectName ($subjectId)</span></h4></center><br>";
					// echo "<br><br><center><h4>Subject Name: $subjectName</h4></center>";
					echo "<div class='table-responsive'><table class='table table-striped table-bordered table-hover subtable' >";
					echo "<thead><tr>
					<th>Semester</th>
					<th>Faculty<br>Id</th>
					<th>Faculty<br>Name</th>
					<th>Teaching Experience<br><em>(Years)</em></th>
					<th>View<br>Faculty</th>
					<th>Approval</th>
					<th>Status</th>
					<th>Delete</th>
					</tr></thead>";
					$count = 0;
					$i = 0;
					while($row = $faculties->fetch()) {
						$facultyid = $row['id'];
						$facultyname = $row['name'];
						$class = ($count%2)?'even':'odd'; 
						$i = $i+1;
						$count ++;
						$status = $obj->get_approval_status($conn, $facultyid, $subjectId);
						$teach_exp = $obj->get_subject_experience($conn, $facultyid, $subjectId)->fetch()['experience'];
						echo "<tr class='$class'>
								<td>$semester</td>
								<td>$facultyid</td>
								<td>$facultyname</td>
								<td>$teach_exp</td>
								";

						echo "<td><a target='_blank' href='view_faculty.php?facultyid=$facultyid'>View</a></td>";

						echo "<td><center>
								<table>
									<tr style='text-align:center'>
														
												";
												if($status!=1) {
												echo '<td style="padding-right:6px"><div id="check'.$i.'"><button class="btn btn-outline btn-success" name="appdisapp" onclick="approve(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';
												echo "<i  class='fa fa-check '></i></button></div>
											
										</td>
										";}
											
											if($status!=2){
												echo '<td style="padding-right:6px"><div id="cross'.$i.'"><button  class="btn btn-outline btn-danger" name="appdisapp" onclick="disApprove(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';
												echo "<i  class='fa fa-remove'></i></button></div>
											
										</td>
										";}
									
									
										echo "
									</tr>
								</table>
								</center>
							</td>
						";
							
											if($status == 0) 
								echo "<td><p id='status".$i."'><span style='color:rgba(119,6,165,0.75)'>No action is taken </span></p></td>";
							else if($status == 1) 
								echo "<td><p id='status".$i."'  style='color:green'>Approved</p></td>";
							else if($status == 2)
								echo "<td><p id='status".$i."' style='color:red' >Not Approved</p></td>";
							echo "<td><div id='delete".$i."'<button class='btn btn-danger' onclick='deleteme(\"".$facultyid."\",\"".$subjectId."\",\"".$i."\");'>Delete</button></div></td>";
							echo "</tr>";
					}
					echo "</table></div>";
					echo "<hr>";
				}
				}
			}
			
				// $branchId = htmlentities($_POST['branchId']);
				// $branchName = $obj->get_branchname($conn, $branchId);
				// $semester = htmlentities($_POST['semester']);
				// $subjectId = htmlentities($_POST['subjectId']);
				// $subjectName = $obj->get_subjects_by_id($conn,$subjectId)->fetch()['subjectName'];

				//select faculty list with subject for the specific college
				
			
		?>
	   </div>
</div>        
<?php
	require ("../include/footer.php");
?>