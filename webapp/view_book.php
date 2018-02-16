<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOOKSELF</title>	
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png">
	<link href="assets/images/favicon.ico" rel="icon" type="image/png">
	<link href="assets/images/favicon.ico" rel="shortcut icon">

	<!-- Global stylesheets -->
	<link href="fonts/fonts.css" rel="stylesheet" type="text/css">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-extended.css" rel="stylesheet" type="text/css">
	<link href="css/plugins.css" rel="stylesheet" type="text/css">
	<link href="css/color-system.css" rel="stylesheet" type="text/css">
	<link href="css/media.css" rel="stylesheet" type="text/css">
	<link href="assets/weather/weather-icons.min.css" rel="stylesheet" type="text/css">
	<link href="assets/weather/weather-icons-wind.min.css" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="index.htm" id="style">
	<link type="text/css" rel="stylesheet" href="index.htm" id="theme">
	<!-- /global stylesheets -->

	<!-- Core JS files -->	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/fancybox.min.js"></script>	
	<script src="js/app.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script src="https://www.google.com/jsapi"></script>
	<script src="js/maps/jvectormap/jvectormap.min.js"></script>
	<script src="js/maps/jvectormap/map_files/world.js"></script>
	<script src="js/dashboard.js"></script>
	<script src="js/maps/google/markers/symbols_custom.js"></script>
</head>
<body>


<!-- Main navbar -->
<?php include 'header.php';
?>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container" style="min-height:700px">

	<!-- Page content -->
<div class="page-content"><!-- Main sidebar -->

<?php include 'sidebar.php';
?>

<!-- /main sidebar -->
<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
			<h4>
				<i class="fa fa-home position-left"></i> <span>Create New Book Profile</span></h4>
			</div>	
			
			
			<ul class="breadcrumb">
				<li><a href=""><i class="fa fa-home"></i>Home</a></li>
				<li class="active">Dashboard</li>
			</ul>					
		
		</div>
	</div>     
	
	<div class="content">
			
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
					<div class="row">
					<div class="col-sm-8">
						<h4 class="panel-title">
						BOOK PROFILE
						</h4>	
			</div>
			<div class="col-sm-2">
						<a href="book_view.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >View Book List</button></a>
                      
			</div>
			<div class="col-sm-2">
					  <a href="book_edit.php"><button type="submit" class="btn btn-info col-md-12" style="margin-bottom:10px;">Edit Book Profile</button></a>
                  
			</div>
			</div>
			</div>
				<div class="panel-body no-padding-bottom">
						<form class="form-horizontal" action="form_basic.htm#">							
							<div class="form-group">
								<label class="control-label col-lg-4">Book Title</label>
								<div class="col-lg-8">
									<div  class="">The jungle Book</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4">ISBN</label>
								<div class="col-lg-8">
									<div type="text" class="" >35</div>
								</div>
							</div>
	
							<div class="form-group ">
								<label class="control-label col-lg-4">Author</label>
								<div class="col-lg-8">
									<div type="text" class="" ><img src="images/book.png"></div>
								</div>
							</div>
 </form>
					</div>
		
		 </div>
		  
		</div>
			</div>
				
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
					<?php include 'footer.php';
					?>
					<!-- /footer -->
</div>
				</div>
				
			</div>
		</div>
		
</body>
</html>