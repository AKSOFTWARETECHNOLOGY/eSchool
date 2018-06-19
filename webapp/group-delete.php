<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";
$date = date("Y-m-d");

if(isset($_REQUEST['staff_id'])){
    $staffId = $_REQUEST['staff_id'];
    $delete_staff_sq1 = "UPDATE `group_master` set group_status = 0,  updated_at='$date' where id = '$staffId'";
    $delete_staff_exe = mysql_query($delete_staff_sq1);

    header("Location: staff-group-list.php?suc=2");
}

if(isset($_REQUEST['stud_id'])){
    $studId = $_REQUEST['stud_id'];
    $delete_stud_sq1 = "UPDATE `group_master` set group_status = 0,  updated_at='$date' where id = '$studId'";
    $delete_stud_exe = mysql_query($delete_stud_sq1);

    header("Location: student-group-list.php?suc=2");
}

?>