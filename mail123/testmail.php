<?php

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "usnazranimatrimony.com";
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "test@usnazranimatrimony.com";
$mail->Password = "[}5b1Cq@dKHTz";

$mail->From = "test@usnazranimatrimony.com";
$mail->FromName = "Test from Info";
$mail->AddAddress("mailhostingserver@gmail.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Test message from server";
$mail->Body = "Test Mail<b>in bold!</b>";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "Message has been sent";

?>