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
$className = $_REQUEST['className'];
$sectionName = $_REQUEST['sectionName'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
/* $nationality = $_REQUEST['nationality'];
$religion = $_REQUEST['religion'];
$language = $_REQUEST['language'];
$bloodGroup = $_REQUEST['bloodGroup'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone']; */
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];

$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$target = null;

if(isset($_FILES['studPhoto'])){
    $info = pathinfo($_FILES['studPhoto']['name']);
    $base = basename($_FILES['studPhoto']['name']);
    if(!empty($base)) {
        $ext = $info['extension'];
        $newname = "studentphoto-" . time() . "." . $ext;
        $target = 'image/' . $newname;
        $moveFile = move_uploaded_file($_FILES['studPhoto']['tmp_name'], $target);
    }
}

$pwdtime = time();
$pwd = md5('123456');

$uName = $firstName . $lastName;

$sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$uName','$email','$pwd','0','1','$date','$date')";
$exe = mysql_query($sql);
$last_id = mysql_insert_id();

$s = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 5)";
$e = mysql_query($s);

$insert_staff_sq1 = "INSERT INTO `student_info` (user_id, school_id, firstname_person, lastname_person,class_name,class_section_name,dob,gender,address, city, mobile, email, photo, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id', '$user_id', '$firstName','$lastName','$className', '$sectionName', '$dob','$gender','$address','$cityId','$mobile','$email','$target','$username','$username','$date','$date')";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: student.php?suc=1");

?>