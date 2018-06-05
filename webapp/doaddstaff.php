<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

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
    $base = basename($_FILES['staffPhoto']['name']);
    if(!empty($base)) {
        $ext = $info['extension'];
        $newname = "staffphoto-" . time() . "." . $ext;
        $target = 'image/' . $newname;
        $moveFile = move_uploaded_file($_FILES['staffPhoto']['tmp_name'], $target);
    }
}


/*$maritalStatus = $_REQUEST['maritalStatus'];
$nationality = $_REQUEST['nationality'];
$spouseName = $_REQUEST['spouseName'];
$bloodGroup = $_REQUEST['bloodGroup'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone'];
$education = $_REQUEST['education'];
$experience = $_REQUEST['experience'];
*/

$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];

$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwdtime = time();
$pwd = md5('123456');

$uName = $firstName . " " . $lastName;

$sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$uName','$email','$pwd','0','1','$date','$date')";
$exe = mysql_query($sql);
$last_id = mysql_insert_id();

$s = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 4)";
$e = mysql_query($s);


$insert_staff_sq1 = "INSERT INTO `staff_info` (user_id, school_id, firstname_person, lastname_person,job_type,job_position,dob,gender,address, city, mobile, email, photo, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id', '$user_id', '$firstName','$lastName','$jobType', '$jobPosition', '$dob','$gender','$address','$cityId','$mobile','$email','$target','$username','$username','$date','$date')";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: staff.php?suc=1");

?>