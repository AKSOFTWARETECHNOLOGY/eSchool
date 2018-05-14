<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$mobileNum1 = $_REQUEST['mobileNum'];
$message = $_REQUEST['message'];
//echo $mobileNum . $message;

$xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>MYSKOO</user>
<key>8c505323acXX</key>
<mobile>9444295429</mobile>
<message>Test Msg</message>
<accusage>1</accusage>
<senderid>MYSKOO</senderid>
</child>
</parent>';

$URL = "http://sms.bulkssms.com/submitsms.jsp?";

                                    $ch = curl_init($URL);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                    curl_setopt($ch, CURLOPT_POST, 1);
                                    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    $output = curl_exec($ch);
                                    curl_close($ch);

print_r($output);

?>