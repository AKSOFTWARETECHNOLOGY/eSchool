<?php session_start();
ob_start();
include "config.php";

$grpId = $_REQUEST['group_id'];

$staff_sql="SELECT grp.group_name, users.name FROM `group_info` as gi
LEFT JOIN `group_master` as grp ON grp.id = gi.group_id
LEFT JOIN `users` ON users.id = gi.user_id
where gi.group_id=$grpId and gi.group_info_status=1";
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
    <title>MySkoo - View Student Group</title>
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
                        <h4><i class="fa fa-pencil position-left"></i> STUDENT GROUP</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active"> Student Group</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <!-- basic datatable -->
                        <div class="panel panel-flat">
                            <div class="panel-heading" style="margin: 10px;">
                                <h4 class="panel-title">Group Details</h4>
                            </div>
                            <?php
                            if($staff_cnt>0)
                            {
                                ?>
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>GROUP NAME</th>
                                        <th>GROUP MEMBERS</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td> <?php echo $staff_fet['group_name']; ?></td>

                                        <td>
                                            <?php
                                            echo '<div style="margin-bottom:10px;">' . $staff_fet['name'] . '</div>';
                                            while($staff_fet=mysql_fetch_array($staff_exe))
                                            {
                                                echo '<div style="margin-bottom:10px;">' . $staff_fet['name'] . '</div>';
                                            }
                                            ?>
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            <?php
                            }
                            else{
                                ?>
                                <p><b> No Results Found. </b></p>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- /basic datatable -->

                    </div>
                </div>
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