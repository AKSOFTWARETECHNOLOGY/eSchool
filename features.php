<?php session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myskoo | Building Software Solutions for Education System</title>
    <?php include "headincludes.php"; ?>

</head>
<body>
<!-- Header -->
<header>
    <div class="container">
        <div class="col-md-12">
            <!-- Logo -->
            <div class="col-md-2">
                <h1 class="logo"><a href="/"><img src="images/logo.png" title="Myskoo" class="img-responsive"></a></h1>
            </div>

            <!-- Navmenu -->
            <div class="col-md-10">
                <div id='topnav'>
                    <ul class="top-menu">
                        <li class='active has-sub'>
                            <a href='/'><span>Home</span></a>
                        </li>
                        <li class='has-sub'>
                            <a href="features.php"><span>Features</span></a>
                        </li>
                        <li class="has-sub">
                            <a href="aboutus.php"><span>About Us</span></a>
                        </li>
                        <li>
                            <a href="contact.php"><span>Contact</span></a>
                        </li>
                        <li class="last">
                            <a href="webapp/index.php"><span>Login</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- Header -->

<!-- Page Head -->
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Features</h3>
            </div>

            <div class="ol-md-6">
                <ol class="breadcrumb">
                    You are here:
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Features</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page Head -->

<div class="space60"></div>

<div class="container">
    <section class="boxes">
        <div class="col-md-4 feature_border" id="col1">
            <div class="box">
                <h2><a title="Student Information" href="">Student Information</a></h2>
                <p><span>The complete student profile are stored in the myskoo system. School, staff and parents can access it from anywhere using internet</span></p>
            </div>
            <div class="box">
                <h2><a title="Grade Book" href="">Grade Book</a></h2>
                <p><span>Teachers can update gradebook easily with our myskoo system. Forget the usual papers and use our system with mobile devices or tablets</span></p>
            </div>
            <div class="box">
                <h2><a title="Staff Information" href="">Staff Information</a></h2>
                <p><span>All the staffs profile are stored in the myskoo online system. School management and parent can easily access staff details</span></p>
            </div>

        </div>

        <div class="col-md-4 feature_border" id="col2">
            <div class="box">
                <h2><a title="" href="">Attendance</a></h2>
                <p>Myskoo helps you to take the attendance using mobile devices like ipad and android tablets. Forget about your paper works !!</p>

            </div>
            <div class="box">
                <h2><a title="Online Space" href="">Online Space</a></h2>
                <p><span>Myskoo provides an online space for all schools in our network. The school can show their basic info in that space to attract future students</span></p>
            </div>
            <div class="box">
                <h2><a title="Messaging system" href="">Messaging system</a></h2>
                <p><span>Messaging system helps the school admin to update parents about their child attendance and mark sheet. We provide both Email or sms</span></p>
            </div>

        </div>

        <div class="col-md-4 feature_border_none" id="col3">
            <div class="box">
                <h2><a title="Time tables" href="">Time tables</a></h2>
                <p><span>You can create weekly & exam schedules for each classes. Parents will have the access to look at their child's time table online</span></p>
            </div>
            <div class="box">
                <h2><a title="Reports" href="">Reports</a></h2>
                <p><span>Myskoo helps staff and school management to generate student reports and staff reports for better analysis and management </span></p>
            </div>
            <div class="box">
                <h2><a title="Reports" href="">Student Admission</a></h2>
                <p><span>Myskoo helps you to do all of your admission processes online. Helps parents to apply and enroll online. No need of long queues</span></p>
            </div>



        </div>
    </section>
</div>

<div class="space50"></div>


<!-- Footer and Footer Copyright -->

<?php include "footer.php"; ?>

<!-- Footer and Footer Copyright -->
<?php include "scriptincludes.php"; ?>
</body>
</html>