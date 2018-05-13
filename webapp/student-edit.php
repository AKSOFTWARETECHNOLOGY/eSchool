<?php session_start();
ob_start();
include "config.php";
$user_id=$_SESSION['adminuserid'];

$city_sql="SELECT * FROM `cities` where `city_status`=1";
$city_exe=mysql_query($city_sql);
$city_results = array();
while($row = mysql_fetch_assoc($city_exe)) {
    array_push($city_results, $row);
}

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
        .req, .error{
            color : red;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Edit Student</title>
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
                        <h4><i class="fa fa-pencil position-left"></i> EDIT STUDENT</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="staff.php">Student</a></li>
                        <li class="active">Edit Student</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <form role="form" id="addStaffForm" class="form-horizontal" method="post" action="doupdatestudent.php" enctype="multipart/form-data">
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
                                        <label class="control-label col-lg-4">First Name<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control"  value="<?php echo $stud_fet['firstname_person']; ?>" placeholder="Enter your first name" name="firstName">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Last Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Enter your last name" name="lastName"  value="<?php echo $stud_fet['lastname_person']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Class <span class="req"> *</span> </label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="class" id="class">
                                                <option value="">Select Class</option>
                                                <?php
                                                foreach($class_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($stud_fet['class_name'] == $value['id']) echo "selected"; ?>><?php echo $value['class_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Section <span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="section" id="section">
                                                <option value="">Select Section</option>
                                                <?php
                                                foreach($section_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($stud_fet['class_section_name'] == $value['id']) echo "selected"; ?>><?php echo $value['section_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Date of Birth<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" name="dob" value="<?php echo $stud_fet['dob']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Gender<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <select name="gender" class="form-control">
                                                <option value="Male" <?php if($stud_fet['gender'] == 'Male') echo "selected"; ?>>Male</option>
                                                <option value="Female" <?php if($stud_fet['gender'] == 'Female') echo "selected"; ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Photo</label>
                                        <div class="col-lg-8">
                                            <img style="height: 150px; width: 150px;" src="<?php echo $stud_fet['photo']; ?>" alt="<?php echo $stud_fet['firstname_person']; ?>" title="<?php echo $stud_fet['firstname_person']; ?>" />
                                            <input type="file" class="form-control" name="studPhoto">
                                        </div>
                                    </div>
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
                                        <label class="control-label col-lg-4">Mobile<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" maxlength="10" name="mobile" value="<?php echo $stud_fet['mobile']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Email<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $stud_fet['email']; ?>"readonly>
                                            <span class="error" id="emailstatus"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Address<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Address" name="address"> <?php echo $stud_fet['address']; ?> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">City<span class="req"> *</span></label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="cityId" id="cityId">
                                                <option value="">Select City</option>
                                                <?php
                                                foreach($city_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($stud_fet['city'] == $value['id']) echo "selected"; ?>><?php echo $value['city_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <input type="hidden" class="form-control" name="studentId" value="<?php echo $studentId; ?>">
                            <input type="submit" value="SAVE" class="btn btn-info form-control"/>
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

<script>
    $("input#email").change(function(){
        var email = $("input#email").val();
        var BASEURL = "http://localhost/eSchool/webapp/";
        var status = 1;
        var callurl = BASEURL + 'ajax-check-email.php?email='+email;

        $.ajax({
            url: callurl,
            type: "get",
            data: {"email": email, "status": status},
            success: function (data) {
                var obj = JSON.parse(data);
                if(obj.status==1)
                {
                    $("#emailstatus").text("");
                }
                else if(obj.status==2)
                {
                    $("input#email").val("");
                    $("#emailstatus").text(obj.email+" Email Already Exists!");
                }
            }
        });
    });
</script>

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
        $("form#addStaffForm").validate({
            // Specify validation rules
            rules: {
                firstName: {
                    required: true,
                    lettersonly: true
                },
                jobType: {
                    required: true
                },
                jobPosition: {
                    required: true
                },
                dob: {
                    required: true
                },
                gender: {
                    required: true
                },
                mobile: {
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    required: true
                },
                cityId: "required",
                address: "required"
            },
            // Specify validation error messages
            messages: {
                firstName: {
                    required: "Please enter your Name",
                    lettersonly: "Your Name must be of characters"
                },
                jobType: {
                    required: "Please enter the Job Type"
                },
                jobPosition: {
                    required: "Please provide the Job Position"
                },
                dob: {
                    required: "Please provide the DOB"
                },
                gender: {
                    required: "Please provide the Gender"
                },
                mobile: {
                    required: "Please provide the Mobile Number",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 10 characters long"
                },
                email: {
                    required: "Please provide a valid email"
                },
                cityId: "Please choose your City",
                address: "Please enter your Address"
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