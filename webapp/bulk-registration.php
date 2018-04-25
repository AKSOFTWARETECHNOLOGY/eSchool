<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

error_reporting(0);
include "config.php";

/*
$city_sql="SELECT * FROM `cities` where `city_status`=1";
$city_exe=mysql_query($city_sql);
$city_results = array();
while($row = mysql_fetch_assoc($city_exe)) {
    array_push($city_results, $row);
}

$state_sql="SELECT * FROM `states` where `state_status`=1";
$state_exe=mysql_query($state_sql);
$state_results = array();
while($row = mysql_fetch_assoc($state_exe)) {
    array_push($state_results, $row);
}

$country_sql="SELECT * FROM `countries` where `country_status`=1";
$country_exe=mysql_query($country_sql);
$country_results = array();
while($row1 = mysql_fetch_assoc($country_exe)) {
    array_push($country_results, $row1);
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IIRSI Web Admin - Bulk Registration</title>
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
                        <h4><i class="fa fa-th-large position-left"></i> BULK REGISTRATION</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="list-registration.php">Registration</a></li>
				<li class="active">Bulk Registration</li>
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
                            <div class="panel-heading">
                                <h4 class="panel-title">Bulk Registration</h4>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="dobulkregistration.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="file" name="file" class="file-styled-primary" accept=".xlsx" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-1">
                                                <input type="reset" name="reset" class="btn btn-info" value="Cancel">
                                            </div>
                                            <div class="col-lg-1">
                                                <input type="submit" name="submit" class="btn btn-info" value="Upload">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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