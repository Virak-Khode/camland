<?php
// $mysqli = new mysqli('localhost','root','','remsdb') or die(mysqli_error($mysqli));

session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {

    echo "<script>alert('Please Resister an account to post property.');</script>";
    header('location:index.php');
  }
  else{

if(isset($_POST['submit']))
  {
$uid=$_SESSION['remsuid'];
// property description
$protitle=$_POST['propertytitle'];
$prodec=$_POST['propertydescription'];
$type=$_POST['selecttype'];
$status=$_POST['status'];
$bedrooms=$_POST['bedrooms'];
$bathrooms=$_POST['bathrooms'];
$size=$_POST['size'];
$srprice=$_POST['salerentprice'];
// property features
$airconditioner=$_POST['airconditioner'];
$internet=$_POST['internet'];
$gym=$_POST['gym'];
$modernkitchen=$_POST['modernkitchen'];
$balcony=$_POST['balcony'];
$elevator=$_POST['elevator'];
$pool=$_POST['pool'];
$laundry=$_POST['laundry'];
$carparking=$_POST['carparking'];
$firealarm=$_POST['firealarm'];
$petfriendly=$_POST['petfriendly'];
$heating=$_POST['heating'];
// property location
$proaddress=$_POST['address'];
$procountry=$_POST['country'];
$procity=$_POST['city'];
$prostate=$_POST['state'];
$prozipcode=$_POST['zipcode'];
$neighborhood=$_POST['neighborhood'];
$TotalView = 0;

//propertyID
$proid=mt_rand(100000000, 999999999);
//fetured Image
$pic=$_FILES["featuredimage"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Property  Image 1
$pic1=$_FILES["galleryimage1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Property  Image 2
$pic2=$_FILES["galleryimage2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Property  Image 3
$pic3=$_FILES["galleryimage3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Property  Image 4
$pic4=$_FILES["galleryimage4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
//Property  Image 5
$pic5=$_FILES["galleryimage5"]["name"];
$extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
// if(!in_array($extension1,$allowed_extensions))
// {
// echo "<script>alert('Property gallery image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
// }
// if(!in_array($extension2,$allowed_extensions))
// {
// echo "<script>alert('Property gallery image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
// }
// if(!in_array($extension3,$allowed_extensions))
// {
// echo "<script>alert('Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
// }
// if(!in_array($extension4,$allowed_extensions))
// {
// echo "<script>alert('Property gallery image4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
// }
// if(!in_array($extension5,$allowed_extensions))
// {
// echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
// }
else
{
//rename property images
$propic=md5($pic).time().$extension;
$propic1=md5($pic1).time().$extension1;
$propic2=md5($pic2).time().$extension2;
$propic3=md5($pic3).time().$extension3;
$propic4=md5($pic4).time().$extension4;
$propic5=md5($pic5).time().$extension5;
     move_uploaded_file($_FILES["featuredimage"]["tmp_name"],"propertyimages/".$propic);
     move_uploaded_file($_FILES["galleryimage1"]["tmp_name"],"propertyimages/".$propic1);
     move_uploaded_file($_FILES["galleryimage2"]["tmp_name"],"propertyimages/".$propic2);
     move_uploaded_file($_FILES["galleryimage3"]["tmp_name"],"propertyimages/".$propic3);
     move_uploaded_file($_FILES["galleryimage4"]["tmp_name"],"propertyimages/".$propic4);
     move_uploaded_file($_FILES["galleryimage5"]["tmp_name"],"propertyimages/".$propic5);

    //$mysqli->query("INSERT INTO tblproperty(UserID,PropertyTitle,PropertDescription,Type,Status,Location,Bedrooms,Bathrooms,Floors,Garages,Area,Size,RentorsalePrice,BeforePricelabel,AfterPricelabel,PropertyID,CenterCooling,Balcony,PetFriendly,Barbeque,FireAlarm,ModernKitchen,Storage,Dryer,Heating,Pool,Laundry,Sauna,Gym,Elevator,DishWasher,EmergencyExit,FeaturedImage,GalleryImage1,GalleryImage2,GalleryImage3,GalleryImage4,GalleryImage5,Address,Country,City,State,ZipCode,Neighborhood)VALUES('$uid','$protitle','$prodec','$type','$status','$location','$bedrooms','$bathrooms','$floors','$garages','$area','$size','$srprice','$beforepricelabel','$afterpricelabel','$proid','$ccolling','$balcony','$petfrndly','$barbeque','$firealarm','$modkitchen','$storage','$dryer','$heating','$pool','$laundry','$sauna','$gym','$elevator','$dishwasher','$eexit','$propic','$propic1','$propic2','$propic3','$propic4','$propic5','$proaddress','$procountry','$procity','$prostate','$prozipcode','$neighborhood')");
    $query=mysqli_query($con,"INSERT INTO tblproperty(UserID,PropertyTitle,PropertDescription,Type,Status,Bedrooms,Bathrooms,Size,RentorsalePrice,PropertyID,AirConditioner,Internet,FitnessCenter,Kitchen,Balcony,Elevator,Pool,Laundry,CarParking,FireAlarm,PetFriendly,Heating,FeaturedImage,GalleryImage1,GalleryImage2,GalleryImage3,GalleryImage4,GalleryImage5,Address,Country,City,State,ZipCode,Neighborhood,TotalViews)
    VALUES('$uid','$protitle','$prodec','$type','$status','$bedrooms','$bathrooms','$size','$srprice','$proid','$airconditioner','$internet','$gym','$modernkitchen','$balcony','$elevator','$pool','$laundry','$carparking','$firealarm','$petfriendly','$heating','$propic','$propic1','$propic2','$propic3','$propic4','$propic5','$proaddress','$procountry','$procity','$prostate','$prozipcode','$neighborhood','$TotalView')");
    // $query=mysqli_query($con,"insert into tblproperty(UserID,PropertyTitle,PropertDescription,Type,Status,Location,Bedrooms,Bathrooms,Floors,Garages,Area,Size,RentorsalePrice,BeforePricelabel,AfterPricelabel,PropertyID,CenterCooling,Balcony,PetFriendly,Barbeque,FireAlarm,ModernKitchen,Storage,Dryer,Heating,Pool,Laundry,Sauna,Gym,Elevator,DishWasher,EmergencyExit,FeaturedImage,GalleryImage1,GalleryImage2,GalleryImage3,GalleryImage4,GalleryImage5,Address,Country,City,State,ZipCode,Neighborhood)value
    //     ('$uid','$protitle','$prodec','$type','$status','$location','$bedrooms','$bathrooms','$floors','$garages','$area','$size','$srprice','$beforepricelabel','$afterpricelabel','$proid','$ccolling','$balcony','$petfrndly','$barbeque','$firealarm','$modkitchen','$storage','$dryer','$heating','$pool','$laundry','$sauna','$gym','$elevator','$dishwasher','$eexit','$propic','$propic1','$propic2','$propic3','$propic4','$propic5','$proaddress','$procountry','$procity','$prostate','$prozipcode','$neighborhood')");
   if ($query) {
        header('Location: my-properties.php?success=1'); 
  }
  else
    {
        
         $msg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Something wrong!</strong> Failed to post property.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

  
}
}



?>


 <!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"> -->
    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/additional-css.css" rel="stylesheet">
   
    <title>Real Estate Managment System|| Add Property</title>
    <!-- <style type="text/css">
        html {
    scroll-padding-top: 50px;
}
    </style> -->
</head>
<script>
function getsate(val) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$countryid='+val,
success:function(data){
$("#state").html(data);
}

  });
}
</script>

<script>
function getcity(val1) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$stateid='+val1,
success:function(data){
$("#city").html(data);
}

  });
}
</script>


<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>
        
        <!-- Page Title #1
============================================ -->
        <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/Slider3.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Post Property</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Add Property</li>
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
           
        </section>
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->

        <section id="add-property" class="add-property bg-light">
            
            <div class="container bg-light">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <form class="mb-0" method="post"  enctype="multipart/form-data">
                            <?php if($msg){
                                echo $msg;
                            }  ?> 
                            <div class="form-box bg-white bg-shadow" style="box-shadow: 2px 2px 10px rgba(0,0,0,0.2);">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Informations</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-title">Property Title<span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" name="propertytitle" id="propertytitle" required>
                                        </div>
                                    </div>
                                    
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="select-type">Property Type
                                                <font style="color: red;"> *</font>
                                            </label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select id="selecttype" name="selecttype" required="true" onchange="hideDiv(this.value)">
                                            <option value="">Select Type</option>
                                                    <?php $query1=mysqli_query($con,"select * from tblpropertytype");
                                                    
                                                    while($row1=mysqli_fetch_array($query1))
                                                    
                                                   {
                                                    ?>      
                                                        <option value="<?php echo $row1['PropertType'];?>"><?php echo $row1['PropertType'];?></option>
                                                   <?php } ?>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="select-status">Status</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select id="status" name="status">
                                            <option>Sale</option>
                                            <option>Rent</option>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location">
                                        </div>
                                    </div> -->
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6" id="Bedrooms">
                                        <div class="form-group">
                                            <label for="Bedrooms">Bedrooms</label>
                                            <input type="text" class="form-control" name="bedrooms" id="bedrooms">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6" id="Bathrooms">
                                        <div class="form-group">
                                            <label for="Bathrooms">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" id="bathrooms">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Floors">Floors</label>
                                            <input type="text" class="form-control" name="floors" id="floors">
                                        </div>
                                    </div> -->
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Garages">Garages</label>
                                            <input type="text" class="form-control" name="garages" id="garages">
                                        </div>
                                    </div> -->
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Area">Area</label>
                                            <input type="text" class="form-control" name="area" id="area" placeholder="sq ft">
                                        </div>
                                    </div> -->
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Size">Size (m<sup>2</sup>)</label>
                                            <input type="text" class="form-control" name="size" id="size">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Sale-Rent-Price">Price
                                                <font style="color: red;"> *</font></label>
                                            <div class="input-group">
                                                <span class="input-group-addon" style="border-right: 1px solid #eee; border: 1px solid #eee;">$</span>
                                                <input type="text" class="form-control" name="salerentprice" id="salerentprice" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-description">Description
                                                <span style="color: red;"> *</span></label>
                                            <textarea class="form-control" name="propertydescription" id="propertydescription" rows="2" minlength="20" maxlength="300" required></textarea>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Before-Price-Label">Before Price Label</label>
                                            <input type="text" class="form-control" name="beforepricelabel" id="beforepricelabel" placeholder="ex: start from">
                                        </div>
                                    </div> -->
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="After-Price-Label">After Price Label</label>
                                            <input type="text" class="form-control" name="afterpricelabel" id="afterpricelabel" placeholder="ex: monthly">
                                        </div>
                                    </div> -->
                                    
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <div class="form-box" style="box-shadow: 2px 2px 10px rgba(0,0,0,0.2);" id="property-features">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Features</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Air Conditioner</span>
                                        <input type="checkbox" name="airconditioner" id="airconditioner" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Internet / Wifi</span>
                                        <input type="checkbox" name="internet" id="internet" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Gym / Fitness Center</span>
                                        <input type="checkbox" name="gym" id="gym" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Modern Kitchen</span>
                                        <input type="checkbox" name="modernkitchen" id="modernkitchen" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Balcony</span>
                                        <input type="checkbox" name="balcony" id="balcony" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Elevator</span>
                                        <input type="checkbox" name="elevator" id="elevator" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Swimming Pool</span>
                                        <input type="checkbox" name="pool" id="pool" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Laundry</span>
                                        <input type="checkbox" name="laundry" id="laundry" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Car Parking</span>
                                        <input type="checkbox" name="carparking" id="carparking" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Fire Alarm</span>
                                        <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Pet Friendly</span>
                                        <input type="checkbox" name="petfriendly" id="petfriendly" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Heating</span>
                                        <input type="checkbox" name="heating" id="heating" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    
                                    <!-- .col-md-3 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box" style="box-shadow: 2px 2px 10px rgba(0,0,0,0.2);">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Photos
                                            <font style="color: red;"> *</font>
                                        </h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <!-- <label for="address" class="mb-20">Featured Photo</label> -->
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerFeature()">
                                                <h4 id="uploadfile" style="opacity: 1;">
                                                    <i class="fa fa-cloud-upload"></i>Upload File</h4>
                                              </div>
                                              <img src="propertyimages/placeholder.png" onClick="triggerFeature()" class="profileDisplay" id="profileDisplay">
                                              <a href="javascript:void(0)" id="btn-reset" type="button" hidden="true">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="featuredimage" onChange="showFeature(this)" id="profileImage" class="form-control" style="display: none;">
                                             
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <!-- <label for="address" class="mb-20">Photo</label> -->
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic1()">
                                                <h4 id="uploadfile1">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/placeholder.png" onClick="triggerPic1()" class="profileDisplay" id="profileDisplay1">
                                              <a href="javascript:void(0)" id="btn-reset1" type="button" hidden="true">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage1" onChange="showPic1(this)" id="profileImage1" class="form-control" style="display: none;">
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <!-- <label for="address" class="mb-20">Photo</label> -->
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic2()">
                                                <h4 id="uploadfile2">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/placeholder.png" onClick="triggerPic2()" class="profileDisplay" id="profileDisplay2">
                                              <a href="javascript:void(0)" id="btn-reset2" type="button" hidden="true">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage2" onChange="showPic2(this)" id="profileImage2" class="form-control" style="display: none;">
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <!-- <label for="address" class="mb-20">Photo</label> -->
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic3()">
                                                <h4 id="uploadfile3">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/placeholder.png" onClick="triggerPic3()" class="profileDisplay" id="profileDisplay3">
                                              <a href="javascript:void(0)" id="btn-reset3" type="button" hidden="true">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage3" onChange="showPic3(this)" id="profileImage3" class="form-control" style="display: none;">
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <!-- <label for="address" class="mb-20">Photo</label> -->
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic4()">
                                                <h4 id="uploadfile4">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/placeholder.png" onClick="triggerPic4()" class="profileDisplay" id="profileDisplay4">
                                              <a href="javascript:void(0)" id="btn-reset4" type="button" hidden="true">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage4" onChange="showPic4(this)" id="profileImage4" class="form-control" style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <!-- <label for="address" class="mb-20">Photo</label> -->
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic5()">
                                                <h4 id="uploadfile5">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/placeholder.png" onClick="triggerPic5()" class="profileDisplay" id="profileDisplay5">
                                              <a href="javascript:void(0)" id="btn-reset5" type="button" hidden="true">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage5" onChange="showPic5(this)" id="profileImage5" class="form-control" style="display: none;">
                                        </div>
                                    </div>


                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box" style="box-shadow: 2px 2px 10px rgba(0,0,0,0.2);">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Location</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address
                                                <font style="color: red;"> *</font>
                                            </label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter your property address" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">City / Province
                                                <font style="color: red;"> *</font>
                                            </label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                     <select type="text" name="country" id="country" required="true" onChange="getsate(this.value)" class="form-control">
                                             <option value="">Select City</option>
              <?php $query=mysqli_query($con,"select * from tblcountry");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['CountryName'];?></option>
                  <?php } ?>
                                         </select>
                                            </div>
                                        </div>
                                    </div>


            <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="state">Khan / District</label>
                                             <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                            <select type="text" class="form-control" name="state" id="state" onChange="getcity(this.value)" >
                                            </select>
                                        </div>
                                    </div>
                                    </div>


                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="city">Sangkat / Commune</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                            <select class="form-control" name="city" id="city">
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                        
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip / Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" id="neighborhood">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                 
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <div class="col-xs-12 col-sm-4 col-md-4"></div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <input type="submit" value="Submit" name="submit" class="btn btn--primary" style="width: 100%;">
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4"></div>
                            <!-- <input type="submit" value="Submit" name="submit" class="btn btn--primary"> -->
                        </form>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
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
    <script src="assets/js/uploadphoto.js"></script>
    <script type="text/javascript">
        function jsFunction(){
        alert('Execute Javascript Function Through PHP');
        }

    // input numbers only
        $('#salerentprice,#bathrooms,#bedrooms').on('input blur paste', function(){
        $(this).val($(this).val().replace(/\D/g, ''))
        });

    // Hide div through property type
        function hideDiv(option)    
        {
        if(option=="Land" || option=="Lands"){
                $('#Bedrooms').hide()
                $('#Bathrooms').hide()
                $('#property-features').hide()
            }
            else{
                $('#Bedrooms').show()
                $('#Bathrooms').show()
                $('#property-features').show()
            }
        }
</script>
</body>

</html>
 <?php } ?>