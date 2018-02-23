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
				<h4><i class="fa fa-th-large position-left"></i> Basic Datatable</h4>
			</div>										
			<ul class="breadcrumb">
				<li><a href="index.htm"><i class="fa fa-home"></i>Home</a></li>
				<li>Datatables</li>
				<li class="active">Basic</li>
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
						<h4 class="panel-title">Basic datatable</h4>						
					</div>
					<div class="panel-body">
						<p>Basic datatable initialization using <code>.datatable</code> to the <code>&lttable&gt</code>class.</p>
					</div>
					<table class="table datatable">
						<thead>
							<tr>
								<th>#</th>
								<th>Period</th>								
								<th>Issued to</th>								
								<th>Issue date</th>
								<th>Due Date</th>								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>#INV01525</td>
								<td>April 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Jane Elliott</a>
										<small class="display-block text-muted">Payment method: Bank Transfer</small>
									</h6>
								</td>								
								<td>
									April 04, 2016
								</td>
								<td>
									<span class="label label-danger">-5 days</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Delete</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01524</td>
								<td>April 2016</td>	
								<td>								
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Florence Douglas</a>
										<small class="display-block text-muted">Payment method: Bank transfer</small>
									</h6>
								</td>								
								<td>
									April 02, 2016
								</td>
								<td>
									<span class="label label-default">On Hold</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01523</td>
								<td>March 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Eugine Turner</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>								
								<td>
									March 14, 2016
								</td>
								<td>
									<span class="label label-warning">4 days</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01522</td>
								<td>March 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Ann Porter</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>							
								<td>
									March 5, 2016
								</td>
								<td>
									<span class="label label-default">Canceled</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01521</td>
								<td>March 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Jacqueline Howell</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>								
								<td>
									MArch 10, 2016
								</td>
								<td>
									<span class="label label-success">Paid on March 24, 2016</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01520</td>
								<td>March 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Andrew Brewer</a>
										<small class="display-block text-muted">Payment method: Bank transfer</small>
									</h6>
								</td>								
								<td>
									March 1, 2016
								</td>
								<td>
									<span class="label label-success">Paid on March 29, 2016</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01519</td>
								<td>February 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Marilyn Romero</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>								
								<td>
									Feb 26, 2016
								</td>
								<td>
									<span class="label label-danger">2 months</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01518</td>
								<td>February 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Jane Elliott</a>
										<small class="display-block text-muted">Payment method: Cash</small>
									</h6>
								</td>								
								<td>
									Feb 17, 2016
								</td>
								<td>
									<span class="label label-danger">2 months</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01517</td>
								<td>January 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Florence Douglas</a>
										<small class="display-block text-muted">Payment method: Bank transfer</small>
									</h6>
								</td>								
								<td>
									Jan 23, 2016
								</td>
								<td>
									<span class="label label-success">Paid on Feb 13, 2016</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01516</td>
								<td>January 2016</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Eugine Turner</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>								
								<td>
									Jan 7, 2016
								</td>
								<td>
									<span class="label label-default">On Hold</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01515</td>
								<td>December 2015</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Ann Porter</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>								
								<td>
									Dec 23, 2015
								</td>
								<td>
									<span class="label label-default">On Hold</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01514</td>
								<td>December 2015</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Jacqueline Howell</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>							
								<td>
									Dec 12, 2015
								</td>
								<td>
									<span class="label label-success">Paid on Dec 27, 2015</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01513</td>
								<td>November 2015</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Andrew Brewer</a>
										<small class="display-block text-muted">Payment method: Bank transfer</small>
									</h6>
								</td>								
								<td>
									Nov 25, 2015
								</td>
								<td>
									<span class="label label-warning">-3 months</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>#INV01512</td>
								<td>November 2015</td>								
								<td>
									<h6 class="no-margin">
										<a href="datatable_basic.htm#">Marilyn Romero</a>
										<small class="display-block text-muted">Payment method: Paypal</small>
									</h6>
								</td>								
								<td>
									February 26, 2016
								</td>
								<td>
									<span class="label label-danger">-3 months</span>
								</td>								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="datatable_basic.htm#" data-toggle="modal" data-target="#invoice"><i class="fa fa-eye"></i></a></li>
										<li class="dropdown">
											<a href="datatable_basic.htm#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="datatable_basic.htm#"><i class="fa fa-download"></i> Download</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-print"></i> Print</a></li>
												<li class="divider"></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-edit"></i> Edit</a></li>
												<li><a href="datatable_basic.htm#"><i class="fa fa-trash"></i> Remove</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>							
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
				
				<!-- datatable options -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Datatable options</h4>						
					</div>
					<div class="panel-body">
						<table class="table table-bordered table-hover table-xxs">
							<thead>
								<tr class="bg-teal">
									<th>Name</th>
									<th>Summary</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="3">DataTables - Features</td>
								</tr>
								<tr>
									<td><p><a href="http://datatables.net/reference/option/lengthChange" target="_blank"><code>lengthChange</code></a></p></td>
									<td><p>Feature control the end user's ability to change the paging display length of the table.</p></td>
								</tr>
								<tr>
									<td><p><a href="http://datatables.net/reference/option/ordering" target="_blank"><code>ordering</code></a></p></td>
									<td><p>Feature control ordering (sorting) abilities in DataTables.</p></td>
								</tr>
								<tr>
									<td><p><a href="http://datatables.net/reference/option/paging" target="_blank"><code>paging</code></a></p></td>
									<td><p>Enable or disable table pagination.</p></td>
								</tr>
								<tr>
									<td><p><a href="http://datatables.net/reference/option/searching" target="_blank"><code>searching</code></a></p></td>
									<td><p>Feature control search (filtering) abilities</p></td>
								</tr>
								<tr>
									<td><p><a href="http://datatables.net/reference/option/stateSave" target="_blank"><code>stateSave</code></a></p></td>
									<td><p>State saving - restore table state on page reload</p></td>
								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- /datatable options -->
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
						width: '30px',
						targets: 0
					},
					{						
						targets: 1
					},
					{ 
						orderable: false,
						width: '100px',
						targets: 5
					},
					{
						width: '15%',
						targets: [3, 4]
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