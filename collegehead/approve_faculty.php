<?php
	include '../include/secure_college.php';
	require ("../include/headercollege.php");
	
?>
<div class="panel-heading" align="center">
    Approve Subjects
</div>
<div class="panel-body" id="panel-body" align="center">
	<form role="form" class="form-inline" method="POST">
		<table>
			<tr>
				<div class="form-group">
					<td>
						<label>Select Branch: </label>
					</td>
					<td>
						<select name="branchId" id="branchlist" class="form-control">
							<?php
								$branchlist = $obj->get_branches($conn);
								while($branch = $branchlist->fetch()) {
									$branchId = $branch["branchId"];
									$branchName = $branch["branchName"];
									
									echo "<option value='$branchId'>$branchName</option>";
								}		
							?>
						</select>
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Select Semester: </label>
					</td>
					<td>
						<select name="semester" class="form-control">
							<?php
								$i = 1;
								while($i<=10) {
									echo "<option value=$i>$i</option>";
									$i ++;
								}	
							?>
						</select>
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td>
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
			$semester = htmlentities($_POST['semester']);
			//select college id for the particular College Representative
			echo $collegeId = $id;
			
			//select faculty list with subject for the specific college
			$faculties = $obj->get_branch_faculties($conn, $collegeId, $branchId);
			
			echo "<div class='table-responsive'><table class='table table-striped table-bordered table-hover' id='subtable'>";
			echo "<thead><tr><th>Faculty<br>Id</th><th>Faculty<br>Name</th><th>Subject<br>Id</th><th>Subject<br>Name</th><th>Teaching Experience<br><em>(Years)</em></th><th>View<br>Faculty</th><th>Approval</th></tr></thead>";
			$count = 0;
			$i = 0;
			while($row = $faculties->fetch()) {
				$facultyid = $row['id'];
				$facultyname = $row['name'];
				$subjectlist = $obj->get_subject_list_faculty($conn, $facultyid, $semester);
				$teach_exp = $row['teach_exp'];
				while($sub = $subjectlist->fetch()) {
					$subjectId = $sub['subjectId'];
						$subjectName = $sub['subjectName'];
					$class = ($count%2)?'even':'odd'; 
					$i = $i+1;
					echo "<tr class='$class'>
							<td>$facultyid</td><td>$facultyname</td><td>$subjectId</td><td>$subjectName</td><td>$teach_exp</td>";

					echo "<td><a href='view_faculty.php?facultyid=$facultyid'>View</a></td>";

					echo "<td><center>
							<table>
								<tr>
									<td style='padding-right:6px'>				
											";
											echo '<div id="check'.$i.'"><button class="btn btn-outline btn-success" name="appdisapp" onclick="approve(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';echo "<i  class='fa fa-check '></i></button></div>
										
									</td>
									<td>";
										
											echo '<div id="cross'.$i.'"><button  class="btn btn-outline btn-success" name="appdisapp" onclick="disApprove(\''.$facultyid.'\',\''.$subjectId.'\',\''.$i.'\')">';echo "<i  class='fa fa-remove'></i></button></div>
										
									</td>
								</tr>
							</table>
							</center>
						</td></tr>
					";
				}
			}
			echo "</table></div>";
		}
	?>
   </div>
</div>        
<?php
	require ("../include/footer.php");
?>