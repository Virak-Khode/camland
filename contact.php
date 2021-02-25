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
    
    <!-- Document Title
    ============================================= -->
    <title>Real Estate Management System||Contact Us</title>
</head>

<body class="bg-white" style="background-color: #fff !important; padding: 0px; margin: 0;">
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix bg-white">
         <?php include_once('includes/header.php');?>

        <!-- Page Title #1
============================================ -->
        <section id="page-title" style="height: 800px;" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/Slider3.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Contact</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Contact</li>
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

        <!-- Contact #1
============================================= -->
        <section id="contact" class="contact contact-1">
            <div class="container">
                <div class="row">
                    <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                  
                    <div class="col-xs-12 col-sm-12 col-md-1">
                        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="heading heading-2 mb-55">
                            <h2 class="heading--title">Contact</h2>
                        </div>
                        <div class="contact-panel">
                            <h3>Address</h3>
                            <p><i class="fa fa-map-marker" style="color: #f93" aria-hidden="true"></i>&nbsp;  
                                <?php  echo $row['PageDescription'];?></p>
                        </div>
                        <!-- .contact-panel -->
                        <div class="contact-panel">
                            <h3>Contact</h3>
                            
                            <p><i class="fa fa-phone" style="color: #f93" aria-hidden="true"></i>
                                +855 <?php  echo $row['MobileNumber'];?></p>
                            <p><i class="fa fa-envelope-o" style="color: #f93" aria-hidden="true"></i>
                                <?php  echo $row['Email'];?></p>
                        </div>
                        <!-- .contact-panel -->
                        <div class="contact-panel">
                            <h3>Follow Us</h3>
                            <div class="row pt-3" style="padding-top: 20px;">

                                          <!-- Grid column -->
                                          <div class="col-md-12">

                                            <div class="mb-5 flex-center">

                                              <!-- Facebook -->
                                              <a class="fb-ic">
                                                <i class="fab fa-facebook-f fa-md sc-icon mr-20"> </i>
                                              </a>
                                              
                                              <!-- Google +-->
                                              <a class="gplus-ic ">
                                                <i class="fab fa-google-plus-g fa-md sc-icon mr-20"> </i>
                                              </a>
                                              <!--Linkedin -->
                                              
                                              <!--Instagram-->
                                              <a class="ins-ic">
                                                <i class="fab fa-instagram fa-md sc-icon mr-20"> </i>
                                              </a>
                                              

                                            </div>

                                          </div>
                                          <!-- Grid column -->

                                        </div>
                                        <!-- Grid row-->
                        </div>
                        <!-- .contact-panel -->
                    </div>
                    <!-- .col-md-3 end -->

                    <div class="col-xs-12 col-sm-12 col-md-7 col-md-offset-1 p-30">
                    
                        <div class="about--img"><img class="img-responsive" src="assets/images/page-titles/City-01.jpg" width="2000" height="2000" alt="about img"></div>
                    </div>
                    <!-- .col-md-8 end -->
                </div>
               <?php } ?>
            </div>
        </section>
        <!-- #contact  end -->
        


        <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 text-center">
                        <h3 style="padding-bottom: 20px;">Are you looking for any propertie in you Cambodia ?</h3>
                        
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


        
            <div style="-webkit-box-shadow: inset 2px 2px 20px 0px rgba(0,0,0,0.25);
-moz-box-shadow: inset 2px 2px 20px 0px rgba(0,0,0,0.25);
box-shadow: inset 2px 2px 20px 0px rgba(0,0,0,0.25);">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d977.2333768152083!2d104.89889252915926!3d11.556624513404223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109510f41f52e97%3A0x12579ed8b73a7bee!2sSt%20270%2C%20Phnom%20Penh!5e0!3m2!1sen!2skh!4v1599351709677!5m2!1sen!2skh" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
      


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
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script>
        $('#googleMap').gMap({
            address: "121 King St,Melbourne, Australia",
            zoom: 12,
            maptype: 'ROADMAP',
            markers: [{
                address: "Melbourne, Australia",
                maptype: 'ROADMAP',
                icon: {
                    image: "assets/images/gmap/marker1.png",
                    iconsize: [52, 75],
                    iconanchor: [52, 75]
                }
            }]
        });

    </script>
    <script src="assets/js/map-custom.js"></script>
</body>

</html>
