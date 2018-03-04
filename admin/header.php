<style>
    .content-wrapper {
        min-height: 590px !important;
    }
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="http://www.myskoo.in/images/logo.png" width="100%"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="http://www.myskoo.in/images/logo.png" width="40%"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="image/user2-160x160.jpg" class="user-image" alt="User Image" />
                        <span class="hidden-xs">Admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="image/user2-160x160.jpg" class="img-circle" alt="User Image" />
                            <p>
                                Admin Manager
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="admin-profile.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="image/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="dashboard.php">
                    <i class="ion ion-pie-graph"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="profile-list.php">
                    <i class="ion ion-android-person"></i> <span>Schools</span>
                </a>
            </li>
            <li class="treeview">
                <a href="createprofile.php">
                    <i class="ion ion-android-person"></i> <span>Create School</span>
                </a>
            </li>
            <li class="treeview">
                <a href="class-list.php">
                    <i class="ion ion-android-person"></i> <span>Class List</span>
                </a>
            </li>
            <li class="treeview">
                <a href="section-list.php">
                    <i class="ion ion-android-person"></i> <span>Section List</span>
                </a>
            </li>

            <li class="treeview">
                <a href="logout.php">
                    <i class="ion ion-log-out"></i> <span>Logout</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
