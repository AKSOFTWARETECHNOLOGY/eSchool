<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$date = date("Y-m-d");

if(isset($_POST["staff"])) {
    $cnt = count($_POST["staff"]);
    for ($i = 0; $i < $cnt; $i++) {
        $delete_class_sql = "UPDATE users set delete_status = 0, updated_at='$date' WHERE id =". $_POST["staff"][$i];
        $delete_class_exe = mysql_query($delete_class_sql);
    }
    header("Location: staff.php?suc=1");
}

else{
    header("Location: staff.php?err=1");
}

?>