<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$studName = $_REQUEST['studName'];

$stu_sql = "select * from student_info as si
LEFT JOIN `users` ON users.id = si.user_id
where users.delete_status=1 and si.firstname_person  like '%$studName%'";
$stu_exe = mysql_query($stu_sql);
$stu_cnt = @mysql_num_rows($stu_exe);

$class_sql="SELECT s.section_name, c.class_name, cs.id as class_section_id FROM `class_section` as cs
LEFT JOIN `classes` as c ON cs.class_id = c.id
LEFT JOIN `section` as s ON s.id = cs.section_id
where `class_section_status`=1 order by c.id ASC";
$class_exe=mysql_query($class_sql);
$class_results = array();
while($row = mysql_fetch_assoc($class_exe)) {
    array_push($class_results, $row);
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
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 40px; /* Location of the box */
            left: 0;
            top: 0;
            width: 50%; /* Full width */
            height: 50%; /* Full height */
            margin: 0px auto;
            overflow: hidden; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            height: 100%;
            margin: auto;
            border: 1px solid #888;
            width: 100%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
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
                        <h4><i class="fa fa-th-large position-left"></i> STUDENT LIST</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Student List</li>
                    </ul>

                    <?php
                    if(isset($_REQUEST['succ'])) {
                        if ($_REQUEST['succ'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Student Info updated Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['suc'])) {
                        if ($_REQUEST['suc'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Student Info added Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['del'])) {
                        if ($_REQUEST['del'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Student Info deleted Successfully</strong>
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
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <form>
                            <select class="form-control" name="classSearch" id="classSearch">
                                <option value="0">All</option>
                                <?php
                                foreach($class_results as $key => $value){ ?>
                                    <option value="<?php echo $value['class_section_id']; ?>"><?php echo $value['class_name'] . " - " . $value['section_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <!-- basic datatable -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">Student List</h4>
                            </div>
                            <form method="post" action="delete-student.php">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="form-control btn btn-info" onclick="return confirm('Do you want to delete?');">Delete Student</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="form-control btn btn-info"> Send Message</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="form-control btn btn-info" id="myBtn">Add To Groups</button>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="add-student.php"><button type="button" class="form-control btn btn-info">Add Student</button></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if($stu_cnt>0)
                                {
                                    ?>
                                    <span id="studentTable">
                                        <table class="table datatable">
                                            <thead>
                                            <tr>
                                                <th><input type="checkbox" class="stuCheck" onClick="toggle(this)" /> Select All</th>
                                                <th>NAME</th>
                                                <th>PHONE NUMBER</th>
                                                <th>TODAY ATTENDANCE</th>
                                                <th class="text-center">ACTIONS</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($stu_fet=mysql_fetch_array($stu_exe))
                                            {
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" class="stuCheck" name="student[]" value="<?php echo $stu_fet['user_id'] ?>"/> </td>
                                                    <td><?php echo $stu_fet['firstname_person'] . " " . $stu_fet['lastname_person']; ?></td>
                                                    <td><?php echo $stu_fet['mobile'] ?></td>
                                                    <td>N/A </td>
                                                    <td class="text-center">
                                                        <ul class="icons-list">
                                                            <li><a href="student-view.php?student_id=<?php echo $stu_fet['user_id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a></li>&nbsp;&nbsp;
                                                            <li><a href="student-edit.php?student_id=<?php echo $stu_fet['user_id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a></li>&nbsp;&nbsp;
                                                            <li><a href="student-delete.php?student_id=<?php echo $stu_fet['user_id']; ?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-remove"></i></button></a></li>&nbsp;&nbsp;
                                                        </ul>
                                                    </td>
                                                    <td><a href="sms.php?student_id=<?php echo $stu_fet['user_id']; ?>"><button type="button" class="btn btn-info">Send SMS</button></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </span>
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

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header" style="padding-top: 0px;">
                                    <span class="close">&times;</span>
                                    <h2>Add To Groups</h2>
                                </div>
                                <div class="modal-body">
                                    <form id="modalForm" class="modalForm" action="doAddStudentGroup.php" method="post" >
                                        <div class="col-md-12">
                                            <label class="col-md-5">Group Name:<span style="color:red">*</span> </label>
                                            <input type="text" class="form-control col-md-7" name="groupName" required />
                                        </div>

                                        <div class="col-md-12" style="height:15px"></div>

                                        <div class="col-md-4">
                                            <input type="hidden" name="studId" class="studId" value=""/>
                                            <input type="submit" class="btn btn-info form-control" name="" value="Add" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            $("#myBtn").click(function(){
                                var staff = [];
                                $.each($(".stuCheck:checked"), function(){
                                    staff.push($(this).val());
                                });
                                var staf = staff.join(", ");
                                $(".studId").val(staf);
                            });
                        </script>

                        <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                            // Get the button that opens the modal
                            var btn = document.getElementById("myBtn");

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks the button, open the modal
                            btn.onclick = function() {
                                modal.style.display = "block";
                            }

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                                modal.style.display = "none";
                            }

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>
                    </div>
                </div>

                <script>
                    function toggle(source) {
                        checkboxes = document.getElementsByName('student[]');
                        for(var i=0, n=checkboxes.length;i<n;i++) {
                            checkboxes[i].checked = source.checked;
                        }
                    }
                </script>

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
                                        width: '15%',
                                        targets: 0
                                    },
                                    {
                                        width: '25%',
                                        targets: 1
                                    },
                                    {
                                        width: '20%',
                                        targets: [2,3]
                                    },
                                    {
                                        orderable: false,
                                        width: '20%',
                                        targets: [4,5]
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
        $("#classSearch").change(function(){
            var BASEURL = "http://localhost/eSchool/webapp/";
            var BASEURL = "";
            var classId = $(this).val();
            var callurl = BASEURL + 'ajax-student-filter.php?id=' + classId;
            $.ajax({
                url: callurl,
                type: "get",
                data: {"id": classId},
                success: function (data) {
                    $('#studentTable').html(data);
                }
            });
        });
    });

</script>

</body>
</html>