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

$staff_sql="SELECT * FROM `staff_info` where school_id=$user_id";
$staff_exe=mysql_query($staff_sql);
$staff_cnt=@mysql_num_rows($staff_exe);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Staff</title>
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
				<h4><i class="fa fa-th-large position-left"></i> STAFF LIST</h4>
			</div>										
			<ul class="breadcrumb">
				<li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
				<li class="active">Staff List</li>
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
						<h4 class="panel-title">Staff List</h4>
					</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="form-control btn btn-info">Delete Staff</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="form-control btn btn-info"> Send Message</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="form-control btn btn-info">Add To Groups</button>
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
								<th></th>
								<th>NAME</th>
								<th>POSITION</th>
								<th>PHONE NUMBER</th>
                                <th>ACTIONS</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                        while($staff_fet=mysql_fetch_array($staff_exe))
                        {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="staff"/> </td>
                            <td><?php echo $staff_fet['firstname_person'] . $staff_fet['lastname_person']; ?></td>
                            <td><?php echo $staff_fet['job_position'] ?> </td>
                            <td><?php echo $staff_fet['mobile'] ?></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <a href="#staff-view.php?staff_id=<?php echo $staff_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
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