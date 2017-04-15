<?php	   
	include '../include/secure_college.php';
	require ("../include/headercollege.php");
	
	$facultyid = $_GET['facultyid'];
	$data = $obj->get_user_details($conn, $facultyid);
?>
<div class="panel-heading">
	<center>
    	<div class="header">Faculty Profile</div>
    	<div class="faculty_name"><?php echo $data['name']; ?></div>
    </center>
</div>
<div class="panel-body">
	<div class="col-md-6">
		<table>
			<tr>
				<td class="diff">College Name:</td>
				<td class="data"><?php echo $obj->get_college_name($conn, $data['collegeId']);	?></td>
			</tr>
			<tr>
				<td class="diff">Department:</td>
				<td class="data"><?php echo $obj->get_branchname($conn, $data['dept_code']); ?></td>
			</tr>
			<tr>
				<td class="diff">Faculty Name:</td>
				<td class="data"><?php echo $data['name']; ?></td>
			</tr>
			<tr>
				<td class="diff">Father's Name:</td>
				<td class="data"><?php echo $data['fathername']; ?></td>
			</tr>
			<tr>
				<td class="diff">Date of Birth:</td>
				<td class="data"><?php echo $data['dob']; ?></td>
			</tr>
			<tr>
				<td class="diff">Gender:</td>
				<td class="data"><?php echo $data['gender']; ?></td>
			</tr>
			<tr>
				<td class="diff">Designation:</td>
				<td class="data"><?php echo $data['designation']; ?></td>
			</tr>
			<tr>
				<td class="diff">Highest Education Qualification:</td>
				<td class="data"><?php echo $data['qualification']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<table>
			<tr>
				<td class="diff">Teaching Experience in Year:</td>
				<td class="data"><?php echo $data['teach_exp']; ?></td>
			</tr>
			<tr>
				<td class="diff">Industrial Experience in Year:</td>
				<td class="data"><?php echo $data['industrial_exp']; ?></td>
			</tr>
			<tr>
				<td class="diff">Mobile no:</td>
				<td class="data"><?php echo $data['mobile_no']; ?></td>
			</tr>
			<tr>
				<td class="diff">Email Id:</td>
				<td class="data"><?php echo $data['email']; ?></td>
			</tr>
			<tr>
				<td class="diff">Correspondence Address</td>
				<td class="data"><?php echo $data['address']; ?></td>
			</tr>
			<tr>
				<td class="diff">State:</td>
				<td class="data"><?php echo $data['state']; ?></td>
			</tr>
			<tr>
				<td class="diff">District:</td>
				<td class="data"><?php echo $data['district']; ?></td>
			</tr>
			<tr>
				<td class="diff">Pin Code:</td>
				<td class="data"><?php echo $data['pincode']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-12">
	<div class="table-responsive">
		<table class='table table-striped table-bordered table-hover' id='subtable'>
			<thead>
				<tr>
					<th>Subject Id</th>
					<th>Subject Name</th>
					<th>Semester</th>
					<th>Current Status</th>
					<th>Delete Subject</th>
				</tr>
			</thead>

			<?php
			$count = 0;
			$i = 0;
				$faclist = $obj->get_subject_list_faculty_all($conn, $facultyid, 0);
				while($row = $faclist->fetch()) {
					$subid = $row['subjectId'];
					$subname = $row['subjectName'];
					$semester = $row['semester'];

					$status = $obj->get_approval_status($conn, $facultyid, $subid);
					$class = ($count%2)?'even':'odd'; 
					$i = $i+1;
					echo "<tr class='$class'>
							<td>$subid</td><td>$subname</td><td>$semester</td>";

					
					if($status == 0) 
						echo "<td>No Action Takern</td>";
					else if($status == 1) 
						echo "<td>Approved</td>";
					else if($status == 2)
						echo "<td>Not Approved</td>";
					echo "<td><div id='delete".$i."'<button class='btn btn-danger' onclick='deleteme(\"".$facultyid."\",\"".$subid."\",\"".$i."\");'>Delete</button></div></td>";
					echo "</tr>";
				} 

			?>
		</table>
	</div>
	</div>
	<div class="col-md-4 col-md-offset-5"> 		
		<form method="POST" action="edit_faculty.php">
			<?php
				echo "<input type='hidden' name='facultyid' value='$facultyid'>";
				echo "<input type='submit' value='Edit Faculty' class='btn btn-danger' >" ;
			?>
		</form>
	</div>
</div>
        
<?php
	require ("../include/footer.php");
?>        
					
					
					
					