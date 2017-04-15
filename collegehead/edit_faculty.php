<?php
include '../include/secure_college.php';
require ("../include/headercollege.php");


if(isset($_POST['editDetails'])) {
	$deptId = htmlentities($_POST['deptId']);
	$name = htmlentities($_POST['name']);
	$fatherName = htmlentities($_POST['fatherName']);
	$dob = htmlentities($_POST['dob']);
	$gender = htmlentities($_POST['gender']);
	$designation = htmlentities($_POST['designation']);
	$qualification = htmlentities($_POST['qualification']);
	$teachingExperienceYear = htmlentities($_POST['teachingExperienceYear']);
	$industrialExperienceYear = htmlentities($_POST['industrialExperienceYear']);
	$phone = htmlentities($_POST['phone']);
	$email = htmlentities($_POST['email']);
	$address = htmlentities($_POST['address']);
	$state = htmlentities($_POST['state']);
	$district = htmlentities($_POST['district']);
	$pinCode = htmlentities($_POST['pinCode']);

	$user['id'] = htmlentities($_POST['facultyid']);
        $user['dept_code'] = $deptId;
       	$user['name'] = $name;
        $user['fathername'] = $fatherName;
        $user['dob'] = $dob;
        $user['gender'] = $gender;
        $user['designation'] = $designation;
        $user['qualification'] = $qualification;
        $user['teach_exp'] = $teachingExperienceYear;
        $user['industrial_exp'] = $industrialExperienceYear;
        $user['mobile_no'] = $phone;
        $user['email'] = $email;
        $user['address'] = $address;
        $user['state'] = $state;
        $user['district'] = $district;
        $user['pincode'] = $pinCode;

        if($obj->update_faculty_details($conn, $user) == 1)
        	echo "Successfully edited";
       	else echo "Failed to update";
}

if(isset($_POST['facultyid'])) {
$facultyid = $_POST['facultyid'];
$data = $obj->get_user_details($conn,$facultyid);

?>
<div class="panel-heading">
    Faculty Profile
</div>
<div class="panel-body">
	<form role="form" class="form-inline" method="POST">
		<?php
			echo "<input type='hidden' value='$facultyid' name='facultyid'>";
		?>
		<table>
			<tr>
				<div class="form-group">
					<td>
						<label>College Name:</label>
					</td>
					<td>
						<select class="form-control" name="collegeId" id="collegeId" style="width:100%;" disabled>
						<?php
							$collegeName = $obj->get_college_name($conn, $data['collegeId']);
								echo "<option value='".$data["collegeId"]."'>".$collegeName."</option>";
							
						?>
                        </select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Department:</label>
					</td>
					<td>
						<select class="form-control" name="deptId" id="depId">
                        <?php
							$result = $obj->get_branches($conn);
							while($row = $result->fetch()) {
								echo "<option value='".$row["branchId"]."'>".$row["branchName"]."</option>";
							}
						?>          
                        </select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Faculty Name:</label>
					</td>
					<td>
                        <?php 
                        $name = $data['name'];
                        	echo '<input class="form-control" type="text" name="name" id="name" style="min-width:37%;width:60%;" value="'.$name.'">'
                        ?>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Father's Name:</label>
					</td>
					<td>
						<?php 
                        $fatherName = $data['fathername'];
                        	echo '<input class="form-control" type="text" name="fatherName" id="fatherName" style="min-width:37%;width:60%;" value="'.$fatherName.'">'
                        ?>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Date of Birth:</label>
					</td>
					<td>
						<input class="form-control" type="date" name="dob" id="dob" value="<?php echo $data['dob'];?>">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Gender:</label>
					</td>
					<td>
						<label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Male" checked="" >Male
                        </label>&nbsp;&nbsp;
                        <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Female" checked="">Female
                        </label>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Designation:</label>
					</td>
					<td>
						<select class="form-control" name="designation" id="designation">
                                    <option value="Head Of Department">Head Of Department</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Assistant Associate">Assistant Associate</option>
                                    <option value="Professor">Professor</option>
                                    
                        </select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Highest Education Qualification:</label>
					</td>
					<td>
						<select class="form-control" name="qualification" id="qualification">
                                    <option>Ph.D</option>
                                    <option>M.Tech</option>
                                    <option>M.Phil</option>
                                    <option>B.Tech</option>
                                    <option>MCA</option>
                        </select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Teaching Experience in Year:</label>
					</td>
					<td>
                        <input class="form-control" type="text" name="teachingExperienceYear" id="teachingExperienceYear" style="min-width:37%;width:60%;" value="<?php echo $data['teach_exp'];?>">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Industrial Experience in Year:</label>
					</td>
					<td>
                        <input class="form-control" type="text" name="industrialExperienceYear" id="teachingExperienceYear" style="min-width:37%;width:60%;" value="<?php echo $data['industrial_exp'];?>">
					</td>
				</div>	
			</tr>
				<div class="form-group">
					<td>
						<label>Mobile No:</label>
					</td>
					<td>
						<input class="form-control" type="number" name="phone" id="phone" value="<?php echo $data['mobile_no'];?>" style="min-width:37%;width:60%;">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Email:</label>
					</td>
					<td>
						<input class="form-control" type="email" name="email" id="email" style="min-width:37%;width:60%;" value="<?php echo $data['email'];?>">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Correspondence Address:</label>
					</td>
					<td>
						<textarea class="form-control" name="address" id="address" style="min-width:37%;width:60%;" value="<?php echo $data['address'];?>"></textarea>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>State:</label>
					</td>
					<td>
						<input class="form-control" type="text" name="state" id="state" style="min-width:37%;width:60%;" value="<?php echo $data['state'];?>">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>DISTRICT:</label>
					</td>
					<td>
						<input class="form-control" type="text" name="district" id="district" value="<?php echo $data['district'];?>" style="min-width:37%;width:60%;">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Pin Code:</label>
					</td>
					<td>
						<input class="form-control" type="number" value="<?php echo $data['pincode'];?>" name="pinCode" id="pinCode" style="min-width:37%;width:60%;">
					</td>
				</div>	
			</tr>
									
        </table> 
        <br>
        <center><input type="submit" class="btn btn-md btn-warning btn-block" value="Update Info" name="editDetails" style="width:25%;"></center>   
    </form>
</div>
<?php
require ("../include/footer.php"); 
}
?>