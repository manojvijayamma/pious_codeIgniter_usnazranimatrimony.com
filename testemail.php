<?PHP
$sender = 'support@usnazranimatrimony.com';
$recipient = 'manojvijayanaluva@gmail.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender.PHP_EOL;
$headers .= "CC: pious.pious@gmail.com".PHP_EOL;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
    
    
}
else
{
    echo "Error: Message not accepted";
}
?>