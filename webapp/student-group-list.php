<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];

$staff_sql = "select DISTINCT gm.* from group_master as gm
LEFT JOIN `group_info` as gi ON gi.group_id = gm.id
where gm.group_status=1 and gm.group_type = 'Parents' and gi.school_id=$user_id";
$staff_exe = mysql_query($staff_sql);
$staff_cnt = @mysql_num_rows($staff_exe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Student Group</title>
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
                        <h4><i class="fa fa-th-large position-left"></i> STUDENT GROUP</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Student Group</li>
                    </ul>
                    <?php
                    if(isset($_REQUEST['suc'])) {
                        if ($_REQUEST['suc'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Student Group Created Successfully</strong>
                            </div>
                        <?php
                        }
                        else if($_REQUEST['suc'] == 2){
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Student Group Deleted Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['err'])) {
                        if ($_REQUEST['err'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Unable to delete the Group</strong>
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
                                <h4 class="panel-title">Student Group</h4>
                            </div>
                            <?php
                            if($staff_cnt>0)
                            {
                                ?>
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>GROUP NAME</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sno = 1;
                                    while($staff_fet=mysql_fetch_array($staff_exe))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $staff_fet['group_name']; ?></td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li><a href="student-group-view.php?group_id=<?php echo $staff_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a></li>&nbsp;&nbsp;
                                                    <li><a href="group-delete.php?stud_id=<?php echo $staff_fet['id']; ?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-remove"></i></button></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php
                                        $sno++;
                                    }
                                    ?>
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
                                        orderable: false,
                                        targets: 2
                                    }
                                ],
                                order: [[ 0, 'asc' ]],
                                dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
                                language: {
                                    search: '<span>Search:</span> _INPUT_',
                                    lengthMenu: '<span>Show:</span> _MENU_',
                                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                                },
                                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                                displayLength: 100
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