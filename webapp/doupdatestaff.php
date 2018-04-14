<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$staffId = $_REQUEST['staffId'];
$target = null;
$user_id=$_SESSION['adminuserid'];
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$jobType = $_REQUEST['jobType'];
$jobPosition = $_REQUEST['jobPosition'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];

if(isset($_FILES['staffPhoto'])){
    $info = pathinfo($_FILES['staffPhoto']['name']);
    $staffName = basename($_FILES['staffPhoto']['name']);
    //$ext = $info['extension'];
    //$newname = "staff-".$ext;
    $target = 'image/'.$staffName;
    $moveFile = move_uploaded_file($_FILES['staffPhoto']['tmp_name'],$target);
}

$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];

$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$insert_staff_sq1 = "UPDATE `staff_info` set firstname_person = '$firstName', lastname_person = '$lastName',job_type = '$jobType',
job_position = '$jobType',dob = '$dob', gender = '$gender', address='$address', city = '$cityId', mobile = '$mobile', photo = '$target', updated_by = '$username', updated_at='$date'
where user_id = '$staffId'";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: staff.php?suc=1");

?>