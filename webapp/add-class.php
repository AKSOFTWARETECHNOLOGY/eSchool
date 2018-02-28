<?php
ob_start();
include "config.php";

$class_sql="SELECT * FROM `classes` where `class_status`=1";
$class_exe=mysql_query($class_sql);
$class_results = array();
while($row = mysql_fetch_assoc($class_exe)) {
    array_push($class_results, $row);
}

$section_sql="SELECT * FROM `section` where `section_status`=1";
$section_exe=mysql_query($section_sql);
$section_results = array();
while($row = mysql_fetch_assoc($section_exe)) {
    array_push($section_results, $row);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Add Class</title>
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
                        <h4><i class="fa fa-pencil position-left"></i> ADD CLASSES</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="class.php">Class</a></li>
                        <li class="active">Add Classes</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Class Details
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <form class="form-horizontal" action="form_basic.htm#">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Class Level</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="classlevel" id="classlevel">
                                                <?php
                                                foreach($class_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['class_name']; ?>"><?php echo $value['class_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Class Section</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="classsection" id="classsection">
                                                <?php
                                                foreach($section_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['section_name']; ?>"><?php echo $value['section_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Class Teacher</label>
                                        <div class="col-lg-8">
                                            <select name="classteacher" class="form-control">
                                                <option value="opt1">Ms.Sajitha</option>
                                                <option value="opt2">Ms.Madona</option>
                                                <option value="opt3">Sr.Stella</option>
                                                <option value="opt1">Ms.Sajitha</option>
                                                <option value="opt2">Ms.Madona</option>
                                                <option value="opt3">Sr.Sherin</option>
                                            </select>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <input type="submit" value="ADD CLASS" class="btn btn-info form-control"/>
                    </div>
                </div>

                <!-- /form horizontal -->
                <!-- Content area -->

                <script type='text/javascript'>
                    $(document).ready(function() {
                        $(function() {
                            // Default file input style
                            $(".file-styled").uniform({
                                fileButtonHtml: 'Browse'
                            });

                            // Default file input style with icon
                            $(".file-styled-icon").uniform({
                                fileButtonHtml: '<i class="fa fa-plus"></i>'
                            });

                            // Primary file input
                            $(".file-styled-primary").uniform({
                                wrapperClass: 'bg-primary',
                                fileButtonHtml: 'Browse'
                            });

                            // Primary file input
                            $(".file-styled-primary-icon").uniform({
                                wrapperClass: 'bg-primary',
                                fileButtonHtml: '<i class="fa fa-plus"></i>'
                            });
                        });
                    });
                </script>
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