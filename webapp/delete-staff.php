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
        $staffId = $_POST["staff"][$i];

        $class_sql = "select * from class_section where staff_id = '$staffId'";
        $class_exe = mysql_query($class_sql);
        $class_cnt = mysql_num_rows($class_exe);
        if($class_cnt == 0) {
            $delete_class_sql = "UPDATE users set delete_status = 0, updated_at='$date' WHERE id =" . $staffId;
            $delete_class_exe = mysql_query($delete_class_sql);
        }
    }
    header("Location: staff.php?del=1");
}

else{
    header("Location: staff.php?error=1");
}

?>