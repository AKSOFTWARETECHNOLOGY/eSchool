<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$staffName = $_REQUEST['staffName'];

$staff_sql = "select * from staff_info as si
LEFT JOIN `users` ON users.id = si.user_id
where users.delete_status=1 and si.firstname_person  like '%$staffName%'";
$staff_exe = mysql_query($staff_sql);
$staff_cnt = @mysql_num_rows($staff_exe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Staff</title>
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
                        <h4><i class="fa fa-th-large position-left"></i> STAFF LIST</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Staff List</li>
                    </ul>
                    <?php
                    if(isset($_REQUEST['succ'])) {
                        if ($_REQUEST['succ'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Staff Info updated Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['suc'])) {
                        if ($_REQUEST['suc'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Staff Info added Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['del'])) {
                        if ($_REQUEST['del'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Staff Info deleted Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['error'])) {
                        if ($_REQUEST['error'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Unable to delete the staff</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['import'])) {
                        if ($_REQUEST['import'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Staff Info imported Successfully</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['err'])) {
                        if ($_REQUEST['err'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Unable to add to group</strong>
                            </div>
                        <?php
                        }
                    }
                    if(isset($_REQUEST['grp'])) {
                        if ($_REQUEST['grp'] == 1) {
                            ?>
                            <div class="alert alert-success alert-dismessible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Successfully added to the group</strong>
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
                                <h4 class="panel-title">Staff List</h4>
                            </div>
                            <form method="post" action="delete-staff.php">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="form-control btn btn-info" onclick="return confirm('Do you want to delete?');">Delete Staff</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="form-control btn btn-info"> Send Message</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="form-control btn btn-info" id="myBtn">Add To Groups</button>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="add-staff.php"><button type="button" class="form-control btn btn-info">Add Staff</button></a>
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
                                            <th><input type="checkbox" onClick="toggle(this)" /> Select All</th>
                                            <th>NAME</th>
                                            <th>POSITION</th>
                                            <th>PHONE NUMBER</th>
                                            <th class="text-center">ACTIONS</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while($staff_fet=mysql_fetch_array($staff_exe))
                                        {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="staff[]" class="staffCheck" value="<?php echo $staff_fet['user_id'] ?>"/> </td>
                                                <td><?php echo $staff_fet['firstname_person'] . ' ' . $staff_fet['lastname_person']; ?></td>
                                                <td>
                                                    <?php
                                                    if($staff_fet['job_position'] == 1){
                                                        echo "Principal";
                                                    }
                                                    elseif($staff_fet['job_position'] == 2){
                                                        echo "Senior Staff";
                                                    }if($staff_fet['job_position'] == 3){
                                                        echo "Junior Staff";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $staff_fet['mobile'] ?></td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li><a href="staff-view.php?staff_id=<?php echo $staff_fet['user_id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;&nbsp;</li>
                                                        <li><a href="staff-edit.php?staff_id=<?php echo $staff_fet['user_id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;&nbsp;</li>
                                                        <li><a href="staff-delete.php?staff_id=<?php echo $staff_fet['user_id']; ?>" onclick="return confirm('Do you want to delete?');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-remove"></i></button></a>&nbsp;&nbsp;</li>
                                                    </ul>
                                                </td>
                                                <td><a href="sms.php?staff_id=<?php echo $staff_fet['user_id']; ?>"><button type="button" class="btn btn-info">Send SMS</button></a></td>
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
                                    <p><b> No Results Found. </b></p>
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
                                    <form id="modalForm" class="modalForm" action="doAddStaffGroup.php" method="post" >
                                        <div class="col-md-12">
                                            <label class="col-md-5">Group Name:<span style="color:red">*</span> </label>
                                            <input type="text" class="form-control col-md-7" name="groupName" required />
                                        </div>

                                        <div class="col-md-12" style="height:15px"></div>

                                        <div class="col-md-4">
                                            <input type="hidden" name="staffId" class="staffId" value=""/>
                                            <input type="submit" class="btn btn-info form-control" name="" value="Add" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            $("#myBtn").click(function(){
                                var staff = [];
                                $.each($(".staffCheck:checked"), function(){
                                    staff.push($(this).val());
                                });
                                var staf = staff.join(", ");
                                $(".staffId").val(staf);
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
                        checkboxes = document.getElementsByName('staff[]');
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
                                        targets: 4
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