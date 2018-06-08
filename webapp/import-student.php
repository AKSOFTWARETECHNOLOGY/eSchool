<?php session_start();
ob_start();
include "config.php";

$user_id=$_SESSION['adminuserid'];

$class_sql="SELECT DISTINCT c.* FROM `classes` as c
LEFT JOIN `class_section` as cs ON cs.class_id = c.id
where c.class_status=1 and cs.class_section_status=1 and cs.school_id=$user_id";
$class_exe=mysql_query($class_sql);
$class_results = array();
while($row = mysql_fetch_assoc($class_exe)) {
    array_push($class_results, $row);
}

$section_sql="SELECT DISTINCT s.* FROM `section` as s
LEFT JOIN `class_section` as cs ON cs.section_id = s.id
where s.section_status=1 and cs.class_section_status=1 and cs.school_id=$user_id";
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
    <title>MySkoo - Student</title>
    <?php include "head-inner.php"; ?>

    <style>
        .req, label.error{
            color: red;
        }
    </style>
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
                        <h4><i class="fa fa-th-large position-left"></i> IMPORT STUDENT</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Import Student</li>
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
                                <h4 class="panel-title">Import Student</h4>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="doimportstudent.php" method="POST" id="importStudentForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Class <span class="req"> *</span> </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="className" id="class" required>
                                                    <option value="">Select Class</option>
                                                    <?php
                                                    foreach($class_results as $key => $value){ ?>
                                                        <option value="<?php echo $value['id']; ?>" ><?php echo $value['class_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Section <span class="req"> *</span></label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="section" id="section" required>
                                                    <option value="">Select Section</option>
                                                    <?php
                                                    foreach($section_results as $key => $value){ ?>
                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['section_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

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

<script src="js/jquery.validate.min.js"></script>

<script>
    // Wait for the DOM to be ready
    $(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
        });

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form#importStudentForm").validate({
            // Specify validation rules
            rules: {
                className: "required",
                section: "required"
            },
            // Specify validation error messages
            messages: {
                className: {
                    required: "Provide the Class"
                },
                section: {
                    required: "Provide the Section"
                }

            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>


</body>
</html>