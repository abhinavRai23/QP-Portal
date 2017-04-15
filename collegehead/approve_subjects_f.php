<?php
	include '../include/secure_college.php';
	require ("../include/headercollege.php");
	
?>

<div class="panel-heading" align="center">
    Approve Subjects
</div>
<div class="panel-body" align="center" id="panel-body">
	<form role="form" class="form-inline" method="POST">
		<table>
			<tr>
				<div class="form-group">
					<td>
						<label>Select Department of Faculty: </label>
					</td>
					<td>
						<select name="branchId" id="branchlist" class="form-control" onchange="getfaculties();">
							<?php
								$branchlist = $obj->get_branches($conn);
								while($branch = $branchlist->fetch()) {
									$branchId = $branch["branchId"];
									$branchName = $branch["branchName"];
									
									echo "<option value='$branchId'>$branchName ($branchId)</option>";
								}		
							?>
						</select>
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Select Faculty: </label>
					</td>
					<td>
						<select name="faculty"  id="facultylist" class="form-control">
						</select>
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td colspan="2" align="center">
						<input type="submit" value="Submit" name="getdata" class='btn btn-outline btn-success'>

					</td>
				</div>
			</tr>
		</table>
	</form>
	<div class="panel-inside">
	<!-- part if form submitted -->
	
	<?php
		// if(isset($_POST['appdisapp'])) {
		// 	$facultyId = htmlentities($_POST['facultyId']);
		// 	$subjectId = htmlentities($_POST['subjectId']);
		// 	$approve = htmlentities($_POST['approve']);

		// 	$obj->update_approval($conn, $facultyId, $subjectId, $approve);
			
			
		// }
		if(isset($_POST['getdata'])) {
			$branchId = htmlentities($_POST['branchId']);
			$branchName = $obj->get_branchname($conn, $branchId);
			$facultyid = htmlentities($_POST['faculty']);
			//select college id for the particular College Representative
			$collegeId = $id;
			
			echo "<div class='table-responsive'><table class='table table-striped table-bordered table-hover' id='subtable'>";
			echo "<thead><tr>
			<th>Semester</th>
			<th>Subject Id</th>
			<th>Subject Name</th>
			<th>View Faculty</th>
			<th>Approval</th>
			<th>Status</th>
			<th>Delete</th>
			</tr></thead>";
			$count = 0;
			$count ++;
			
			$i = 0;
				$subjectlist = $obj->get_subject_list_faculty_all($conn, $facultyid, 0);
				
				while($sub = $subjectlist->fetch()) {
					$subjectId = $sub['subjectId'];
					$subjectName = $sub['subjectName'];
					$status = $obj->get_approval_status($conn, $facultyid, $subjectId);
					$semester = $sub['semester'];
					$class = ($count%2)?'even':'odd'; 
					$i = $i+1;
					echo "<tr class='$class'><td>$semester</td>
							<td>$subjectId</td><td>$subjectName</td>";

					echo "<td><a href='view_faculty.php?facultyid=$facultyid'>View</a></td>";

					echo "<td><center>
							<table>
								<tr>
													
											";
									if($status!=1){
											if($status!=1) {
											echo '<td style="padding-right:6px"><div id="check'.$i.'"><button class="btn btn-outline btn-success" name="appdisapp" onclick="approve(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';
											echo "<i  class='fa fa-check '></i></button></div>
										
									</td>
									";}
										if($status!=0){
											echo '<td style="padding-right:6px"><div id="refresh'.$i.'"><button  class="btn btn-outline btn-success" name="appdisapp" onclick="noApprove(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';
											echo "<i  class='fa fa-refresh'></i></button></div>
										
									</td>
									";}
										if($status!=2){
											echo '<td style="padding-right:6px"><div id="cross'.$i.'"><button  class="btn btn-outline btn-success" name="appdisapp" onclick="disApprove(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';
											echo "<i  class='fa fa-remove'></i></button></div>
										
									</td>
									";}
								}
								else{
									
											echo '<td style="padding-right:6px"><button class="btn btn-outline btn-sm btn-default btn-success">APPROVED</button></td>';

											
									
								}
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
		}
	?>
   </div>
</div>        
<?php
	require ("../include/footer.php");
?>