<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$jobType = $_REQUEST['jobType'];
$jobPosition = $_REQUEST['jobPosition'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$maritalStatus = $_REQUEST['maritalStatus'];
$nationality = $_REQUEST['nationality'];
$spouseName = $_REQUEST['spouseName'];
$bloodGroup = $_REQUEST['bloodGroup'];

$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];

$education = $_REQUEST['education'];
$experience = $_REQUEST['experience'];

$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwdtime = time();
$pwd = md5('123456');

$uName = $firstName . $lastName;

$sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$uName','$email','$pwd','0','1','$date','$date')";
$exe = mysql_query($sql);
$last_id = mysql_insert_id();

$s = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 4)";
$e = mysql_query($s);

$insert_staff_sq1 = "INSERT INTO `staff_info` (user_id, school_id, firstname_person, lastname_person,job_type,job_position,dob,gender,marital,spouse_name,nationality,blood_group,address, city, state, country, pincode, telephone, mobile, email, degree, experience, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id', '$user_id', '$firstName','$lastName','$jobType', '$jobPosition', '$dob','$gender','$maritalStatus', '$spouseName', '$nationality','$bloodGroup','$address','$cityId','$state','$countryId','$pincode','$telephone','$mobile','$email','$education','$experience','$username','$username','$date','$date')";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: staff.php?suc=1");

?>