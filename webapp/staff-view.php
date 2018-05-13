<?php session_start();
ob_start();
include "config.php";

$staffId = $_REQUEST['staff_id'];

$staff_sql="SELECT si.*, c.city_name FROM `staff_info` as si
LEFT JOIN `cities` as c ON c.id = si.city
LEFT JOIN `users` ON users.id = si.user_id
where si.user_id=$staffId and users.delete_status=1";
$staff_exe=mysql_query($staff_sql);
$staff_cnt=@mysql_num_rows($staff_exe);
$staff_fet=mysql_fetch_array($staff_exe);
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
    <title>MySkoo - View Staff</title>
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
                        <h4><i class="fa fa-pencil position-left"></i> STAFF DETAILS</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="staff.php">Staff</a></li>
                        <li class="active"> Staff Details</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-10 col-sm-6 col-lg-10"></div>
                    <div class="col-md-2 col-sm-6 col-lg-2">
                        <a href="staff-edit.php?staff_id=<?php echo $staff_fet['user_id']; ?>">
                            <button type="button" class="form-control btn btn-info">Edit Staff</button>
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
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['firstname_person']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Last Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['lastname_person']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Job Type</label>
                                    <div class="col-lg-8">
                                        <?php
                                        if($staff_fet['job_type'] == 1){
                                            ?>
                                        <input type="text" class="form-control" value="<?php echo 'Teaching Staff'; ?>" readonly/>
                                        <?php
                                        }
                                        elseif($staff_fet['job_type'] == 2)
                                        {
                                        ?>
                                        <input type="text" class="form-control" value="<?php echo 'Non Teaching Staff'; ?>" readonly/>
                                        <?php
                                        }
                                        elseif($staff_fet['job_type'] == 3) {
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo 'Office Clerk'; ?>" readonly/>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Job Position</label>
                                    <div class="col-lg-8">
                                        <?php
                                        if($staff_fet['job_position'] == 1){
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo 'Principal'; ?>" readonly/>
                                        <?php
                                        }
                                        elseif($staff_fet['job_position'] == 2)
                                        {
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo 'Junior Staff'; ?>" readonly/>
                                        <?php
                                        }
                                        elseif($staff_fet['job_position'] == 3) {
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo 'Senior Staff'; ?>" readonly/>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Date of Birth</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['dob']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Gender</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['gender']; ?>" readonly/>
                                    </div>
                                </div>

                                <?php
                                if(!empty($staff_fet['photo']))
                                {
                                ?>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Photo</label>
                                        <div class="col-lg-8">
                                            <img style="height: 150px; width: 150px;" src="<?php echo $staff_fet['photo']; ?>" alt="<?php echo $staff_fet['firstname_person']; ?>" title="<?php echo $staff_fet['firstname_person']; ?>" />
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
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['mobile']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['email']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Address</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['address']; ?>" readonly/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">City</label>

                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" value="<?php echo $staff_fet['city_name']; ?>" readonly/>
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