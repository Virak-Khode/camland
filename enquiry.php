<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  } else{



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
   
    <title>Real Estate Managment System|| Enquiry</title>
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
                <img src="assets/images/page-titles/Slider2.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Received Enquiry</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Recieved Enquiry</li>
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

        <!-- #Add Property
============================================= -->
        <section id="add-property" class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">
                                              <i class="fa fa-envelope-o color-main" aria-hidden="true"></i>&nbsp;&nbsp;Total Received Enquiry</h4>
                                        
                                        <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                    <th>S.NO</th>
                    <th>Enquiry Number</th>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
               $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from  tblenquiry join tblproperty on tblproperty.Id=tblenquiry.PropertyID where tblenquiry.Status is null and tblproperty.UserID='$uid' ");
$num=mysqli_num_rows($ret);
if($num >0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['EnquiryNumber'];?></td>
                  <td><?php  echo $row['FullName'];?></td>
                  <td>+855 <?php  echo $row['MobileNumber'];?></td>
                  
                  <td>
                    <i class="fa fa-eye color-main"></i>&nbsp;
                    <a href="view-enquiry-detail.php?viewid=<?php echo $row['ID'];?>" style="color: #0275d8"> View</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
 <th colspan="5" style="text-align: center;">
    <div class="alert alert-warning" role="alert">
        No Enquiry Found !
    </div>
 </th>   

</tr>
<?php } ?>
              </table>             </div>
                                    <!-- .col-md-12 end -->
                                   
                                   
                                   
                                   
                                    <!-- .col-md-12 end -->

                                </div>
                                <!-- .row end -->
                            </div>
                  
                            
                       
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
       
         <section style="margin-top: -100px;">
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




                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        
        

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
 <?php } ?>