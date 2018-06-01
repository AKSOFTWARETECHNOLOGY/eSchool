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
                <h3>Contact Us</h3>
            </div>

            <div class="ol-md-6">
                <ol class="breadcrumb">
                    You are here:
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Contact us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page Head -->

<div class="space60"></div>

<!-- Contact Wrap -->
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h4 class="Section-title"><span>Send Us a Message</span></h4>
            <div class="space25"></div>
            <p>If you are a school, to know more about us, about our detailed feature description, our pricing, our application demo or any information about us feel free to contact by filling the below form or make a direct call to the phone number mentioned in right side. If you are a parent of a child, please contact the school directly for questions</p>
            <div class="space40" id="contact_result"></div>
            <?php
            if(isset($_REQUEST['succ'])) {
                if ($_REQUEST['succ'] == 1) {
                    ?>
                    <div class="alert alert-success alert-dismessible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Contact Form Submitted Successfully</strong>
                    </div>
                <?php
                }
            }
            else if(isset($_REQUEST['err'])) {
                if ($_REQUEST['err'] == 1) {
                    ?>
                    <div class="alert alert-danger alert-dismessible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Unable to submit the Contact Form</strong>
                    </div>
                <?php
                }
            }
            ?>
            <div id="contact_form_holder">
                <form class="contact-form" action="dosubmitcontactform.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="contact_name" class="form-control" placeholder="Your name..." required/>
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="contact_phone_number"  class="form-control" placeholder="Your Phone Number..."/>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="contact_email" class="form-control" placeholder="Your Email..." required/>
                        </div>
                    </div>
                    <textarea rows="7" name="contact_message"  class="form-control" placeholder="Your message..."></textarea>
                    <div class="space25"></div>
                    <input class="button-blue btn form-control" type="submit" value="Send Message" />
                </form>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="Section-title"><span>Contact Info</span></h4>
            <div class="contact-info">
                <div class="space25"></div>
                <!--
                <p>12345 North Main Street, Pod 42 New York, NY 555555, USA</p>
                -->
                <div class="space30"></div>
                <p>Phone: +91 94446 08599</p>
                <p>Email: <a href="mailto:contact@myskoo.in">contact@myskoo.in</a></p>
            </div>
        </div>
    </div>
</div>
<div class="space70"></div>
<div class="container textbox">
    <div class="line"></div>
    <div class="space15"></div>
    <div class="row">
        <div class="col-md-10">
            <h4>Myskoo is a very clear and proffesional product with a lot of features and goodies!</h4>
            <p>We simplify your most of your school management system and to update your school to international level</p>
            <ul>
                <li><i class="fa fa-check"></i>Lot of features</li>
                <li><i class="fa fa-check"></i>Better solution</li>
                <li><i class="fa fa-check"></i>High standard</li>
            </ul>
        </div>
        <div class="col-md-2">
            <a class="bubble-button pull-right">Contact us soon!</a>
        </div>
    </div>
    <div class="space10"></div>
    <div class="line"></div>
</div>
<!-- Contact Wrap -->

<div class="space90"></div>

<!-- Footer and Footer Copyright -->

<?php include "footer.php"; ?>

<!-- Footer and Footer Copyright -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/jquery.gmap.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/custom/contact.js"></script>
<script type="text/javascript" src="js/custom/myskooAjax.js"></script>
<?php include "scriptincludes.php"; ?>

</body>
</html>