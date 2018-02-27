<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Student</title>
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
                        <h4><i class="fa fa-th-large position-left"></i> STUDENT LIST</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Student List</li>
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
                                <h4 class="panel-title">Student List</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="button" class="form-control btn btn-info">Delete Student</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="form-control btn btn-info"> Send Message</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="form-control btn btn-info">Add To Groups</button>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="add-student.php"><button type="button" class="form-control btn btn-info">Add Student</button></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>NAME</th>
                                    <th>PHONE NUMBER</th>
                                    <th>TODAY ATTENDANCE</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form method="get">
                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Menisha N</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Ajankumar I</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Chellathurai S</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Jayakumaran T</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Antony A N</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Madona V</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Ajaykrishna M</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Tina W</td>
                                        <td>9787131376</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Jayakumar D</td>
                                        <td>9787455676</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="staff"/> </td>
                                        <td>Antony Raj K</td>
                                        <td>9874561235</td>
                                        <td>NA </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
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