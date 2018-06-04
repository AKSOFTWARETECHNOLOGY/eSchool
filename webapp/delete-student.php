<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";
$date = date("Y-m-d");
$sendmsg= $_POST["sendMessage"];

if(isset($_POST["student"])) {
    $cnt = count($_POST["student"]);
    if($sendmsg == 1){
        $studId = [];
        $studId = $_POST["student"];
        $studentId = null;
        for ($i = 0; $i < $cnt; $i++) {
            $studentId = $studentId . $studId[$i] . ",";
        }
        header("Location: sms.php?studId=$studentId");
    }
    else{
        for ($i = 0; $i < $cnt; $i++) {
            $delete_class_sql = "UPDATE users set delete_status = 0, updated_at='$date' WHERE id =". $_POST["student"][$i];
            $delete_class_exe = mysql_query($delete_class_sql);
        }
        header("Location: student.php?del=1");
    }
}
else{
    header("Location: student.php?err=1");
}

?>