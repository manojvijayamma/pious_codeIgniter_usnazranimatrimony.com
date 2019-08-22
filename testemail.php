<?PHP
echo $_SERVER['USNZM_DB_NAME'];
echo $_SERVER['USNZM_BASE_URL'];exit;
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
