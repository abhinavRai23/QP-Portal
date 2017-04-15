<?php include '../include/header.php';
include '../include/secure_exam.php';?>
<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Add Branches
</div>
<?php
if(isset($_POST['addBranch'])) {
	$bid = htmlentities($_POST['bid']);
	$bname = htmlentities($_POST['bname']);
	$course = htmlentities($_POST['course']);
	echo '<div style="padding-left:15%;"><b><br>';
	if(!isset($_POST['bid']) || empty($_POST['bid']))
		echo "<span style='color:red;'>Please enter Branch Id.</span><br>";
	if(!isset($_POST['bname']) || empty($_POST['bname']))
		echo "<span style='color:red;'>Please enter Branch Name.</span><br>";
	
	if(!empty($bid) && !empty($bname) && !empty($course)) {
		if($obj->add_branch($conn, $bid, $bname, $course))
			echo "<span style='color:green'>Successfully Added</span><br>";
	}
	else
		echo "<span style='color:red;'>Please all fill details</span><br>";

	echo "</div>";
}


?>
<div class="panel-body" align="center" id="panel-body">
	<form role="form" class="form-inline" method="POST">
		<Table>
			<tr>
				<div class="form-group">
					<td>
						<label>Branch Id:</label>
					</td>
					<td>
						<input type="text" placeholder="Branch Id" name="bid" class="form-control">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Branch Name:</label>
					</td>
					<td>
						<input type="text" placeholder="Branch Name" name="bname" class="form-control">
					</td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Course:</label>
					</td>
					<td>
						<select name="course" class="form-control">
							<?php
								$data = $obj->get_courses($conn);

								while ($row = $data->fetch()) {
									echo "<option value='$row[courseId]'>$row[courses]</option>	";
								}
							?>
						</select>
					</td>
				</div>
			</tr>
		</Table>
		<center><input type="submit" name="addBranch" class="btn btn-md btn-success" value="Add"></center>
	</form>		
</div>        

<?php
    require ("../include/footer.php");
?>
<?php
$conn = null;
?>