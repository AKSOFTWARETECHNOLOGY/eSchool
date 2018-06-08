<?php session_start();
ob_start();
include "config.php";

$classId = $_REQUEST['class_id'];

$class_sql="SELECT cs.*, classes.class_name, section.section_name, users.name as staff_name FROM `class_section` as cs
 LEFT JOIN `classes` ON classes.id = cs.class_id
 LEFT JOIN `section` ON section.id = cs.section_id
 LEFT JOIN `users` ON users.id = cs.staff_id
 where cs.id = $classId and cs.class_section_status=1";
$class_exe=mysql_query($class_sql);
$class_fet=mysql_fetch_array($class_exe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form-group{
            min-height: 25px;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - View Class</title>
    <?php include "head-inner.php"; ?>
</head>
<body>
<!-- Main navbar -->
<?php
include 'header.php';
?>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container" style="min-height:700px">

    <!-- Page content -->
    <div class="page-content"><!-- Main sidebar -->
        <div class="sidebar sidebar-main hidden-xs">
            <?php include "sidebar.php"; ?>
        </div>
        <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="fa fa-pencil position-left"></i> CLASS DETAILS</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="class.php">Class</a></li>
                        <li class="active"> Class Details</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Class Details
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Class Room</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $class_fet['class_name'] . ' (' .$class_fet['section_name'] . ')'; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Class Teacher</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $class_fet['staff_name']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Number of Students</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php calculateNumOfStudents($class_fet['class_id'], $class_fet['section_id']); ?>" readonly/>
                                    </div>
                                </div>

                                <?php
                                function calculateNumOfStudents($cid, $sid){
                                    $stu_sql="SELECT * FROM `student_info` as si
LEFT JOIN `users` ON users.id = si.user_id
 where si.class_name=$cid and si.class_section_name=$sid and users.delete_status=1";
                                    $stu_exe=mysql_query($stu_sql);
                                    $stu_cnt=@mysql_num_rows($stu_exe);
                                    if($stu_cnt != 0){
                                        echo $stu_cnt;
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content area -->

                <!-- Footer -->
                <?php include "footer.php"; ?>
                <!-- /footer -->

            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->

</body>
</html>