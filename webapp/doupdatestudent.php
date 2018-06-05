<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$studentId = $_REQUEST['studentId'];
$target = null;
$user_id=$_SESSION['adminuserid'];
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$studentName = $firstName . " " . $lastName;
$class = $_REQUEST['class'];
$section = $_REQUEST['section'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];

if(isset($_FILES['studPhoto']) && (!empty($_FILES['studPhoto']))){
    $info = pathinfo($_FILES['studPhoto']['name']);
    $base = basename($_FILES['studPhoto']['name']);
    if(!empty($base))
    {
        $ext = $info['extension'];
        $newname = "studentphoto-".time(). ".".$ext;
        $target = 'image/'.$newname;
        $moveFile = move_uploaded_file($_FILES['studPhoto']['tmp_name'],$target);

        $photo_sq1 = "UPDATE `student_info` set photo = '$target', updated_by = '$username', updated_at='$date'
where user_id = '$studentId'";
        $photo_exe = mysql_query($photo_sq1);
    }
}

$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];

$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$insert_user_sq1 = "UPDATE `users` set name = '$studentName', updated_at='$date' where id = '$studentId'";
$insert_user_exe = mysql_query($insert_user_sq1);

$insert_staff_sq1 = "UPDATE `student_info` set firstname_person = '$firstName', lastname_person = '$lastName',class_name = '$class',
class_section_name = '$section',dob = '$dob', gender = '$gender', address='$address', city = '$cityId', mobile = '$mobile', updated_by = '$username', updated_at='$date'
where user_id = '$studentId'";
$insert_staff_exe = mysql_query($insert_staff_sq1);

header("Location: student.php?succ=1");

?>