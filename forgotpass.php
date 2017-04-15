<?php require 'include/headerindex.php';?>
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
.panel-default {
    border-color: #969696;
}
.form-control{
	font-size: 12px;
}
.panel-default > .panel-heading {
    color: #333;
    background-color: #E8E8E8 !important;
    border-color: #ddd;
}
</style>
<div class="panel-body" id="panel-body">
	<div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                	<div class="panel-heading" align="center">
                        <h3 class="panel-title">Forgot Password</h3>
                    </div>
                    <div class="panel-body">
                        <!-- <form role="form">
                            <fieldset>
                                <div class="form-group" id="div1">
                                	<label class="control-label">Enter New Password:</label>
                                    <input class="form-control" id="pass1" placeholder="Enter New Password" name="password" type="password" value="" onchange="check();">
                                </div>
                                <div class="form-group" id="div2">
                                	<label class="control-label">Confirm Password:</label>
                                    <input class="form-control"  id="pass2" placeholder="Confirm Password" name="password" type="password" value="" onchange="check();">
                                </div>
                                <div align="center">
                                	<input type="submit" value="Submit" class="btn btn-success">
                                </div>	
                            </fieldset>
                        </form>
                         -->
                        <?php
                        if(isset($_POST['submit']))
                        {

                            $mailID = htmlentities($_POST['user1']);

                            $obj = new Queries();
                            $faculty = $obj->get_user_details_by_mail($conn, $mailID);

                            if($faculty)
                            {
                                $receiverName = $faculty['name'];

                                if(isset($faculty['id']))
                                    {$type=0;$receiverMail = $faculty['email'];}
                                else
                                    {$type=1;$receiverMail = $faculty['emailId'];}

                                $subject = "Reset Password";
                                $confirm = mt_rand(200000,800000);

                                if(!$obj->insert_confirm_code($conn,$receiverMail,$confirm,$type)) die('Error occured, please try again!');

                                $message = 'Hello '.$receiverName.",<br><br>This is you confirmation code: ".$confirm."<br><br>APJAKTU";

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
                                    echo 'You should receive Email with Confirmation Code shortly<br>';
                            

                        ?>
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                	<label class="control-label">Enter Confirmation Code:</label>
                                    <input type="hidden" name="email" value="<?php echo $receiverMail; ?>">
                                    <input class="form-control" placeholder="Enter Confirmation Code" name="password" type="password">
                                </div>
                                <div align="center">
                                	<input type="submit" name="confirm" value="Confirm" class="btn btn-success">
                                </div>	
                            </fieldset>
                        </form>
                        <?php
                        }
                            else
                                echo 'Invalid Email ID. Please enter correct ID!';
                        }
                        elseif(isset($_POST['confirm']))
                        {
                            $obj = new Queries();

                            $email = htmlentities($_POST['email']);
                            $code = htmlentities($_POST['password']);

                            $data = $obj->get_confirm_code($conn,$email)->fetch();

                            if($code==$data['code'])
                            if($data['type'])
                            {
                                $pass1 = substr((sha1(time())),0,8);
                                $pass2 = substr((sha1(time())),8,8);
                                if(!$obj->update_password($conn,$email,md5($pass1),md5($pass2))) die('Error occured! Please try again.');
                                $obj->delete_confirm($conn,$email);

                                echo '<p>Your new private password is: '.$pass1.'<br>Your new registration password is: '.$pass2.'</p>';
                            }
                            else
                            {
                                $pass1 = substr((sha1(time())),8,8);
                                if(!$obj->update_password($conn,$email,md5($pass1))) die('Error occured! Please try again.');
                                $obj->delete_confirm($conn,$email);

                                echo '<p>Your new password is: '.$pass1.'</p>';
                            }
                            else
                                echo '<p>Wrong Confirmation Code!</p>';
                        }
                        else
                            echo 'You shouldn\'t be here!<script>window.location="index.php"</script>';
                        ?>
                    </div>
                </div>
            </div>
</div>
<?php require 'include/footerindex.php';?>
