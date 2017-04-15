<?php
	require ("include/headerindex.php");

$obj = new Queries();
function vali($string) {
	return htmlentities($string);
}
if(isset($_POST['registerNew'])) {
	$collegeId = vali($_POST['collegeId']);
	// $collegeId='';
	$deptId = vali($_POST['deptId']);
	$name = vali($_POST['name']);
	$fatherName = vali($_POST['fatherName']);
	$dob = vali($_POST['dob']);
	$gender = vali($_POST['gender']);
	$designation = vali($_POST['designation']);
	$qualification = vali($_POST['qualification']);
	$teachingExperienceYear = vali($_POST['teachingExperienceYear']);
	$industrialExperienceYear = vali($_POST['industrialExperienceYear']);
	$phone = vali($_POST['phone']);
	$email = vali($_POST['email']);
	$confirmEmail = vali($_POST['confirmmail']);
	$address = vali($_POST['address']);
	$state = vali($_POST['state']);
	$district = vali($_POST['district']);
	$pinCode = vali($_POST['pinCode']);
	$mister1 = vali($_POST['mister1']);
	$mister2 = vali($_POST['mister2']);

	$i=0;
	$e[0] = 0;
	if(empty($name))
		$e[$i++] = 'Name can\'t be empty';
	if(empty($dob))
		$e[$i++] = 'Date of birth can\'t be empty';
	if($email!=$confirmEmail)
		$e[$i++] = 'Email mismatch';
    /*

    check for all fields
    pending







    */
	if($e[0]=='0'){
		$user['id'] = $obj->get_max_user_id($conn)+1;
        $user['collegeId'] = $collegeId;
        $user['dept_code'] = $deptId;
        if(!empty($mister1))
        	$user['name'] = $mister1.' '.$name;
        else
        	$user['name'] = $name;
        if(!empty($mister2))
        	$user['fathername'] = $mister2.' '.$fatherName;
        else
        	$user['fathername'] = $fatherName;
        $user['dob'] = $dob;
        $user['gender'] = $gender;
        $user['designation'] = $designation;
        $user['qualification'] = $qualification;
        $user['teach_exp'] = $teachingExperienceYear;
        $user['industrial_exp'] = $industrialExperienceYear;
        $user['mobile_no'] = $phone;
        $user['email'] = $email;
        $password = substr(sha1(time()),0,8);
        $user['password'] = md5($password);
        $user['address'] = $address;
        $user['state'] = $state;
        $user['district'] = $district;
        $user['pincode'] = $pinCode;
        $user['userdef'] = '3';

        $receiverName = $user['name'];
		$receiverMail = $user['email'];

        $subject = "Registration Successful";

        $message = 'Hello '.$receiverName.",<br><br>APJAKTU Model Question Paper Portal Registration Successful!<br><br><b>Your User ID:</b> ".$receiverMail."<br><b>Your password:</b> ".$password."<br><br>You can change password after logging in.<br><br>APJAKTU";

        require("mailer/class.phpmailer.php");

        $mail = new PHPMailer();

        $mail->IsSMTP();                                      // set mailer to use SMTP
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";  // specify main and backup server
        $mail->Port = '465';
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = "apjaktu.reg@gmail.com";  // SMTP username
        $mail->Password = "apjaktupass"; // SMTP password
        $mail->SMTPDebug = 0;

        $mail->From = "apjaktu.reg@gmail.com";
        $mail->FromName = "APJAKTU";
        $mail->AddAddress($receiverMail, $receiverName);
        $mail->WordWrap = 100;                                 // set word wrap to 50 characters
        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        if(!$mail->Send())
        {
           echo "Message could not be sent. Please try again.<p>";
           exit;
        }
        else
            echo 'You will receive Email with your password shortly.<br>';
    


        if($obj->insert_new_user($conn,$user)){
        	// $obj->insert_user_subjects($conn,$user['id'],$subject);
    	    // echo "<center><h2 style='color:#20D555;margin-top:20%;'>Faculty registered successfully</h2></center>";
    	    echo '<script>swal("Registered", "Registered Successfully", "success");</script>';
        }
        else{
        	echo '<script>swal("Failed", "Failed To Register", "error");</script>';
        }
    }
    else{
    	echo '<script>alert("';
    	foreach ($e as  $error) {
    		echo "$error";
    	}
    	echo '");</script>';
    }
}

?>
<div class="panel-heading" align="center">
    Faculty Registration
</div>
<div class="panel-body" id="panel-body">
	<form role="form" class="form-inline" method="POST">
					
					<div class="col-sm-6">
					<table>
						<tr>
							<div class="form-group">
								<td>
									<label>College Name:</label>
								</td>
								<td>
									<select class="form-control" name="collegeId" id="collegeId" style="max-width:200px;">
									<?php
										$result = $obj->get_colleges($conn);
										while($row = $result->fetch()) {
											echo "<option value='".$row["collegeId"]."'>".$row["collegeName"]."</option>";
										}
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
									<select class="form-control" name="mister1" id="mister1">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                    </select>
                                    <input class="form-control" type="text" name="name" id="name" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Father's / Husband's Name:</label>
								</td>
								<td>
									<select class="form-control" name="mister2" id="mister2">
                                                <option value="Mr.">Mr.</option>
                                                
                                    </select>
                                    <input class="form-control" type="text" name="fatherName" id="fatherName" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Date of Birth:</label>
								</td>
								<td>
									<input class="form-control" type="date" name="dob" id="dob">
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
                                                <option value="Professor">Professor</option>
                                                <option value="Associate Professor">Associate Professor</option>
                                                <option value="Assistant Professor">Assistant Professor</option>
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
                                    <input class="form-control" type="text" name="teachingExperienceYear" id="teachingExperienceYear" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>

						<tr>
							<div class="form-group">
								<td>
									<label>Industrial Experience in Year:</label>
								</td>
								<td>
                                    <input class="form-control" type="text" name="industrialExperienceYear" id="teachingExperienceYear" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						</table>
						</div>
						<div class="col-md-6">
						<table>
							<div class="form-group">
								<td>
									<label>Mobile No:</label>
								</td>
								<td>
									<input class="form-control" type="number" name="phone" id="phone" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Email:</label>
								</td>
								<td>
									<input class="form-control" type="email" name="email" id="email" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Confirm Email:</label>
								</td>
								<td>
									<script></script>
									<input onpaste="return false" class="form-control" type="email" name="confirmmail" id="confirmmail" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Correspondence Address:</label>
								</td>
								<td>
									<textarea class="form-control" name="address" id="address" style="min-width:37%;max-width:200px;"></textarea>
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>State:</label>
								</td>
								<td>
									<input class="form-control" type="text" name="state" id="state" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>District:</label>
								</td>
								<td>
									<input class="form-control" type="text" name="district" id="district" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<div class="form-group">
								<td>
									<label>Pin Code:</label>
								</td>
								<td>
									<input class="form-control" type="number" name="pinCode" id="pinCode" style="min-width:37%;max-width:200px;">
								</td>
							</div>	
						</tr>
						<tr>
							<td colspan="2">
							<input style="width:100px" type="submit" class="btn btn-md btn-success btn-block pull-right" value="Sign up" name="registerNew" >
							</td>
						</tr>						
						
						</table>
						</div>
						
			        <br>
		        </form>
</div>		            
<?php
	require ("include/footerindex.php");
?>

