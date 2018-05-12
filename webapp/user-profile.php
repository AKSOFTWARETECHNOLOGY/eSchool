<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$user_role=$_SESSION['adminuserrole'];
$user_name=$_SESSION['adminusername'];
$user_email=$_SESSION['adminuseremail'];

$school_sql="SELECT si.* FROM `school_info` AS `si`
WHERE `si`.user_id = $user_id";
$school_exe=mysql_query($school_sql);
$school_cnt=@mysql_num_rows($school_exe);
$school_fet=mysql_fetch_array($school_exe);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Profile</title>
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
                        <h4><i class="fa fa-th-large position-left"></i> USER PROFILE</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">User Profile</li>
                    </ul>

                    <?php
                    if(isset($_REQUEST['succ'])) {
                    if ($_REQUEST['succ'] == 1) {
                    ?>
                    <div class="alert alert-success alert-dismessible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Profile Updated Successfully</strong>
                    </div>
                    <?php
                    }
                    }
                    ?>
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
                                <h4 class="panel-title">User Profile</h4>
                                <div class="row">
                                    <a href="edit-profile.php">
                                        <button class="btn btn-info" style="float: right;">Edit Profile</button>
                                    </a>
                                </div>
                            </div>

                            <div class="panel-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <tr>
                                        <th>User Name</th>
                                        <td><?php echo $school_fet['name_school']; ?></td>
                                    </tr>

                                    <tr>
                                        <th>User Email</th>
                                        <td><?php echo $user_email; ?></td>
                                    </tr>

                                    <?php
                                    if(!empty($school_fet['school_photo']))
                                    {
                                    ?>
                                    <tr>
                                        <th>Photo</th>
                                        <td>
                                            <img style="height: 150px; width: 150px;" src="<?php echo $school_fet['school_photo']; ?>" alt="<?php echo $school_fet['name_school']; ?>" title="<?php echo $school_fet['name_school']; ?>" />
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>

                                    <tr>
                                        <td colspan="2">
                                            <a href="change-password.php"><button class="btn btn-info">Change Password</button></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        <!-- /basic datatable -->
                    </div>
                </div>

                <script type='text/javascript'>
                    $(document).ready(function() {
                        $(function() {
                            $('.styled').uniform();
                        });
                        $(function() {

                            // DataTable setup
                            $('.datatable').DataTable({
                                autoWidth: false,
                                columnDefs: [
                                    {
                                        width: '10%',
                                        targets: 0
                                    },
                                    {
                                        width: '30%',
                                        targets: [1,2]
                                    },
                                    {
                                        orderable: false,
                                        width: '10%',
                                        targets: 4
                                    },
                                    {
                                        width: '20%',
                                        targets: 3
                                    }
                                ],
                                order: [[ 0, 'desc' ]],
                                dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
                                language: {
                                    search: '<span>Search:</span> _INPUT_',
                                    lengthMenu: '<span>Show:</span> _MENU_',
                                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                                },
                                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                                displayLength: 5,
                            });

                            $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');

                            $('.dataTables_length select').select2({
                                minimumResultsForSearch: Infinity,
                                width: '60px'
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