<?php session_start();
ob_start();
include "config.php";

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

$mobileNum = [];
$message = null;

if(isset($_REQUEST['mobileNum'])){
    $mobNum = $_REQUEST['mobileNum'];
    $mobileNum = explode(",",$mobNum);
}

if(!empty($_REQUEST['message'])){
    $message = $_REQUEST['message'];
}
else{
    $message = "Test Msg";
}

$group_results = array();
if(isset($_REQUEST['smsGroup'])) {
    if(!empty($_REQUEST['smsGroup'])){
        $grpId = $_REQUEST['smsGroup'];
        $grpIds = implode(',', $grpId);
        $group_sql="SELECT gi.mobile_num FROM `group_info` as gi
LEFT JOIN group_master as grp on grp.id = gi.group_id
where gi.group_id in ($grpIds) and gi.group_info_status=1";
        //echo $group_sql; exit;
        $group_exe=mysql_query($group_sql);

        while($row = mysql_fetch_assoc($group_exe)) {
            array_push($group_results, $row);
        }
        for($j= 0; $j<count($group_results); $j++){
            $mobileNum[$j] = $group_results[$j]['mobile_num'];
        }
    }
}

/*$mobileNum[0] = '9444295429';
$mobileNum[1] = '9444293520';
$mobileNum[2] = '9841486644';*/
$cnt = count($mobileNum);

for($i=0;$i<$cnt;$i++){
    $xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>MYSKOO</user>
<key>8c505323acXX</key>
<mobile>'.$mobileNum[$i] .'</mobile>
<message>'.$message.'</message>
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

    //print_r($output);
}

header("Location: sms.php?succ=1");

?>