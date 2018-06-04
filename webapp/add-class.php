<?php session_start();
ob_start();
include "config.php";

$user_id=$_SESSION['adminuserid'];

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

$staff_sql="SELECT si.* FROM `staff_info` as si
 LEFT JOIN `users` ON users.id = si.user_id
 where si.school_id=$user_id and users.delete_status=1";
$staff_exe=mysql_query($staff_sql);
$staff_results = array();
while($row = mysql_fetch_assoc($staff_exe)) {
    array_push($staff_results, $row);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .req, .error{
            color : red;
        }
    </style>

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
                <form class="form-horizontal" action="doaddclass.php" id="addclassform">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        Class Details
                                    </h4>
                                </div>
                                <div class="panel-body no-padding-bottom">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Class Level<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="classlevel" id="classlevel">
                                                <option value="">Select Class Level</option>
                                                <?php
                                                foreach($class_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['class_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Class Section<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="classsection" id="classsection">
                                                <option value="">Select Class Section</option>
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
                                        <label class="control-label col-lg-4">Class Teacher<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <select name="classTeacher" class="form-control">
                                                <option value="">Select Class Teacher</option>
                                                <?php
                                                foreach($staff_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['user_id']; ?>"><?php echo $value['firstname_person']. ' ' . $value['lastname_person']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group hidden">
                                        <label class="control-label col-lg-4">Num of Students</label>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" name="numOfStudents">
                                        </div>
                                    </div>
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
                </form>
                <!-- /form horizontal -->
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

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

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
        $("form#addclassform").validate({
            // Specify validation rules
            rules: {
                classlevel: {
                    required: true
                },
                classsection: {
                    required: true
                },
                classTeacher: {
                    required: true
                }
            },
            // Specify validation error messages
            messages: {
                classlevel: {
                    required: "Please select the class level"
                },
                classsection: {
                    required: "Please select the class section"
                },
                classTeacher: {
                    required: "Please select the class teacher"
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