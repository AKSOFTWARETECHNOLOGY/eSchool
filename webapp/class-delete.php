<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$classId = $_REQUEST['class_id'];

$del_class_sq1 = "UPDATE `class_section` set class_section_status = 0 where id = '$classId'";
$del_class_exe = mysql_query($del_class_sq1);

header("Location: class.php?del=1");

?>