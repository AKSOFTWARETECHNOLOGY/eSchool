<?php session_start();
ob_start();
include "config.php";

/* if(isset($_GET["studId"])){
    $studentId = [];
    $studentIds = [];
    $studentId = explode(",", $_GET["studId"]);
    $cnt = count($studentId);
    for ($i = 0; $i < $cnt-1; $i++) {
        $studentIds = $studentId;
    }
} */
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

                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    SMS Details
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <form class="form-horizontal" action="dosendsms.php">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Send SMS to</label>
                                        <div class="col-lg-8">
                                            <?php if(isset($_REQUEST['mobile'])){?>
                                            <input type="text" class="form-control" name="mobileNum" value="<?php echo $_REQUEST['mobile']; ?>" />
                                            <?php }
                                            else { ?>
                                            <select name="jobtype" class="form-control">
                                                <option value="opt1">Staffs</option>
                                                <option value="opt2">Parents of students in Pre-KG(A)</option>
                                                <option value="opt3">Parents of students in LKG(A)</option>
                                                <option value="opt3">Parents of students in LKG(B)</option>
                                                <option value="opt3">Parents of students in LKG(C)</option>
                                                <option value="opt3">Parents of students in UKG(A)</option>
                                                <option value="opt3">Parents of students in UKG(B)</option>
                                                <option value="opt3">Parents of students in UKG(C)</option>
                                                <option value="opt3">Parents of students in I(A)</option>
                                                <option value="opt3">Parents of students in I(B)</option>
                                                <option value="opt3">Parents of students in II(A)</option>
                                                <option value="opt3">Parents of students in II(B)</option>
                                            </select>
                                            <?php } ?>
                                            <input type="checkbox" name="staff"/> Important Message - Send even if the parent has opted not to receive sms.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <textarea rows="5" cols="5" name="message" class="form-control" placeholder="Compose Your Text Message (SMS) Here"></textarea>
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
                                            <input type="submit" value="CLEAR" class="btn btn-info form-control"/>
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
</body>
</html>