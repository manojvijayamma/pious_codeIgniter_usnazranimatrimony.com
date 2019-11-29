<?php
require './vendor/autoload.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

$params = array(
    'credentials' => array(
        'key' => 'AKIAQPGVTS7F6MLIDMUI',
        'secret' => 'YTMthrlPKxZIUZI5XYyQxVydnKcAOk67+m7dg5p6',
    ),
    'region' => 'us-west-2', // < your aws from SNS Topic region
    'version' => 'latest'
);
$sns = new \Aws\Sns\SnsClient($params);

$args = array(
    "MessageAttributes" => [
                'AWS.SNS.SMS.SenderID' => [
                    'DataType' => 'String',
                    'StringValue' => 'Notice'
                ],
                'AWS.SNS.SMS.SMSType' => [
                    'DataType' => 'String',
                    'StringValue' => 'Transactional'
                ]
            ],
    "Message" => "000000 is your one time password for usnazmatrimonial.com",
    "PhoneNumber" => "00919847483390"
);


$result = $sns->publish($args);
echo "<pre>";
var_dump($result);
echo "</pre>";