<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$staffId = $_REQUEST['staff_id'];

$insert_staff_sq1 = "UPDATE `users` set delete_status = 0 where id = '$staffId'";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: staff.php?suc=1");

?>