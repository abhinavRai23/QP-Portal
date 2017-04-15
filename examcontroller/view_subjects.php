<?php
	include '../include/secure_exam.php';
	require ('../include/header.php');
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
<script type="text/javascript">
	function editbranch (id) {
		document.getElementById("name_"+id).innerHTML='<input class="form-control" type="text" name="name_'+id+'" value="'+(document.getElementById("name_"+id).innerHTML)+'">';
		document.getElementById("edit_"+id).innerHTML='<input name="Edit" class="btn btn-success" type="submit" value="Update">';
	}
</script>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
            View Subjects<br><br>
</div>
<div class="panel-body" id="panel-body">
	<div class="row">
	<div class="col-md-3	"></div>
		<div class="col-sm-6">
		<?php
			if(isset($_POST['updatename'])) {
				$subName = htmlentities($_POST['subName']);
				$subjectId = htmlentities($_POST['subjectId']);
				$branchId = htmlentities($_POST['branchId']);

				if($obj->update_subject_name($conn, $branchId, $subjectId, $subName))
					echo "<span style='color:green'>Updated Subject Name Successfully</span>";
			}
		?>
			<form role="form" class="form-inline" method="POST" action="view_subjects.php" id="myform">
				<table style="width:100%;">
					
					<tr>
						<div class="form-group">
							<td>
								<label>Course:</label>
							</td>
							<td>
								<select name="courseId" id="courseId" onchange="getbranches();" class="form-control" style="width:100%"  onchange="getsubjects();" required>
									<option>SELECT</option>
									<?php
										$branchlist = $obj->get_courses($conn);
										$i=0;
										while($row = $branchlist->fetch()) {
											$i++;
											$bname = $row['courses'];
											echo "<option value='$bname'>$bname</option>";
											
										}
									?>
								</select>
							</td>
						</div>	
					</tr>
					<tr>
						<div class="form-group">
							<td>
								<label>Branch:</label>
							</td>
							<td>
								<select name="branchId" id="branchlist" class="form-control" style="width:100%"  onchange="getsubjects();" required>
									<option>SELECT</option>
									<?php
										$branchlist = $obj->get_branches($conn);
										$i=0;
										while($row = $branchlist->fetch()) {
											$i++;
											$bid = $row['branchId'];
											$bname = $row['branchName'];
											echo "<option value='$bid'>$bname ($bid)</option>";
											
										}
									?>
								</select>
							</td>
						</div>	
					</tr>
					<tr>
						<div class="form-group">
							<td>
								<label>Semester:</label>
							</td>
							<td>
								<select name="semester" class="form-control" id="semesterlist" style="width:100%" required>
									<option>SELECT</option>
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
							<td colspan="2" align="center">
								<input type="submit" value="Submit" name="viewdata" class='btn btn-outline btn-success'>
							</td>
						</div>
					</tr>
				</table>
			</form>
		<div class="panel-inside">
		<!-- part if form submitted -->
		
		<?php
			
			if(isset($_POST['viewdata'])) {
				$branchId = htmlentities($_POST['branchId']);
				$semester = htmlentities($_POST['semester']);
				if(isset($_POST['Edit']) && !empty($_POST['Edit']))
				{
					$key = key($_POST);
					while($key[4]!='_') {next($_POST);$key = key($_POST);}
						$id = substr($key, 5);
						$name = htmlentities($_POST['name_'.$id]);

						if($obj->update_subject_name($conn,$branchId,$id,$name))
							echo '<script>alert("Subject edited successfully!");</script>';
						else
							echo '<script>alert("Error in editing subject!");</script>';				
				}
				$branchName = $obj->get_branchname($conn, $branchId);
				$subjectlist = $obj->get_subjects_by_branch_sem($conn, $branchId, $semester);
				//select faculty list with subject for the specific college
				echo "<div class='table-responsive'><form method='POST'><input type='hidden' name='viewdata'><input type='hidden' name='branchId' value='$_POST[branchId]'><input type='hidden' name='semester' value='$_POST[semester]'><table class='table table-striped table-bordered table-hover' id='subtable'>";
				echo "<thead><tr>
				<th>S.No.</th>
				<th>Subject Id</th>
				<th>Subject Name</th>
				<th>Edit</th>
				<th>Active</th>
				<th>Delete</th>
				</tr></thead>";
				$count = 0;
				$i = 0;
				while($row = $subjectlist->fetch()) {
					$subName = $row['subjectName'];
					$subId = $row['subjectId'];
					$active = $obj->get_active_subject($conn, $branchId, $subId)->fetch()['active'];
					$class = ($count%2)?'even':'odd'; 
					$i = $i+1;
					$count ++;
					echo "<tr class='$class'>
							<td>$i</td>
							<td>$subId</td>";
							echo "<td id='name_$subId'>$subName</td>
								<td id='edit_$subId'><input type='button' value='Edit' onclick='editbranch(\"$subId\")' class='btn btn-warning'>
							</td>";

							if($active == 1) 
								echo "<td><p id='active".$i."'><span style='color:rgba(119,6,165,0.75)'>Subject is Active </span></p></td>";
							else if($active == 0) 
								echo "<td><p id='active".$i."'><span style='color:red'>Subject Deleted</span></p></td>";
							
								if($active==1) {
											echo '<td ><div id="delete'.$i.'"><button class="btn btn-outline btn-danger" name="appdisapp" onclick="deletesubject(\''.$branchId.'\',\''.$subId.'\',\''.$i.'\')">';
											echo "Delete</button></div>
										
									</td>";
								}
										if($active==0){
											echo '<td ><div id="delete'.$i.'"><button  class="btn btn-outline btn-info" name="appdisapp" onclick="undeletesubject(\''.$branchId.'\',\''.$subId.'\',\''.$i.'\')">';
											echo "Activate</button></div>
										
									</td>";
								}
						echo "</tr>";
				}
				echo "</table></form></div>";
			}
		?>
	   </div>
</div> 
<script type="text/javascript">
	function submitfrm() {
		$('#frm').submit();
	}

</script>

<?php
	require ("../include/footer.php");
?>