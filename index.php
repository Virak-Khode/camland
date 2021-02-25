<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/additional-css.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">   
    <link rel="stylesheet" href="assets/selectpicker/dist/bootstrap-select.min.css">
    <script src="assets/selectpicker/dist/css/bootstrap-select.min.js"></script>

    
       
        
    
    <title>Real Estate Management System||Home Page</title>
    <style type="text/css">
        .hero-search .slide--item,
        .hero-search .carousel {
            height: 100vh;
            position: relative;
}
        
        .hero-search .slider--content {
            width: 100%;
            position: absolute;
            top: 150px;
            left: 0;
            z-index: 2;
}
    </style>
</head>

<script type="text/javascript">
  function signupClick(){
    $('a #signupClick').trigger("click");
  }
</script>


<body>

    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php'); ?>

        <!-- Hero Search
============================================= -->
        <section id="heroSearch" class="hero-search mtop-100 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="slider--content">
                            <div class="text-center">
                                <h1 class="text-white">Find Your Favorite Property</h1>
                            </div>
                            <form class="mb-0" method="post" name="search" action="property-search.php">
                                <div class="form-box search-properties" style="background-color: rgba(0,0,0, 0.3); margin-bottom: 0px;">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="city" id="city" class="text-gray">
                                        <option value="">Locations</option>
                                        <?php
$query=mysqli_query($con,"SELECT * from tblcountry ORDER BY CountryName ASC");
while($row=mysqli_fetch_array($query))
{
?>
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['CountryName'];?></option>
                  <?php } ?>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="type" id="type" required="true" class="text-gray">
                                        <option value="">Property Type</option>
                                        <?php $query1=mysqli_query($con,"SELECT * from tblpropertytype ORDER BY PropertType ASC");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option value="<?php echo $row1['PropertType'];?>"><?php echo $row1['PropertType'];?></option>
                  <?php } ?>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="status" id="status" required="true" class="text-gray">
                                        <option value="">Property For</option>
                                        <?php
$query2=mysqli_query($con,"select distinct Status from  tblproperty");
while($row2=mysqli_fetch_array($query2))
{
?>
                                        <option value="<?php echo $row2['Status'];?>"><?php echo $row2['Status'];?></option>
                                        <?php } ?>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <input type="submit" value="search" name="search" class="btn btn--primary btn--block">
                                        </div>
                                      
                                      
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- .form-box end -->
                            </form>
                        </div>
                    </div>
                    <!-- .container  end -->
                </div>
                <!-- .slider-text end -->
            </div>
            <div class="carousel slider-navs" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="0" data-loop="true" data-speed="1500">
                <!-- Slide #1 -->
                <div class="slide--item bg-overlay bg-overlay-dark3" crossorigin="anonymous">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/Slider3.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #2 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/Slider5.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/Slider4.jpg" alt="background">
                    </div>
                </div>
                 <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/Slider2.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
            </div>

            
        </section>
        <!-- #property-single-slider end -->

        <!-- properties-carousel
============================================= -->
        <section id="properties-carousel" class="properties-carousel pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Latest Properties</h2>
                            <p class="heading--desc">Find any type of property within your area today.</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                            <?php
                      
$query1=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State order by rand() LIMIT 20");
while($row1=mysqli_fetch_array($query1))
{
?>

    <div class="property-item">
            <div class="property--img" width='380' height='250'>
                <a href="single-property-detail.php?proid=<?php echo $row1['ID'];?>">
                    <img src="propertyimages/<?php echo $row1['FeaturedImage'];?>" alt="<?php echo $row1['PropertyTitle'];?>"  width='380' height='250'  style="object-fit: cover;">
                </a>
                <span class="property--status"><?php echo $row1['Status'];?></span>
            </div>
            <div class="property--content">
                <div class="property--info">
                    <h5 class="property--title">
                        <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>"><?php echo $row1['PropertyTitle'];?></a>
                    </h5>
                    <p class="property--location">
                        <i class="fa fa-map-marker"></i><?php echo $row1['CountryName'];?>
                        <i class="fa fa fa-clock-o" aria-hidden="true"  style="margin-left: 14px;"></i>
                        <?php 
                            $PostDate = $row1['ListingDate'];
                            echo date("d-M-Y", strtotime($PostDate));
                        ?>  
                    </p>
                    <p class="property--price">$<?php
                        $price = $row1['RentorsalePrice'];
                        echo number_format($price)?>
                    </p>
                </div>   
            </div>
        </div>
                            
<?php } ?>


                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->















<!-- Listing all property -->
<section class="pt-0" id="forsale">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-20" style="display: flex; justify-content: space-between;">
                        <h5 class="heading--title">Recent Property For Sale</h5>
                        <span><a href="properties-grid.php">VIEW ALL&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        
                        </span>
                    </div>

    <div class="properties properties-grid">
                                
<?php
//Getting default page number 
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
// Formula for pagination
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.Status = 'Sale' order by ListingDate DESC LIMIT 6");
// $query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State order by ListingDate DESC LIMIT $offset, $no_of_records_per_page");
while($row=mysqli_fetch_array($query))
{
?>

    <div class="col-xs-12 col-sm-6 col-md-4" width='380' height='300'>
        <div class="property-item">
            <div class="property--img" width='380' height='250'>
                <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='250' style="object-fit: cover;">
                </a>
                <span class="property--status"><?php echo $row['Status'];?></span>
            </div>
            <div class="property--content">
                <div class="property--info">
                    <h5 class="property--title">
                        <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>"><?php echo $row['PropertyTitle'];?></a>
                    </h5>
                    <p class="property--location">
                        <i class="fa fa-map-marker"></i><?php echo $row['CountryName'];?>
                        <i class="fa fa fa-clock-o" aria-hidden="true"  style="margin-left: 14px;"></i>
                        <?php 
                            $PostDate = $row['ListingDate'];
                            echo date("d-M-Y", strtotime($PostDate));
                        ?>  
                    </p>
                    <p class="property--price">$<?php
                        $price = $row['RentorsalePrice'];
                        echo number_format($price)?>
                    </p>
                </div>   
            </div>
        </div>
    </div>
<?php } ?>

        </div>


        </div>
    </div>
</section>

<!-- Listing recent property for rent -->
<section class="pt-0" id="forrent">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-20" style="display: flex; justify-content: space-between;">
                        <h5 class="heading--title">Recent Property For Rent</h5>
                        <span><a href="properties-grid.php">VIEW ALL&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        
                        </span>
                    </div>

    <div class="properties properties-grid">
                                
<?php
//Getting default page number 
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
// Formula for pagination
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query_rent=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.Status = 'Rent' order by ListingDate DESC LIMIT 6");
// $query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State order by ListingDate DESC LIMIT $offset, $no_of_records_per_page");
while($row3=mysqli_fetch_array($query_rent))
{
?>

    <div class="col-xs-12 col-sm-6 col-md-4" width='380' height='300'>
        <div class="property-item">
            <div class="property--img" width='380' height='250'>
                <a href="single-property-detail.php?proid=<?php echo $row3['ID'];?>">
                    <img src="propertyimages/<?php echo $row3['FeaturedImage'];?>" alt="<?php echo $row3['PropertyTitle'];?>"  width='380' height='250'  style="object-fit: cover;">
                </a>
                <span class="property--status"><?php echo $row3['Status'];?></span>
            </div>
            <div class="property--content">
                <div class="property--info">
                    <h5 class="property--title">
                        <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>"><?php echo $row3['PropertyTitle'];?></a>
                    </h5>
                    <p class="property--location">
                        <i class="fa fa-map-marker"></i><?php echo $row3['CountryName'];?>
                        <i class="fa fa fa-clock-o" aria-hidden="true"  style="margin-left: 14px;"></i>
                        <?php 
                            $PostDate = $row3['ListingDate'];
                            echo date("d-M-Y", strtotime($PostDate));
                        ?>  
                    </p>
                    <p class="property--price">$<?php
                        $price = $row3['RentorsalePrice'];
                        echo number_format($price)?>
                    </p>
                </div>   
            </div>
        </div>
    </div>
<?php } ?>

        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-4"></div>
                <div class="heading heading-2 text-center mt-30 col-md-4">
                    
                    <a href="properties-grid.php" class="btn btn--primary" style="width: 100%;">VIEW ALL&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4"></div>                    
            </div>

        </div>
    </div>
</section>

<section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section bga-green"><img src="assets/images/cta/bg-2.png" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Are you looking for your dream property ?</h3>
                        <a href="properties-grid.php" class="btn btn--white">See more</a>
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

       <?php include_once('includes/footer.php');?>
    </div>
    <!-- #wrapper end -->


    <script src="https://kit.fontawesome.com/0dcaf9590c.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <!-- <script src="assets/js/notify.js"></script>
    <script src="assets/js/notify.min.js"></script> -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/selectpicker/dist/js/bootstrap-select.min.js"></script> 
    <script src="assets/js/functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript">
        $(document).ready(function(){
  $('select').selectpicker();
});
        
    </script> -->

</body>

</html>
