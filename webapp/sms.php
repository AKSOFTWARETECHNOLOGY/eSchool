<?php session_start();
ob_start();
include "config.php";
$user_id=$_SESSION['adminuserid'];

$mobile = [];
if(isset($_REQUEST["student_id"])) {
    $studId = $_REQUEST['student_id'];

    $stu_sql="SELECT * FROM `student_info` where user_id=$studId";
    $stu_exe=mysql_query($stu_sql);
    $stu_cnt=@mysql_num_rows($stu_exe);
    $stu_fet=mysql_fetch_array($stu_exe);
}

if(isset($_REQUEST["staff_id"])) {
    $staffId = $_REQUEST['staff_id'];

    $staff_sql="SELECT * FROM `staff_info` where user_id=$staffId";
    $staff_exe=mysql_query($staff_sql);
    $staff_cnt=@mysql_num_rows($staff_exe);
    $staff_fet=mysql_fetch_array($staff_exe);
}

if(isset($_GET["studId"])){
    $phone = null;
    $studentId = [];
    $studentIds = [];
    $studentId = explode(",", $_GET["studId"]);
    $cnt = count($studentId);
    for ($i = 0; $i < $cnt-1; $i++) {
        $studentIds = $studentId;
        $stu_sql="SELECT mobile FROM `student_info` where user_id =$studentIds[$i]";
        $stu_exe=mysql_query($stu_sql);
        $stu_fet=mysql_fetch_array($stu_exe);
        $mobile[$i] = $stu_fet['mobile'];
        $phone = $phone . $mobile[$i] . ",";
    }
}

$group_sql="SELECT DISTINCT grp.group_name, grp.id FROM `group_info` as gi
LEFT JOIN group_master as grp on grp.id = gi.group_id
where gi.school_id=$user_id and grp.group_status=1";
$group_exe=mysql_query($group_sql);
$group_results = array();
while($row = mysql_fetch_assoc($group_exe)) {
    array_push($group_results, $row);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Send SMS</title>
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
                        <h4><i class="fa fa-pencil position-left"></i> SMS</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li>Message</li>
                        <li class="active">SMS</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <?php
                if(isset($_REQUEST['succ'])) {
                    if ($_REQUEST['succ'] == 1) {
                        ?>
                        <div class="alert alert-success alert-dismessible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>SMS sent Successfully</strong>
                        </div>
                    <?php
                    }
                }
                ?>
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    SMS Details
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <form class="form-horizontal" action="dosendsms.php" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Send SMS to</label>
                                        <div class="col-lg-8">
                                            <?php if(isset($stu_cnt)){?>
                                            <select name="mobileNum" class="form-control">
                                                <option value="<?php echo $stu_fet['mobile']; ?>"><?php echo $stu_fet['firstname_person'] . " " . $stu_fet['lastname_person']; ?></option>
                                            </select>

                                            <!-- <input type="text" class="form-control" name="mobileNum" value="<?php echo $phone; ?>" />-->
                                            <?php }
                                            else if(isset($staff_cnt)){
                                                ?>
                                                <select name="mobileNum" class="form-control">
                                                    <option value="<?php echo $staff_fet['mobile']; ?>"><?php echo $staff_fet['firstname_person'] . " " . $staff_fet['lastname_person']; ?></option>
                                                </select>
                                            <?php }
                                            else { ?>
                                            <select name="smsGroup[]" class="form-control" multiple="multiple" style="height:100px;">
                                                <option value="">Select the Group</option>
                                                <?php
                                                foreach($group_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['group_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?php } ?>
                                            <input type="checkbox" name="staff"/> Important Message - Send even if the parent has opted not to receive sms.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <textarea rows="5" cols="5" name="message" id="message" class="form-control" placeholder="Compose Your Text Message (SMS) Here"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Number of characters: 0 (1 credit)</label>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-8">
                                            <input type="checkbox" name="staff"/> Send in other language
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="submit" value="SEND TEXT MESSAGE" class="btn btn-info form-control"/>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" value="CLEAR" id="clearBtn" class="btn btn-info form-control"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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

<script>
    $(document).ready(function(){
        $("#clearBtn").click(function(){
            $("#message").val(" ");
        });
    });
</script>
</body>
</html>