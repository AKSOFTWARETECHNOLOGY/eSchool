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

<!-- Slider -->
<div class="fullwidthbanner-container" >
    <div class="fullwidthbanner">
        <ul>
            <li data-transition="random" data-slotamount="7" data-masterspeed="1000">
                <img src="images/bg1.png" alt="slide" data-fullwidthcentering="true">
                <div class="caption large_black lfr" data-x="445" data-y="55" data-speed="1500" data-start="600" data-easing="easeInOutElastic">
                    <div class="carousel-video">
                        <div class="video">

                            <iframe width="560" height="315" src="//www.youtube.com/embed/ld4b0tgavug?rel=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="shadow-left-big"></div>
                    </div>
                </div>
                <div class="caption large_black randomrotate carousel-caption-inner" data-x="30" data-y="80" data-speed="1500" data-start="1100" data-easing="easeInOutBack">
                    <h3>Building Better Solution <span>To manage your schools</span></h3>
                </div>
                <div class="tp-caption large_black randomrotate carousel-caption-inner" data-x="30" data-y="196" data-speed="1500" data-start="1400" data-easing="easeInOutBack">
                    <p>With the help of growing latest technologies,<br> upgrade your schools for a better competition.<br> Connect with Myskoo and ease off your <br>management activities</p>
                </div>
                <div class="tp-caption lfb carousel-caption-inner" data-x="30" data-y="310" data-speed="1500" data-start="1700" data-easing="easeInOutBack">
                    <a href="/aboutus"><button type="button" class="button-blue" >Request Demo</button></a>
                </div>
            </li>
            <li data-transition="random" data-slotamount="7" data-masterspeed="1000">
                <img src="images/bg2.png" alt="slide" data-fullwidthcentering="true">
                <div class="tp-caption large_black sfr" data-x="350" data-y="0" data-speed="1500" data-start="600" data-easing="easeInOutBack">
                    <img src="images/man.png" alt="slide" >
                </div>
                <div class="tp-caption large_black lfl carousel-caption-inner" data-x="30" data-y="70" data-speed="900" data-start="800" data-easing="easeInOutQuad">
                    <h5>Better solution for schools</h5>
                </div>
                <div class="tp-caption large_black lfl carousel-caption-inner" data-x="30" data-y="125" data-speed="900" data-start="1100" data-easing="easeInOutQuad">
                    <h6>With a lot of Goodies <i class="fa fa-plus"></i></h6>
                </div>
                <div class="tp-caption large_black lfl carousel-caption-inner" data-x="30" data-y="215" data-speed="900" data-start="1400" data-easing="easeInOutQuad">
                    <h5>Connecting school-parents-students</h5>
                </div>
                <div class="tp-caption large_black lfl carousel-caption-inner" data-x="30" data-y="270" data-speed="900" data-start="1800" data-easing="easeInOutQuad">
                    <h6><i class="fa fa-plus"></i> Amazing features</h6>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Slider -->

<!-- Services -->
<div class="section">
    <div class="container">
        <div class="col-lg-4 col-md-4">
            <div class="services">
                <div class="shadow-right"></div>
                <span class="service-ico1"></span>
                <h3>Help &amp; Support</h3>
                <p>Myskoo provides complete help and support to your staff to understand and make use of all our features</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="services">
                <div class="shadow-right"></div>
                <span class="service-ico2"></span>
                <h3>Security</h3>
                <p>Data security is our important consideration. Your data are stored in the world class highly secured servers</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="services">
                <div class="shadow-right"></div>
                <span class="service-ico4"></span>
                <h3>Better Solution</h3>
                <p>We aim to provide you the better solution with all new technologies for managing your educational institution</p>
            </div>
        </div>
    </div>
</div>
<!-- Services -->

<div class="container">
    <h3 class="text-center">Features</h3>
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

<div class="space80"></div>

<!-- Call-to-action Wrap -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="cta-box">
                <div class="col-lg-9 col-md-9">
                    <h4>We provide almost all the features needed to manage a school</h4>
                    <p>All features are developed taking in suggestions and concerns from top school management</p>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="space10"></div>
                    <a href="features.php"><button type="button" class="button-blue pull-right padd30">More Features!</button></a>
                </div>

                <div class="shadow-left"></div>

            </div>
        </div>
    </div>
</div>
<!-- Call-to-action Wrap -->

<div class="space80"></div>



<!-- Footer and Footer Copyright -->

<?php include "footer.php"; ?>

<!-- Footer and Footer Copyright -->

<?php include "scriptincludes.php"; ?>
</body>
</html>