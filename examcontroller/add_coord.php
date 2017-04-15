<?php include '../include/secure_exam.php';
include '../include/header.php';
?>


<div class="panel-heading" align="center" style="font-size:28px;padding-bottom:2%">
    Add New Coordinator
</div>
<div class="panel-body" align="center" id="panel-body">
<?php
	if(isset($_POST['addHead'])) {
		$cid = htmlentities($_POST['cid']);
		$cemail = htmlentities($_POST['cemail']);
		$cname = htmlentities($_POST['cname']);
		$cdesig = htmlentities($_POST['desig']);
		if(!empty($cid) && !empty($cemail)) {
				$receiverMail = $cemail;
				$receiverName = $cname;

				$subject = "Added as Branch Co-ordinator";

				$password = substr(sha1(time()), 0,8);

				$message = $receiverName.",<br><br>This is to notify you that Controller of Examination, APJAKTU has added you as Branch Co-ordinator. Controller of Examination may soon allot you some branches now. You will be notified when you are alloted any branch.<br><br>For now, your log in details are:<br><b>Username:</b> ".$receiverMail."<br><b>Password:</b>".$password."<br><br>Thanking you<br>APJAKTU";

				require("../mailer/class.phpmailer.php");

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
				// $mail->AddAddress("ellen@example.com");
				                  // name is optional
				// $mail->AddReplyTo("info@example.com", "Information");

				$mail->WordWrap = 100;                                 // set word wrap to 50 characters
				// $mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
				// $mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
				$mail->IsHTML(true);                                  // set email format to HTML

				$mail->Subject = $subject;
				$mail->Body    = $message."</b>";
				$mail->AltBody = $message;

				if(!$mail->Send())
				{
				   echo "Message could not be sent. <p>";
				   echo "Mailer Error: " . $mail->ErrorInfo;
				   exit;
				}

				if($obj->addCoord($conn, $cid, $cname, $cemail, $cdesig, md5($password)))
					echo "<span style='color:green'>$cname added successfully</span>";
		}
		else
			echo "<span style='color:green'>Please fill all details first</span>";
	}

?>
	<form role="form" class="form-inline" method="POST">
		
		<table>
			<tr>
				<div class="form-group">
					<td>
						<label>Select College of Coordinator:</label>
					</td>
					<td style="max-width:200px;">
						<select class="form-control" name="cid" id="college" style="max-width:100%">
                       <?php
							$collegelist = $obj->get_colleges($conn);
							while($row = $collegelist->fetch()) {
								$collegeId = $row['collegeId'];
								$collegeName = $row['collegeName'];
								echo "<option value='$collegeId'>$collegeName ($collegeId)</option>";
							}
						?>
						</select>
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Name of Coordinator:</label>
					</td>
					<td>
						<input class="form-control"type="text" name="cname" placeholder="Name">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Designation:</label>
					</td>
					<td>
						<input class="form-control" type="text" name="desig" placeholder="Designation">
					</td>
				</div>	
			</tr>
			<tr>
				<div class="form-group">
					<td>
						<label>Email Id for Coordinator:</label>
					</td>
					<td>
						<input class="form-control"type="email" name="cemail" placeholder="Email">
					</td>
				</div>	
			</tr>
		</table>
		<center><input type="submit" name="addHead" class="btn btn-success" value="Add"></center>
	</form>
	
</div>        

<?php
    require ("../include/footer.php");
?>
