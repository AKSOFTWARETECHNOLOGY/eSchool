<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(isset($_POST["student"])) {
    $cnt = count($_POST["student"]);
    for ($i = 0; $i < $cnt; $i++) {
        $delete_class_sql = "UPDATE users set delete_status = 0 WHERE id =". $_POST["student"][$i];
        $delete_class_exe = mysql_query($delete_class_sql);
    }
    header("Location: student.php?suc=1");
}

else{
    header("Location: student.php?err=1");
}

?>