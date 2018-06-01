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

<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>About Us</h3>
            </div>

            <div class="ol-md-6">
                <ol class="breadcrumb">
                    You are here:
                    <li><a href="index.html">Home</a></li>
                    <li class="active">About us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page Head -->

<div class="space60"></div>

<div class="container">
    <div class="row">
        <div class="col-md-6 about-home">
            <div class="col-md-12 no-padding">
                <h2 class="section-title"><span>Who we are</span></h2>
            </div>

            <div class="col-md-12 no-padding clearfix media ">
                <img class="pull-left" src="images/1.jpg" alt=""/>
                <p>Mysoo is an online service for the schools to easily manage their school activity. Enables teachers-parents -students communication in a better way. We almost provide all the functionality needed to manage your institutions. The features are developed taking the suggestions and concerns of many top level school managers.</p>
            </div>
            <div class="white-panel">
                <p>We will simplify most of your school management activities and will help you to update your school with all the latest technology. </p>
            </div>
            <p>Our system is completely web based meaning that it can be accessed from any computer using internet access.
                You can access from anywhere, anytime. Your data are stored in the world class highly secured servers.</p>
        </div>

        <div class="col-lg-6">
            <div class="col-lg-12 no-padding r-quote">
                <h5>Hi, Thanks for your interest</h5>
                <p>Fill the form below to get a free demo</p>
                <?php
                if(isset($_REQUEST['succ'])) {
                    if ($_REQUEST['succ'] == 1) {
                        ?>
                        <div class="alert alert-success alert-dismessible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Request Demo Form Submitted Successfully</strong>
                        </div>
                    <?php
                    }
                }
                else if(isset($_REQUEST['err'])) {
                    if ($_REQUEST['err'] == 1) {
                        ?>
                        <div class="alert alert-danger alert-dismessible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Unable to submit the Request Demo Form</strong>
                        </div>
                    <?php
                    }
                }
                ?>
                <div class="sep"></div>
                <form action="dorequestdemo.php" method="post">
                    <input type="email" class="form-control form-email" name="request_demo_email" placeholder="Type your email..." required>
                    <div class="space15"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="request_demo_name" placeholder="Type your name..." required>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="request_demo_phone" placeholder="Type your phone number...">
                        </div>
                    </div>
                    <div class="form-btn-wrap">
                        <input class="button-blue btn form-control" type="submit" value="Request Demo" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="space80"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="col-lg-12 no-padding">
                <h2 class="section-title"><span>Many more from us</span></h2>
            </div>

            <!-- Accordion -->
            <div class="akordeon">
                <div class="akordeon-item">
                    <div class="akordeon-item-head first">
                        <div class="akordeon-item-head-container">
                            <div class="akordeon-heading">Hosting - Free !</div>
                        </div>
                    </div>
                </div>

                <div class="akordeon-item">
                    <div class="akordeon-item-head">
                        <div class="akordeon-item-head-container">
                            <div class="akordeon-heading">Customisation - Free !</div>
                        </div>
                    </div>
                </div>

                <div class="akordeon-item">
                    <div class="akordeon-item-head">
                        <div class="akordeon-item-head-container">
                            <div class="akordeon-heading">No new hardware</div>
                        </div>
                    </div>
                </div>

                <div class="akordeon-item">
                    <div class="akordeon-item-head">
                        <div class="akordeon-item-head-container">
                            <div class="akordeon-heading">No new software</div>
                        </div>
                    </div>
                </div>

                <div class="akordeon-item">
                    <div class="akordeon-item-head">
                        <div class="akordeon-item-head-container">
                            <div class="akordeon-heading">Easy to understand and work</div>
                        </div>
                    </div>
                </div>

                <div class="akordeon-item">
                    <div class="akordeon-item-head">
                        <div class="akordeon-item-head-container">
                            <div class="akordeon-heading">Highly secure</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="col-md-6 about-home">
            <div class="col-md-12 no-padding">
                <h2 class="section-title"><span>Testimonials</span></h2>
                <div id="quoteslider" class="flexslider">
                    <div class="quote-wrap">
                        <h6>Best for all schools</h6>
                        <p>Simply the best administrative software. Easy to understand and easy to use. Thanks for Myskoo support in updating our school with the latest technology. You reduced our paperwork a lot. With Myskoo both the school and parents got benifited a lot</p>
                        <div class="quote-author">
                            <div class="quote-author-img">
                                <img src="images/testimonial.jpg" alt=""/>
                            </div>
                            <h5>Robert Smith <span>Manager</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space20"></div>

</div>

<!-- Footer and Footer Copyright -->

<?php include "footer.php"; ?>

<!-- Footer and Footer Copyright -->
<?php include "scriptincludes.php"; ?>
</body>
</html>