<?php
function sendmailfac($conn,$obj,$facId, $subId) {
$faculty = $obj->get_user_details($conn, $facId);

$senderMail = $faculty['email'];
$receiver = $obj->get_coord_email($conn, $subId)->fetch();
$receiverMail = $receiver['email'];
$receiverName = $receiver['name'];
$senderName = $faculty['name'];
// $receiver = $_POST['receiver'];

$subject = "Subject Approval Request";
// $subId = "NCS501";
$subName = $obj->get_subjects_by_id($conn, $subId)->fetch()['subjectName'];

$message = $senderName.", had asked for approval of subject ".$subName." (".$subId.") You are requested here to approve the respective subject so that the faculty can upload question papers further.<br> Thanking you<br>APJAKTU";

// if(mail($receiverMail, $subject, $message, "From: apjaktu.reg@gmail.com"))
// 	echo "Sucees";
// else
// 	echo "error";
?>

<?php
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
   
}

echo "Message has been sent to ".$receiverName;

}
?>