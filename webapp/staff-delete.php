<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$staffId = $_REQUEST['staff_id'];
$date = date("Y-m-d");

$class_sql = "select * from class_section where staff_id = '$staffId'";
$class_exe = mysql_query($class_sql);
$class_cnt = mysql_num_rows($class_exe);

if($class_cnt == 0) {
    $insert_staff_sq1 = "UPDATE `users` set delete_status = 0,  updated_at='$date' where id = '$staffId'";
    $insert_staff_exe = mysql_query($insert_staff_sq1);

    header("Location: staff.php?del=1");
}
else{
    header("Location: staff.php?error=1");
}

?>