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

$staff_sql="SELECT cs.*, classes.class_name, section.section_name, users.name as staff_name FROM `class_section` as cs
 LEFT JOIN `classes` ON classes.id = cs.class_id
 LEFT JOIN `section` ON section.id = cs.section_id
 LEFT JOIN `users` ON users.id = cs.staff_id
 where school_id=$user_id and cs.class_section_status=1 order by classes.id ASC";
$staff_exe=mysql_query($staff_sql);
$staff_cnt=@mysql_num_rows($staff_exe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Class</title>

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
                        <h4><i class="fa fa-th-large position-left"></i> CLASS LIST</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Class List</li>
                    </ul>

                    <?php
                    if(isset($_REQUEST['suc'])) {
                        if ($_REQUEST['suc'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Class Info added Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['del'])) {
                        if ($_REQUEST['del'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Class Info deleted Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['error'])) {
                        if ($_REQUEST['error'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Unable to delete the class.</strong>
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
                                <h4 class="panel-title">Class List</h4>
                            </div>
                            <form method="post" action="delete-class.php">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="submit" class="form-control btn btn-info" value="submit" onclick="return confirm('Do you want to delete?');" >Delete Class</button>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="add-class.php"><button type="button" class="form-control btn btn-info">Add Class</button></a>
                                    </div>
                                </div>
                            </div>
                                <?php
                                if($staff_cnt>0)
                                {
                                ?>
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>CLASS ROOM</th>
                                    <th>CLASS TEACHER NAME</th>
                                    <th>NUMBER OF STUDENTS</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while($staff_fet=mysql_fetch_array($staff_exe)) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="class[]" value="<?php echo $staff_fet['id'] ?>"/></td>
                                            <td><?php echo $staff_fet['class_name'] . '(' .$staff_fet['section_name'] . ')'; ?></td>
                                            <td><?php echo $staff_fet['staff_name']; ?></td>
                                            <td><?php calculateNumOfStudents($staff_fet['class_id'], $staff_fet['section_id']); ?></td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li><a href="class-view.php?class_id=<?php echo $staff_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;&nbsp;</li>
                                                    <li><a href="class-delete.php?class_id=<?php echo $staff_fet['id']; ?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-remove"></i></button></a>&nbsp;&nbsp;</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                                <?php
                                }
                                else{
                                    ?>
                                    <p><b> Records are being updated. </b></p>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <!-- /basic datatable -->

                    </div>
                </div>

                <?php
                    function calculateNumOfStudents($cid, $sid){
                        $stu_sql="SELECT * FROM `student_info` as si
LEFT JOIN `users` ON users.id = si.user_id
 where si.class_name=$cid and si.class_section_name=$sid and users.delete_status=1";
                        $stu_exe=mysql_query($stu_sql);
                        $stu_cnt=@mysql_num_rows($stu_exe);
                        if($stu_cnt != 0){
                            echo $stu_cnt;
                        }
                    }
                ?>
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
                                        width: '10%',
                                        targets: 0
                                    },
                                    {
                                        width: '30%',
                                        targets: 2
                                    },
                                    {
                                        orderable: false,
                                        width: '20%',
                                        targets: 4
                                    },
                                    {
                                        width: '20%',
                                        targets: [1,3]
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
                <div class="footer pt-20">
                    &copy; 2016 Bird - Admin theme by <a href="http://followtechnique.com" target="_blank">FollowTechnique</a>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Version - 1.0.0
                </div>
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