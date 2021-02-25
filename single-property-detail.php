<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('messagealert.php');

$proid=$_GET['proid'];
$view_count = mysqli_query($con, "UPDATE tblproperty SET TotalViews = TotalViews+1 WHERE ID='$proid'");
$result = mysqli_query($con, $view_count);

if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $message=$_POST['message'];
    $enquirynumber = mt_rand(100000000, 999999999);
    $proid=$_GET['proid'];

    $query1=mysqli_query($con,"insert into  tblenquiry(PropertyID,FullName,Email,MobileNumber,Message,EnquiryNumber) value('$proid','$fullname','$email','$mobilenumber','$message','$enquirynumber')");

    if ($query1) {
            $msg1 = $msg_enquiry_success;
            echo "<script>window.location.hash = 'enquiry'</script>";
        }
    else
    {
            $msg1 = $msg_enquiry;
            echo "<script>window.location.hash = 'enquiry'</script>";
        }
 
}


if(isset($_POST['submitreview']))
{
    if (strlen($_SESSION['remsuid']==0)) 
    {
        $msg = $msg_review;
        echo "<script>window.location.hash = 'review'</script>";     
    } 

    else {
        $review=$_POST['reviewcomment'];
        $uid=$_SESSION['remsuid'];
        $pid=$_GET['proid'];
        $query=mysqli_query($con,"insert into tblfeedback(UserId,PropertyId,UserRemark) value('$uid','$pid','$review')");
            $msg = $msg_review_success;
            echo "<script>window.location.hash = 'review'</script>";
        }
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/fancy-box/dist/jquery.fancybox.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <title>Camland Real Estate || Property Detail</title>
    <style type="text/css">
        .owl-carousel .owl-item img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        }
        .owl-thumb-item img{
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>

<body>
    <div id="wrapper" class="wrapper clearfix">
        <header id="navbar-spy" class="header header-1 header-transparent header-fixed">
            <?php include_once('includes/header.php');?>
        </header>

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
                                    <h1>Property Overview</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Single Property</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="property-single-gallery" class="property-single-gallery">
        <?php 

        $proid=$_GET['proid'];
        $query=mysqli_query($con,"SELECT tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.ID='$proid'");
        $num=mysqli_num_rows($query);
        while ($row=mysqli_fetch_array($query)) {
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="property-single-gallery-info">
                            <div class="property--info clearfix">
                                <div class="col-xs-12 col-sm-9 col-md-9 pull-left">
                                    <h5 class="property--title" style="width: 90%;"><?php echo $row['PropertyTitle'];?></h5>
                                    <p class="property--location" style="width: 90%;">
                                        <i class="fa fa-map-marker color-main"></i>&nbsp; 
                                        <?php echo $row['City'];?>,
                                        <?php echo $row['StateName'];?> - 
                                        <?php echo $row['CountryName'];?> 
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 pull-right">
                                    <span class="property--status">For 
                                        <?php echo $row['Status'];?></span>
                                    <p class="property--price" style="color: #fb4137">$<?php
                                        $price = $row['RentorsalePrice'];
                                        echo number_format($price)?>
                                    </p>
                                    
                                </div>
                            </div>
                            
                            <div class="property--meta clearfix">
                                <div class="pull-left">
                                    <ul class="list-unstyled list-inline mb-0">
                                        <li>
                                            Property ID : <span class="value color-main"><?php echo $row['PropertyID'];?></span>
                                        </li>
                                        <li>
                                            Type : <?php echo $row['Type'];?>
                                        </li>
                                        <li>
                                            Posted : 
                                            <?php 
                                                $PostDate = $row['ListingDate'];
                                                echo date("d-M-Y", strtotime($PostDate));
                                            ?>
                                        </li>
                                        <li>
                                            View : 
                                            <?php 
                                                echo $row['TotalViews'];
                                            ?>
                                        </li>
                                       
                                    </ul>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="property-single-carousel inner-box">
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Photo Gallery</h2>
                                    </div>
                                </div>

    <?php
    $fimage = $row['FeaturedImage'];
    $image1 = $row['GalleryImage1'];
    $image2 = $row['GalleryImage2'];
    $image3 = $row['GalleryImage3'];
    $image4 = $row['GalleryImage4'];
    $image5 = $row['GalleryImage5'];
    ?>                            

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property-single-carousel-content">
                                        <div class="carousel carousel-thumbs slider-navs" data-slide="1" data-slide-res="1" data-autoplay="true" data-thumbs="true" data-nav="true" data-dots="false" data-space="0" data-loop="true" data-speed="200" data-slider-id="1">

                                    <?php if (file_exists('propertyimages/'.$fimage)) {?>
                                            <a class="fancybox" href="propertyimages/<?php echo $row['FeaturedImage'];?>" data-fancybox="group">
                                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="Property Image">
                                            </a>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image1)) {?>
                                            <a class="fancybox" href="propertyimages/<?php echo $row['GalleryImage1'];?>" data-fancybox="group">
                                            <img src="propertyimages/<?php echo $row['GalleryImage1'];?>" alt="Property Image">
                                            </a>
                                    <?php } ?> 
                                    <?php if (file_exists('propertyimages/'.$image2)) {?>
                                            <a class="fancybox" href="propertyimages/<?php echo $row['GalleryImage2'];?>" data-fancybox="group">
                                            <img src="propertyimages/<?php echo $row['GalleryImage2'];?>" alt="Property Image">
                                            </a>
                                    <?php } ?> 
                                    <?php if (file_exists('propertyimages/'.$image3)) {?>
                                            <a class="fancybox" href="propertyimages/<?php echo $row['GalleryImage3'];?>" data-fancybox="group">
                                            <img src="propertyimages/<?php echo $row['GalleryImage3'];?>" alt="Property Image">
                                            </a>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image4)) {?>
                                            <a class="fancybox" href="propertyimages/<?php echo $row['GalleryImage4'];?>" data-fancybox="group">
                                            <img src="propertyimages/<?php echo $row['GalleryImage4'];?>" alt="Property Image">
                                            </a>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image5)) {?>
                                            <a class="fancybox" href="propertyimages/<?php echo $row['GalleryImage5'];?>" data-fancybox="group">
                                            <img src="propertyimages/<?php echo $row['GalleryImage5'];?>" alt="Property Image">
                                            </a>
                                    <?php } ?>
                                        </div>


                                <div class="owl-thumbs thumbs-bg" data-slider-id="1">
                                    <?php if (file_exists('propertyimages/'.$fimage)) {?>
                                        <button class="owl-thumb-item">
                                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" width="105" height='80'>
                                        </button>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image1)) {?>
                                       <button class="owl-thumb-item">
                                            <img src="propertyimages/<?php echo $row['GalleryImage1'];?>" width="105" height='80'>
                                        </button>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image2)) {?>
                                        <button class="owl-thumb-item">
                                            <img src="propertyimages/<?php echo $row['GalleryImage2'];?>" width="105" height="80">
                                        </button>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image3)) {?>
                                        <button class="owl-thumb-item">
                                            <img src="propertyimages/<?php echo $row['GalleryImage3'];?>" width="105" height='80'>
                                        </button>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image4)) {?>
                                        <button class="owl-thumb-item">
                                            <img src="propertyimages/<?php echo $row['GalleryImage4'];?>"width="105" height='80'>
                                        </button>
                                    <?php } ?>
                                    <?php if (file_exists('propertyimages/'.$image5)) {?>
                                        <button class="owl-thumb-item">
                                            <img src="propertyimages/<?php echo $row['GalleryImage5'];?>" width="105" height='80'>
                                        </button>
                                    <?php } ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="property-single-desc inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Description</h2>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--content">
                                            <h5>Property Type :
                                                <span class="ml-15 text-primary1"><?php echo $row['Type'];?></span>
                                            </h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--content">
                                            <h5>Property For : 
                                                <span class="ml-15 text-primary1"><?php echo $row['Status'];?></span>
                                            </h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--content">
                                            <h5>Size (m<sup>2</sup>) :
                                            <span class="ml-15 text-primary1"><?php echo $row['Size'];?></span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                            <?php if($row['Type']!="Lands" || $row['Type']!="Lands"){?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--content">
                                            <h5>Bedrooms :
                                            <span class="ml-15 text-primary1"><?php echo $row['Bedrooms'];?></span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--content">
                                            <h5>Bathrooms :
                                            <span class="ml-15 text-primary1"><?php echo $row['Bathrooms'];?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>   

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--content">
                                            <h5>Price :
                                            <span class="ml-15 text-primary1">$<?php echo $row['RentorsalePrice'];?></span>
                                        </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property--details">
                                        <p><?php echo $row['PropertDescription'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php if($row['Type']!="Land" || $row['Type']!="Lands"){?>
                        <div class="property-single-features inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Features</h2>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/air-conditioning.png" class="mr-10" width="16" height="16">
                                        Air Coditioner
                                        <?php if($row['AirConditioner']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/balcony.png" class="mr-10" width="16" height="16">
                                        Balcony
                                        <?php if($row['Balcony']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>


                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/car1.png" class="mr-10" width="16" height="16">
                                        Car Parking
                                        <?php if($row['CarParking']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/wifi.png" class="mr-10" width="16" height="16">
                                        Internet / Wifi
                                        <?php if($row['Internet']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/elevator.png" class="mr-10" width="16" height="16">
                                        Elevator
                                        <?php if($row['Elevator']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/alarm-bell.png" class="mr-10" width="16" height="16">
                                        Fire Alarm
                                        <?php if($row['FireAlarm']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">              
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>  
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/gym-station.png" class="mr-10" width="16" height="16">
                                        Fitness Center

                                        <?php if($row['FitnessCenter']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">             
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/swimming-pool.png" class="mr-10" width="16" height="16">
                                        Swimming Pool
                                        <?php if($row['Pool']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/pet-friendly.png" class="mr-10" width="16" height="16">
                                        Pet Friendly
                                        <?php if($row['PetFriendly']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/kitchen.png" class="mr-10" width="16" height="16">
                                        Modern Kitchen
                                        <?php if($row['Kitchen']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/laundry.png" class="mr-10" width="16" height="16">
                                        Laundry
                                        <?php if($row['Laundry']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                    <span> 
                                        <img src="assets/icons/heating.png" class="mr-10" width="16" height="16">
                                        Heating
                                        <?php if($row['Heating']==1){?>
                                        <img src="assets/icons/checked.png" class="ml-30" width="14" height="14">
                                                      
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    <?php } ?>


                        <div class="property-single-location inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <div class="heading">
                                        <h2 class="heading--title">Location</h2>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <img src="assets/icons/map.png" class="mr-5" width="14" height="14">
                                       <span>City : <font><?php echo $row['CountryName'];?></font></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <img src="assets/icons/map.png" class="mr-5" width="14" height="14">
                                       <span>District : <font><?php echo $row['StateName'];?></font></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <img src="assets/icons/map.png" class="mr-5" width="14" height="14">
                                       <span>Commune : <font><?php echo $row['City'];?></font></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <img src="assets/icons/mailbox.png" class="mr-5" width="14" height="14">
                                       <span>Zip/Postal code : <font><?php echo $row['ZipCode'];?></font></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <img src="assets/icons/map1.png" class="mr-5" width="14" height="14">
                                        <span>Address : 
                                        <font><?php echo $row['Address'];?></font></span>   
                                    </div>     
                                </div>
                            </div>
                        </div>

                             <?php }?>
<?php $pid=intval($_GET['proid']);
$qry=mysqli_query($con,"select tblfeedback.UserRemark,tblfeedback.PostingDate,tbluser.FullName from tblfeedback join tbluser on tbluser.ID=tblfeedback.UserId where tblfeedback.PropertyId='$pid' and tblfeedback.Is_Publish='1'"); 
$countreview=mysqli_num_rows($qry);
?>
                     
                        <div class="property-single-reviews inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                    <h2 class="heading--title">
                                        <?php if($countreview >= 1){?>
                                            <span class="counter">
                                                <span><?php echo $countreview;?></span>
                                            </span>
                                        <?php } ?> 
                                        Reviews
                                    </h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="property-review">


<?php
while($rw=mysqli_fetch_array($qry)){
?>

                                        <li class="review-comment">
                                <div class="avatar"><?php echo ucfirst(substr($rw['FullName'],1,1));?>
                                </div>
                                    <div class="comment">
                                    <h6><?php echo $rw['FullName'];?></h6>
                                    <div class="date">
                                       <i class="fa fa fa-clock-o" aria-hidden="true"  style="margin-left: 14px;"></i>
                                       <?php 
                                                $PostDate = $rw['PostingDate'];
                                                echo date("d-M-Y", strtotime($PostDate));
                                                echo ' at ' .date('h:i a', strtotime($PostDate));
                                        ?>
                                    </div>
                                    <p><?php echo $rw['UserRemark'];?></p>
                                        </div>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                    <!-- .comments-list end -->
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-reviews end -->

                        <div class="property-single-leave-review inner-box" id="review">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Leave a Review</h2>
                                    </div>
                                    <?php if($msg){
                                        echo $msg;
                                    }  ?> 
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <form id="post-comment" class="mb-0" method="post">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="review-comment">Review *</label>
                                                    <textarea class="form-control" id="reviewcomment" name="reviewcomment" rows="2" required></textarea>
                                                </div>
                                            </div>
                                            <!-- .col-md-12 -->
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <button type="submit" name="submitreview" class="btn btn--primary" id="submitreview">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-leave-review end -->

             





                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-xs-12 col-sm-12 col-md-4">


<!-- widget property agent=============================-->
       <div class="widget widget-property-agent">
<?php                
$ret1=mysqli_query($con,"select * from tbluser join tblproperty on tblproperty.UserID=tbluser.ID where tblproperty.ID=$proid");
$cnt=1;
while ($row1=mysqli_fetch_array($ret1)) {

?>
                            <div class="widget--title">
                                <?php if($row1['UserType']=="1"){?>
                                <h4 style="color: #363636;">Posted by Agency</h4>
                            <?php } else{ ?>
                             <h5 style="color: #363636;" class="text-center mb-40">Posted by  Owner</h5>
                         <?php } ?>
                            </div>
                            <div class="widget--content">
                                <a href="#">
                                    <div class="agent--img text-center">
                                        <img src="assets/icons/user2-01.png" width="100" height="100">
                                    </div>
   

                                    <div class="agent--info">
                                        <h5 class="agent--title"><?php echo $row1['FullName'];?></h5>
                                    </div>
                                </a>
                                <!-- .agent-profile-details end -->
                                <div class="agent--contact">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone"></i>0<?php echo $row1['MobileNumber'];?></li>
                                        <li><i class="fa fa-envelope-o"></i><?php echo $row1['Email'];?></li>
                                       
                                    </ul>
                                </div>
                                <!-- .agent-contact end -->
                              <?php }?>
                                <!-- .agent-social-links -->
                            </div>
                        </div>
                        <!-- . widget property agent end -->

<!-- For Guest User =============================-->
<?php if($_SESSION['remsuid']==0)
{ ?>
                        <div class="widget widget-request" id="enquiry">
                            <div class="widget--title  class="text-center>
                                <h5 style="color: #363636;" class="mb-40">Request a Showing</h5>
                            </div>
                            <div class="widget--content">
                                <form class="mb-0" method="post">
                                    <div class="form-group">
                                        <label for="contact-name">Your Name*</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" required="true">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-email">Email Address*</label>
                                        <input type="email" class="form-control" name="email" id="email" required="true">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-phone">Phone Number</label>
                                        <input type="text" class="form-control" name="mobnum" id="mobnum" required="true" maxlength="10" pattern="[0-9]+">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea class="form-control" name="message" id="message" rows="2" required="true"></textarea>
                                    </div>
                                    <?php if($msg1){
                                        echo $msg1;
                                    }  ?>
                                    <!-- .form-group end -->
                                    <input type="submit" value="Send Request" name="submit" class="btn btn--primary btn--block">
                                </form>
                            </div>
                        </div>
                        <!-- . widget request end -->
<?php } 

else {
//If user is logged in
$uid=$_SESSION['remsuid'];
$sqlq=mysqli_query($con,"select * from tbluser where ID='$uid'");
while($ret=mysqli_fetch_array($sqlq))
{
$fname=$ret['FullName'];
$uemail=$ret['Email'];
$mnumebr=$ret['MobileNumber'];
} 
?>

     <div class="widget widget-request" id="enquiry">
                            <div class="widget--title text-center">
                                 <h5 style="color: #363636;" class="mb-40">Request a Showing</h5>
                            </div>
                            <div class="widget--content">
                                <form class="mb-0" method="post">
                                    <div class="form-group">
                                        <label for="contact-name">Your Name*</label>
<input type="text" class="form-control" value="<?php echo $fname;?>" name="fullname" id="fullname" required="true" readonly="true" >
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-email">Email Address*</label>
<input type="email" class="form-control" value="<?php echo $uemail;?>"  name="email" id="email" required="true" readonly="true">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-phone">Phone Number</label>
<input type="text" class="form-control" value="0<?php echo $mnumebr;?>"  name="mobnum" id="mobnum" required="true" maxlength="10" pattern="[0-9]+" readonly="true">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea class="form-control" name="message" id="message" rows="2" required="true"></textarea>
                                    </div>
                                    <?php if($msg1){
                                        echo $msg1;
                                    }  ?>
                                    <!-- .form-group end -->
                                    <input type="submit" value="Send Request" name="submit" class="btn btn--primary btn--block">
                                </form>
                            </div>
                        </div>


                     
<?php } ?>
<!-- widget mortgage calculator=============================-->

                        
    <!-- attention section -->
    <?php
            include('includes/attention.php');
    ?>






                    </div>
                </div>
            </div>
        </section>



<!-- Related posts ----------------------------------------------------------------- -->
        <section id="properties-carousel" class="properties-carousel pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2  mb-70">
                            <h2 class="heading--title">Related posts</h2>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="1500">
                            <!-- .property-item #1 -->
                            <?php
                      
$query=mysqli_query($con,"SELECT tblproperty.*,tblcountry.CountryName FROM tblproperty join tblcountry on tblcountry.ID=tblproperty.Country order by rand() limit 20");
while($row=mysqli_fetch_array($query))
{
?>
                    <div class="property-item">
                        <div class="property--img">
                            <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>" style="height: 270px;" >
                            <span class="property--status"><?php echo $row['Status'];?></span>
                            </a>
                        </div>
                        <div class="property--content">
                            <div class="property--info">
                                <h5 class="property--title"><a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                                <?php echo $row['PropertyTitle'];?></a></h5>
                                <p class="property--location">
                                <i class="fa fa-map-marker"></i>&nbsp;  
                                <?php echo $row['CountryName'];?>
                                <i class="fa fa fa-clock-o" aria-hidden="true"  style="margin-left: 14px;"></i>
                                <?php
                                $PostDate = $row['ListingDate'];
                                    echo date("d-M-Y", strtotime($PostDate));
                                                
                                ?>
                                </p>
                                <p class="property--price">
                                    $<?php
                                    $price = $row['RentorsalePrice'];
                                    echo number_format($price)
                                    ?>
                                    
                                </p>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

         <?php include_once('includes/footer.php');?>
    </div>

    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/map-custom.js"></script>
    <script src="assets/fancy-box/dist/jquery.fancybox.min.js"></script>
    <script src="https://kit.fontawesome.com/0dcaf9590c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#success-alert").fadeTo(6000, 200).slideUp(200, function(){
            $("#success-alert").slideUp(200);
            });
        });
    </script>
</body>

</html>
