<?php session_start();
ob_start();
include "config.php";

$studentId = $_REQUEST['student_id'];

$stud_sql="SELECT si.*, c.city_name, cls.class_name as class, s.section_name FROM `student_info` as si
LEFT JOIN `cities` as c ON c.id = si.city
LEFT JOIN `classes` as cls ON cls.id = si.class_name
LEFT JOIN `section` as s ON s.id = si.class_section_name
LEFT JOIN `users` ON users.id = si.user_id
where si.user_id=$studentId and users.delete_status=1";
$stud_exe=mysql_query($stud_sql);
$stud_fet=mysql_fetch_array($stud_exe);
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
    <title>MySkoo - View Student</title>
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
                        <h4><i class="fa fa-pencil position-left"></i> STUDENT DETAILS</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="student.php">Student</a></li>
                        <li class="active"> Student Details</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-10 col-sm-6 col-lg-10"></div>
                    <div class="col-md-2 col-sm-6 col-lg-2">
                        <a href="student-edit.php?student_id=<?php echo $stud_fet['user_id']; ?>">
                            <button type="button" class="form-control btn btn-info">Edit Student</button>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Personal Details
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">First Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['firstname_person']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Last Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['lastname_person']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Class</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['class']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Section</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['section_name']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Date of Birth</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['dob']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Gender</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['gender']; ?>" readonly/>
                                    </div>
                                </div>

                                <?php
                                if(!empty($stud_fet['photo']))
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Photo</label>
                                        <div class="col-lg-8">
                                            <img style="height: 150px; width: 150px;" src="<?php echo $stud_fet['photo']; ?>" alt="<?php echo $stud_fet['firstname_person']; ?>" title="<?php echo $staff_fet['firstname_person']; ?>" />
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Contact Details
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Mobile</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['mobile']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['email']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Address</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['address']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">City</label>

                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $stud_fet['city_name']; ?>" readonly/>
                                    </div>
                                </div>
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