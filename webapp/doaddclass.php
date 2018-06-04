<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$classlevel = $_REQUEST['classlevel'];
$classsection = $_REQUEST['classsection'];
$classTeacher = $_REQUEST['classTeacher'];
//$numOfStudents = $_REQUEST['numOfStudents'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$insert_staff_sq1 = "INSERT INTO `class_section` (class_id, section_id, staff_id, school_id,created_by, updated_by, created_at, updated_at)
VALUES ('$classlevel', '$classsection', '$classTeacher','$user_id','$username','$username','$date','$date')";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: class.php?suc=1");

?>