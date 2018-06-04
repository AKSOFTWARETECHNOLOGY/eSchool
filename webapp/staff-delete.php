<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$staffId = $_REQUEST['staff_id'];
$date = date("Y-m-d");

$insert_staff_sq1 = "UPDATE `users` set delete_status = 0,  updated_at='$date' where id = '$staffId'";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: staff.php?del=1");

?>