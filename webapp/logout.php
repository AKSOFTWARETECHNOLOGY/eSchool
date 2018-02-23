<?php session_start();
ob_start();

include "config.php";

if(isset($_SESSION['schooluserid']))
{
    unset($_SESSION['schooluserid']);
    unset($_SESSION['schoolusername']);
    unset($_SESSION['schooluseremail']);
    unset($_SESSION['schooluserrole']);

    header("Location: index.php?success=1");
}
else
{
    header("Location: index.php?success=1");
}
?>