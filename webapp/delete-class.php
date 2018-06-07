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
        $classId = $_POST["class"][$i];

        $class_sql = "select * from class_section where id = '$classId'";
        $class_exe = mysql_query($class_sql);
        $class_fet = mysql_fetch_array($class_exe);
        $studClassId = $class_fet['class_id'];
        $studSectionId = $class_fet['section_id'];

        $student_sql = "select si.* from student_info as si
LEFT JOIN `users` ON users.id = si.user_id
 where si.class_name = '$studClassId' and si.class_section_name = '$studSectionId' and users.delete_status = '1'";
        $student_exe = mysql_query($student_sql);
        $student_cnt = mysql_num_rows($student_exe);

        if($student_cnt == 0){
            $del_class_sq1 = "UPDATE `class_section` set class_section_status = 0 where id = '$classId'";
            $del_class_exe = mysql_query($del_class_sq1);
        }
    }
    header("Location: class.php?del=1");
}

else{
    header("Location: class.php?err=1");
}

?>