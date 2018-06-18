<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(!empty($_REQUEST['studId'])){
    $groupName = $_REQUEST['groupName'];
    $studId = $_REQUEST['studId'];
    $staff = explode(",",$studId);
    $cnt = sizeof($staff);
    $user_id=$_SESSION['adminuserid'];
    $date = date("Y-m-d");

    if($cnt > 0){
        $insert_group_sql = "INSERT INTO `group_master` (group_name, group_type, group_status) values ('$groupName', 'Parents','1')";
        $insert_group_exe = mysql_query($insert_group_sql);
        $group_id = mysql_insert_id();

        for($i = 0; $i<$cnt; $i++) {
            $insert_group_info_sql = "INSERT INTO `group_info` (group_id, user_id, school_id, group_info_status) values ('$group_id', '$staff[$i]','$user_id', '1')";
            $insert_group_info_exe = mysql_query($insert_group_info_sql);
        }

        header("Location: student-group-list.php?suc=1");
    }
    else{
        header("Location: student.php?err=1");
    }
}
else{
    header("Location: student.php?err=2");
}

?>