<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$studentId = $_REQUEST['student_id'];

$insert_staff_sq1 = "UPDATE `users` set delete_status = 0 where id = '$studentId'";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: student.php?del=1");

?>