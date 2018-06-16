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

$staff_sql="SELECT * FROM `staff_info` as si
LEFT JOIN `users` ON users.id = si.user_id
where school_id=$user_id and users.delete_status=1";
$staff_exe=mysql_query($staff_sql);
$staff_cnt=mysql_num_rows($staff_exe);

$stu_sql="SELECT * FROM `student_info` as si
LEFT JOIN `users` ON users.id = si.user_id
where school_id=$user_id and users.delete_status=1";
$stu_exe=mysql_query($stu_sql);
$stu_cnt=mysql_num_rows($stu_exe);

$class_sql="SELECT * FROM `class_section` as cs
 LEFT JOIN `classes` ON classes.id = cs.class_id
 LEFT JOIN `section` ON section.id = cs.section_id
 LEFT JOIN `users` ON users.id = cs.staff_id
 where school_id=$user_id and cs.class_section_status=1";
$class_exe=mysql_query($class_sql);
$class_cnt=mysql_num_rows($class_exe);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MySkoo Dashboard</title>	
	<?php include "head-dashboard.php"; ?>
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
				<h4><i class="fa fa-home position-left"></i> <span>Dashboard</span></h4>
			</div>										
			<ul class="breadcrumb">
				<li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
				<li class="active">Dashboard</li>
			</ul>					
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-indigo">
                    <div class="panel-heading heading-condensed">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="panel-title text-uppercase pl-10"><a href="staff.php">Staff</a></h6>
                            </div>
                            <div class="col-md-2">
                                <h6 class="panel-title text-uppercase pl-10"><?php echo $staff_cnt; ?></h6>
                            </div>
                        </div>

                        <form role="form" id="staffSearchForm" class="form-horizontal" method="post" action="staff-list.php" style="padding: 20px 0px;">
                            <div class="row">
                                <div class="col-md-1">  </div>
                                <div class="col-md-7">
                                <input type="text" class="form-control" name="staffName" required/>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control btn btn-primary" type="submit" value="search" name="staffSearch"/>
                                </div>
                                <div class="col-md-1">  </div>
                            </div>
                        </form>
                    </div>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-column"></div>
                        -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-pink">
                    <div class="panel-heading heading-condensed">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="panel-title text-uppercase pl-10"><a href="student.php">Student</a></h6>
                            </div>
                            <div class="col-md-2">
                                <h6 class="panel-title text-uppercase pl-10"><?php echo $stu_cnt; ?></h6>
                            </div>
                        </div>

                        <form role="form" id="staffSearchForm" class="form-horizontal" method="post" action="student-list.php" style="padding: 20px 0px;">
                            <div class="row">
                                <div class="col-md-1">  </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="studName" required/>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control btn btn-primary" type="submit" value="search" name="studentSearch"/>
                                </div>
                                <div class="col-md-1">  </div>
                            </div>
                        </form>
                    </div>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-area-intervals"></div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-purple">
                    <div class="panel-heading heading-condensed">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="panel-title text-uppercase pl-10"><a href="class.php">Classes</a></h6>
                            </div>
                            <div class="col-md-2">
                                <h6 class="panel-title text-uppercase pl-10"><?php echo $class_cnt; ?></h6>
                            </div>
                        </div>

                        <form role="form" id="staffSearchForm" class="form-horizontal" method="post" action="class-list.php" style="padding: 20px 0px;">
                            <div class="row">
                                <div class="col-md-1">  </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="className" required/>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                                </div>
                                <div class="col-md-1">  </div>
                            </div>
                        </form>
                    </div>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-column"></div>
                        -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-indigo">
                    <div class="panel-heading heading-condensed">
                        <h6 class="panel-title text-uppercase pl-10"><a href="sms.php">Message</a></h6>
                    </div>
                    <form role="form" id="staffSearchForm" class="hidden form-horizontal" method="post" action="#">
                        <div class="row">
                            <div class="col-md-1">  </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="className"/>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                            </div>
                            <div class="col-md-1">  </div>
                        </div>
                    </form>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-area"></div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-pink">
                    <div class="panel-heading heading-condensed">
                        <h6 class="panel-title text-uppercase pl-10"><a href="email.php">Email</a></h6>
                    </div>
                    <form role="form" id="staffSearchForm" class="hidden form-horizontal" method="post" action="#">
                        <div class="row">
                            <div class="col-md-1">  </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="className"/>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                            </div>
                            <div class="col-md-1">  </div>
                        </div>
                    </form>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-area-intervals"></div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-purple">
                    <div class="panel-heading heading-condensed">
                        <h6 class="panel-title text-uppercase pl-10">Report</h6>
                    </div>
                    <form role="form" id="staffSearchForm" class="hidden form-horizontal" method="post" action="#">
                        <div class="row">
                            <div class="col-md-1">  </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="className"/>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                            </div>
                            <div class="col-md-1">  </div>
                        </div>
                    </form>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-column"></div>
                        -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-indigo">
                    <div class="panel-heading heading-condensed">
                        <h6 class="panel-title text-uppercase pl-10"><a href="staff-group-list.php">Staff Groups</a></h6>
                    </div>
                    <form role="form" id="staffSearchForm" class="hidden form-horizontal" method="post" action="#">
                        <div class="row">
                            <div class="col-md-1">  </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="className"/>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                            </div>
                            <div class="col-md-1">  </div>
                        </div>
                    </form>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-area"></div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-flat bg-pink">
                    <div class="panel-heading heading-condensed">
                        <h6 class="panel-title text-uppercase pl-10"><a href="student-group-list.php">Student Groups</a></h6>
                    </div>
                    <form role="form" id="staffSearchForm" class="hidden form-horizontal" method="post" action="#">
                        <div class="row">
                            <div class="col-md-1">  </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="className"/>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                            </div>
                            <div class="col-md-1">  </div>
                        </div>
                    </form>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-area-intervals"></div>
                        -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 hidden">
                <div class="panel panel-flat bg-purple">
                    <div class="panel-heading heading-condensed">
                        <h6 class="panel-title text-uppercase pl-10">Report</h6>
                    </div>
                    <form role="form" id="staffSearchForm" class="hidden form-horizontal" method="post" action="#">
                        <div class="row">
                            <div class="col-md-1">  </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="className"/>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control btn btn-primary" type="submit" value="search" name="classSearch"/>
                            </div>
                            <div class="col-md-1">  </div>
                        </div>
                    </form>
                    <div class="p-10">
                        <!--
                        <div class="chart" id="google-column"></div>
                        -->
                    </div>
                </div>
            </div>
        </div>


        <div class="row hidden">
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-flat bg-indigo">
					<div class="panel-heading heading-condensed">
						<h6 class="panel-title text-uppercase pl-10">Daily visitors</h6>						
					</div>
					<div class="p-10">
						<div class="chart" id="google-area"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-flat bg-pink">
					<div class="panel-heading heading-condensed">
						<h6 class="panel-title text-uppercase pl-10">Monthly expenses</h6>						
					</div>
					<div class="p-10">
						<div class="chart" id="google-area-intervals"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-flat bg-purple">
					<div class="panel-heading heading-condensed">
						<h6 class="panel-title text-uppercase pl-10">Daily sales</h6>						
					</div>
					<div class="p-10">
						<div class="chart" id="google-column"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row hidden">
			<div class="col-md-8 col-sm-8">
				<div class="panel panel-flat no-border bg-slate-400">
					<div class="panel-heading text-center heading-condensed">
						<h6 class="panel-title text-uppercase text-muted">Earnings graph</h6>						
					</div>
					<div class="p-10">
						<div class="row">
							<div class="col-md-12 col-sm-12 mt-10 mb-20">
								<div class="map-container map-world-markers" style="max-height:240px;"></div>
							</div>
						</div>
						<div class="row text-center pt-20">
							<div class="col-md-6 col-sm-12 hidden-sm">
								<h6 class="panel-title text-uppercase text-muted">Total earnings this year</h6>	
								<h1 class="panel-title text-uppercase text-size-large text-semibold"><i class="fa fa-dollar"></i> 45,723</h1>	
								<div class="row mt-20">
									<div class="col-md-4 col-sm-4 col-xs-4">
										<h6 class="panel-title text-uppercase text-muted">America</h6>	
										<h5 class="panel-title text-uppercase text-regular"><i class="fa fa-dollar"></i>12,411</h5>	
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<h6 class="panel-title text-uppercase text-muted">Europe</h6>	
										<h5 class="panel-title text-uppercase text-regular"><i class="fa fa-dollar"></i>24,212</h5>	
									</div>
									<div class="col-md-4 col-sm-4 col-xs-4">
										<h6 class="panel-title text-uppercase text-muted">Asia</h6>	
										<h5 class="panel-title text-uppercase text-regular"><i class="fa fa-dollar"></i>9,100</h5>	
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="chart" id="google-bar-stacked"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-flat bg-lime-800 no-margin">
					<div class="panel-heading heading-condensed">
						<h4 class="panel-title pl-20">April 2016</h4>						
					</div>
					<div class="chart" id="google-line"></div>
				</div>
				<div class="panel panel-flat no-border no-margin p-20">	
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 text-right pt-10">
							<h4 class="no-margin text-semibold text-lime-300">60%</h4>
							<p class="text-muted text-uppercase">Direct Sell</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="chart" id="google-donut-rotate"></div>
						</div>	
						<div class="col-md-4 col-sm-4 col-xs-4 text-left pt-10">
							<h4 class="no-margin text-semibold text-lime-300">40%</h4>
							<p class="text-muted text-uppercase small">Channel Sell</p>
						</div>	
					</div>					
				</div>
				
				<div class="panel panel-flat mt-20">	
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right pt-20">
							<h2 class="no-margin text-semibold text-purple-600 pt-5"><i class="fa fa-dollar"></i> 34,356</h2>
							<p class="text-muted text-uppercase">Expected Sales</p>
						</div>						
						<div class="col-md-6 col-sm-6 col-xs-6 text-left p-10 pr-20">
							<div class="chart" id="google-column-sales"></div>
						</div>	
					</div>					
				</div>
				
				<div class="panel panel-flat mt-20">	
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 text-right pt-5">
							<div class="wi wi-day-snow wi-40 ml-10 text-amber-700 pt-20"></div>
						</div>						
						<div class="col-md-8 col-sm-8 col-xs-8 text-left">
							<p class="text-muted text-uppercase no-margin no-padding pt-10"><i class="fa fa-map-marker"></i> New York (Rainy)</p>
							<div class="weather-cent text-amber-700 no-margin no-padding"><span>18</span></div>							
						</div>	
					</div>					
				</div>							
			</div>			
		</div>
				
		<div class="row hidden">
			<div class="col-md-8 col-sm-8">
				<div class="panel panel-flat timeline-content">																												
					<img src="assets/images/covers/weather.jpg" class="img-responsive" alt="">
					<div class="panel-body">													
						<div class="row">
							<div class="col-md-5 col-sm-5">
								<p class="text-muted text-uppercase no-margin">Today</p>
								<div class="row-fluid no-margin">
									<div class="col-md-3 col-sm-3 col-xs-3 no-margin">
										<div class="wi wi-day-snow wi-30 pl-20 pt-15 text-teal"></div>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-9 no-margin">
										<div class="weather-cent text-teal"><span>22</span></div>
									</div>			
								</div>
							</div>
							<div class="col-md-7 col-sm-7 pr-20">
								<div class="row">
									<div class="col-md-2 col-xs-2 col-sm-2">
										<p class="text-muted text-uppercase no-margin">Mon</p>
										<div class="wi wi-day-snow wi-20 pl-20 text-indigo"></div>
										<div class="weather-cent wi-small text-muted"><span>17</span></div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
										<p class="text-muted text-uppercase no-margin">Tue</p>
										<div class="wi wi-day-cloudy-windy wi-20 pl-20 text-lime-800"></div>
										<div class="weather-cent wi-small text-muted"><span>19</span></div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
										<p class="text-muted text-uppercase no-margin">Wed</p>
										<div class="wi wi-day-lightning wi-20 pl-20 text-amber"></div>
										<div class="weather-cent wi-small text-muted"><span>18</span></div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
										<p class="text-muted text-uppercase no-margin">Thur</p>
										<div class="wi wi-night-rain-mix wi-20 pl-20 text-blue"></div>
										<div class="weather-cent wi-small text-muted"><span>21</span></div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
										<p class="text-muted text-uppercase no-margin">Fri</p>
										<div class="wi wi-night-rain wi-20 pl-20 text-slate"></div>
										<div class="weather-cent wi-small text-muted"><span>19</span></div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
										<p class="text-muted text-uppercase no-margin">Sat</p>
										<div class="wi wi-sunrise wi-20 pl-20 text-success"></div>
										<div class="weather-cent wi-small text-muted"><span>18</span></div>
									</div>
								</div>
							</div>			
						</div>																
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-flat bg-teal-300 no-margin" align="center">
					<article class="clock">
					  <div class="hours-container">
						<div class="hours"></div>
					  </div>
					  <div class="minutes-container">
						<div class="minutes"></div>
					  </div>
					  <div class="seconds-container">
						<div class="seconds"></div>
					  </div>
					</article>
				</div>
				<div class="panel panel-flat no-margin mb-20 pb-5">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="pl-20 pt-5 pb-5 text-teal-300">
								<h3 class="no-padding no-margin">April 24</h3>
								<p class="text-left no-padding no-margin">2016, Sunday</p>
								<p class="text-left no-padding no-margin">6:18 PM</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 text-right text-teal-300 pr-20 pt-10 pb-5">
							<i class="fa fa-clock-o fa-5x"></i>
						</div>
					</div>
				</div>
			</div>			
		</div>
		
		<div class="row hidden">
			<div class="col-md-3 col-sm-4">
				<div class="panel panel-flat border-top-xlg border-top-warning">
					<div class="panel-heading">
						<h4 class="panel-title"><i class="fa fa-feed position-left"></i>Recent Activities</h4>									
					</div>
					<div class="panel-body">
						<div class="activity">
							<div class="timestamp"><i class="fa fa-comment position-left"></i> 5 minutes ago</div>
							<a href="index.htm">Tyler Rivera</a> updated his status
						</div>
						<div class="activity">
							<div class="timestamp"><i class="fa fa-image position-left"></i> 14 minutes ago</div>
							<a href="index.htm">Edward Harvey</a> uploaded a photo
						</div>
						<div class="activity">
							<div class="timestamp"><i class="fa fa-video-camera position-left"></i> 4 hours ago</div>
							<a href="index.htm">Aaron Gibson</a> added a video
						</div>
						<div class="activity">
							<div class="timestamp"><i class="fa fa-video-camera position-left"></i> 1 day ago</div>
							<a href="index.htm">Tyler Rivera</a> added a video
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
				<div class="panel panel-flat border-left-xlg border-left-info">
					<div class="panel-heading pt-20 pl-20">
						<h4 class="panel-title"><i class="fa fa-users position-left"></i>Latest users</h4>				
					</div>
					<div class="table-responsive">
						<table class="table table-condensed table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Jane</td>
									<td>Elliott</td>
									<td>#jane</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Florence</td>
									<td>Douglas</td>
									<td>#florence</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Eugine</td>
									<td>Turner</td>
									<td>#eugine</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Ann</td>
									<td>Porter</td>
									<td>#ann</td>
								</tr>
								<tr>
									<td>5</td>
									<td>Andrew</td>
									<td>Brewer</td>
									<td>#andrew</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>			
		</div>
		
		<div class="row hidden">
			<div class="col-md-6">
				<div class="panel panel-flat timeline-content">
					<div class="panel-heading mb-10">
						<h4 class="panel-title">Recent post</h4>
						<div class="heading-elements">
							<span class="heading-text"><i class="fa fa-clock-o position-left"></i>19 minutes ago</span>										
						</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
					<img src="assets/images/covers/cover2.jpg" class="img-responsive" alt="">
					<div class="panel-body">
						<p>An vero voluptatum has, usu in harum repudiandae.</p>									

						<div class="media">
							<div class="media-left">
								<a href="index.htm#"><img src="assets/images/users/user16.png" class="img-circle" alt=""></a>
							</div>
							<div class="media-body">
								<a href="index.htm#"><h4 class="media-heading">Matthew Stanley</h4></a>
								Eum an integre temporibus. Usu prima legimus adolescens ne.
								<div class="media-annotation mt-5"><i class="fa fa-clock-o position-left"></i>5 minutes ago</div>
							</div>
						</div>
						
						<div class="media">
							<div class="media-left">
								<a href="index.htm#"><img src="assets/images/users/user13.png" class="img-circle" alt=""></a>
							</div>
							<div class="media-body">
								<a href="index.htm#"><h4 class="media-heading">Richard Armstrong</h4></a>
								Ne error percipit senserit eam, labores cotidieque vix ad. Vix munere fastidii mediocrem in.
								<div class="media-annotation mt-5"><i class="fa fa-clock-o position-left"></i>4 minutes ago</div>
							</div>
						</div>																	
					</div>

					<div class="panel-footer">
						<ul>
							<li><a href="index.htm#"><i class="fa fa-thumbs-up position-left"></i>1438</a></li>
							<li><a href="index.htm#"><i class="fa fa-comments position-left"></i>17</a></li>
						</ul>

						<ul class="pull-right">
							<li><a href="index.htm#">View post <i class="fa fa-angle-double-right position-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">
						Our locations
						</h4>				
					</div>
					<div class="panel-body">
						<div class="map-container map-symbol-custom" style="max-height:450px;"></div>	
					</div>
				</div>
			</div>
		</div>

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