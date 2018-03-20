<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(isset($_POST["class"])) {
    $cnt = count($_POST["class"]);
    for ($i = 0; $i < $cnt; $i++) {
        $delete_class_sql = "UPDATE class_section set class_section_status = 0 WHERE id =". $_POST["class"][$i];
        $delete_class_exe = mysql_query($delete_class_sql);
    }
    header("Location: class.php?suc=1");
}

else{
    header("Location: class.php?err=1");
}

?>