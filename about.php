<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    

    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <style type="text/css">
        .feature .feature-items{
            padding: 30px;
            border-radius: 8px;
            background-color: #fff;
        }
    </style>
    

    <!-- Document Title
    ============================================= -->
    <title>Real Estate Management System|| About Us</title>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>

        <!-- Page Title #1
============================================ -->
        <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/slider/slide-bg/Slider2.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>About Us</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">About</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #page-title end -->

        <!-- about #1
============================================= -->
        <section id="about" class="about bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div class="about--img"><img class="img-responsive" src="assets/images/about/side1.jpg" width="350" height="350" alt="about img"></div>
                    </div>
                    <!-- .col-md-5 -->
                    <div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1">
                        <?php

                    
$ret=mysqli_query($con,"SELECT * from tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="heading heading-3">
                           
                        </div>
                        <!-- .heading-title end -->
                        <div class="about--panel">
                            
                            
                        </div><p style="color: red;"><?php echo $row['PageDescription'];?>
                                
                            </p>
                        <!-- .about-panel end -->
                       
                        <!-- .about-panel end -->
                    </div>
                   <?php } ?>
                </div>
                
            </div>
            <!-- .container -->
        </section>
        <!-- #about end -->

        <section>
            <div class="feature">
            <div class="container">
                <div class="row">
                        <div class="col-md-2 col-sm-4 text-center"></div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <!-- feature item -->
                            <div class="feature-items">
                                <!-- icon -->
                                
                                <!-- heading -->
                                <h5>Our Mission</h5>
                                <!-- paragraph -->
                                <p class="text-grey">We are passionate about giving back in the communities we serve. We are resourceful, always seeking to discover a solution and providing options for any concerns that arise.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <!-- feature item -->
                            <div class="feature-items">
                                <!-- icon -->
                                
                                <!-- heading -->
                                <h5>Our Vision</h5>
                                <!-- paragraph -->
                                <p>We are looking forward to achieve the highest possible standards of the real estate market while establishing a good service plateform for our visitor with a reliable connection</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 text-center">
                            
                        </div>
                    
                </div>
            </div>
        </div>
        </section>

          <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-2.png" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 text-center">
                        <h3 style="padding-bottom: 20px;">Are you looking for any propertie in your area ?</h3>
                        
                       <a href="properties-grid.php" class="btn btn--primary">
                                <i class="fa fa-search" aria-hidden="true"></i>&nbsp; 
                            Find More</a>
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #cta1 end -->
        <section>
            <!-- feature block -->
            <div class="feature">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 text-center">
                            <!-- feature item -->
                            <div class="feature-item">
                                <!-- icon -->
                                <i class="fa fa-user-shield"></i>
                                <!-- heading -->
                                <h4>Create an Account</h4>
                                <!-- paragraph -->
                                <p class="text-grey">Register for account to login with this website and manage your dashboard. Make sure to choose your account type.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <!-- feature item -->
                            <div class="feature-item">
                                <!-- icon -->
                                <i class="fas fa-cloud-upload-alt text-primary"></i>
                                <!-- heading -->
                                <h4>Add Property</h4>
                                <!-- paragraph -->
                                <p>After you've created an account then you can start selling your own property to our visitor and you can manage your dashboard from here.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <!-- feature item -->
                            <div class="feature-item">
                                <!-- icon -->
                                <i class="fas fa-check"></i>
                                <!-- heading -->
                                <h4>Done</h4>
                                <!-- paragraph -->
                                <p>Get the thing done with easy step to go with us. We are so happy to help you grow your income. Stay better Stay easy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


      

     
        <!-- #cta1 end -->
        <!-- Footer #1
============================================= -->
        <?php include_once('includes/footer.php');?>
       
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>