<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
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

$pic=$_FILES["featuredimage"]["name"];
if(!empty($pic)){
    $extension = substr($pic,strlen($pic)-4,strlen($pic));
    $propic=md5($pic).time().$extension;
    move_uploaded_file($_FILES["featuredimage"]["tmp_name"],"propertyimages/".$propic);
    $query_update = mysqli_query($con,"UPDATE tblproperty set FeaturedImage='$propic' where ID='$eid'");
     mysqli_free_result($query_update);
}
$pic1=$_FILES["galleryimage1"]["name"];
if(!empty($pic1)){
    $extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
    $propic1=md5($pic1).time().$extension1;
    move_uploaded_file($_FILES["galleryimage1"]["tmp_name"],"propertyimages/".$propic1);
    $query_update1 = mysqli_query($con,"UPDATE tblproperty set GalleryImage1='$propic1' where ID='$eid'");
    mysqli_free_result($query_update1);
}
$pic2=$_FILES["galleryimage2"]["name"];
if(!empty($pic2)){
    $extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
    $propic2=md5($pic2).time().$extension2;
    move_uploaded_file($_FILES["galleryimage2"]["tmp_name"],"propertyimages/".$propic2);
    $query_update2 = mysqli_query($con,"UPDATE tblproperty set GalleryImage2='$propic2' where ID='$eid'");
    mysqli_free_result($query_update2);
}
$pic3=$_FILES["galleryimage3"]["name"];
if(!empty($pic3)){
    $extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
    $propic3=md5($pic3).time().$extension3;
    move_uploaded_file($_FILES["galleryimage3"]["tmp_name"],"propertyimages/".$propic3);
    $query_update3 = mysqli_query($con,"UPDATE tblproperty set GalleryImage3='$propic3' where ID='$eid'");
    mysqli_free_result($query_update3);
}
$pic4=$_FILES["galleryimage4"]["name"];
if(!empty($pic4)){
    $extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
    $propic4=md5($pic4).time().$extension4;
    move_uploaded_file($_FILES["galleryimage4"]["tmp_name"],"propertyimages/".$propic4);
    $query_update4 = mysqli_query($con,"UPDATE tblproperty set GalleryImage4='$propic4' where ID='$eid'");
    mysqli_free_result($query_update4);
}
$pic5=$_FILES["galleryimage5"]["name"];
if(!empty($pic5)){
    $extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
    $propic5=md5($pic5).time().$extension5;
    move_uploaded_file($_FILES["galleryimage5"]["tmp_name"],"propertyimages/".$propic5);
    $query_update5 = mysqli_query($con,"UPDATE tblproperty set GalleryImage5='$propic5' where ID='$eid'");
    mysqli_free_result($query_update5);
}


    $query=mysqli_query($con,"UPDATE tblproperty SET PropertyTitle='$protitle',PropertDescription='$prodec',Type='$type',Status='$status',Bedrooms='$bedrooms',Bathrooms='$bathrooms',Size='$size',RentorsalePrice='$srprice',AirConditioner='$airconditioner',Internet='$internet',FitnessCenter='$gym',Kitchen='$modernkitchen',Balcony='$balcony',Elevator='$elevator',Pool='$pool',Laundry='$laundry',CarParking='$carparking',FireAlarm='$firealarm',PetFriendly='$petfriendly',Heating='$heating',Address='$proaddress',Country='$procountry',City='$procity',State='$prostate',ZipCode='$prozipcode',Neighborhood='$neighborhood' WHERE ID='$eid'");
   if ($query) {
    // echo '<script>alert("Property detail has been updated.")</script>';
    // echo "<script>window.location.href ='my-properties.php'</script>";
        header('Location: my-properties.php?updated-success=1');
  }
  else
    {
         $msg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Failed to update informations.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }

  
}


?>

 <!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
 
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
   
    <title>Real Estate Managment System|| Manage Property</title>
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
                <img src="assets/images/page-titles/Slider3.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Edit Property</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Edit Property</li>
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

                        <form class="mb-0" method="post" enctype="multipart/form-data">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                 <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"SELECT tblproperty.*,tblcountry.CountryName,tblcountry.ID as cid,tblstate.StateName,tblstate.id as sid from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>          
                <?php if($msg){
                    echo $msg;
                }  ?> 

                 <div class="form-box bg-white mb-50">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Informations</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                                        <div class="form-group">
                                            <label for="property-title">Property Title
                                            <span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" name="propertytitle" id="propertytitle" required='true' value="<?php  echo $row['PropertyTitle'];?>">
                                        </div>
                                    </div>
                                    
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="select-type">Proprty Type
                                            <span style="color: red;"> *</span></label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                            <select id="selecttype" name="selecttype" required="true" onchange="hideDiv(this.value)">
                                            <option value="<?php echo $row['Type'];?>"><?php  echo $row['Type'];?></option>
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
                                                    <option value="<?php  echo $row['Status'];?>"><?php  echo $row['Status'];?></option>
                                            <option>Sale</option>
                                            <option>Rent</option>
                                        </select>
                                            </div>
                                        </div>
                                    </div>                       
                                    <!-- .col-md-4 end -->
                                    

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" id="Bedrooms">
                                            <label for="Bedrooms">Bedrooms</label>
                                            <input type="text" class="form-control" name="bedrooms" id="bedrooms" required="true" value="<?php  echo $row['Bedrooms'];?>">
                                        </div>
                                    </div>
                                    



                                    
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group" id="Bathrooms">
                                            <label for="Bathrooms">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" id="bathrooms" required="true" value="<?php  echo $row['Bathrooms'];?>">
                                        </div>
                                    </div>                               
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Size">Size (m<sup>2</sup>)</label>
                                            <input type="text" class="form-control" name="size" id="size" required="true" value="<?php  echo $row['Size'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="Sale-Rent-Price">Price
                                            <span style="color: red;"> *</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon" style="border-right: 1px solid #eee; border: 1px solid #eee;">$</span>
                                                <input type="text" class="form-control" name="salerentprice" id="salerentprice" required="true" value="<?php  echo $row['RentorsalePrice'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-description">Description
                                            <span style="color: red;"> *</span></label>
                                            <textarea class="form-control" name="propertydescription" id="propertydescription" rows="2" required="true" style="background-color: #f8f8f8"><?php  echo $row['PropertDescription'];?></textarea>
                                        </div>
                                    </div>                                
                                    
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <div class="form-box bg-white" id="property-features">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Features</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Air Conditioner</span>
                                        <?php  
                                        if($row['AirConditioner']=="1"){ ?>
                                            <input type="checkbox" name="airconditioner" id="airconditioner" value="1" checked="true">
                                        <?php } 
                                        else { ?>
                                            <input type="checkbox" name="airconditioner" id="airconditioner" value="1">
                                        <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Internet / Wifi</span>
                                        <?php  if($row['Internet']=="1"){ ?>
                                        <input type="checkbox" name="internet" id="internet" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="internet" id="internet" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Gym / Fitness Center</span>
                                        <?php  if($row['FitnessCenter']=="1"){ ?>
                                        <input type="checkbox" name="gym" id="gym" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="gym" id="gym" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Modern Kitchen</span>
                                        <?php  if($row['Kitchen']=="1"){ ?>
                                        <input type="checkbox" name="modernkitchen" id="modernkitchen" value="1"checked='true'>
                                        <?php } else { ?>
                                            <input type="checkbox" name="modernkitchen" id="modernkitchen" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Balcony</span>
                                         <?php  if($row['Balcony']=="1"){ ?>
                                        <input type="checkbox" name="balcony" id="balcony" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="balcony" id="balcony" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Elevator</span>
                                        <?php  if($row['Elevator']=="1"){ ?>
                                        <input type="checkbox" name="elevator" id="elevator" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="elevator" id="elevator" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Swimming Pool</span>
                                        <?php  if($row['Pool']=="1"){ ?>
                                        <input type="checkbox" name="pool" id="pool" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="pool" id="pool" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Laundry</span>
                                         <?php  if($row['Laundry']=="1"){ ?>
                                        <input type="checkbox" name="laundry" id="laundry" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="laundry" id="laundry" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Car Parking</span>
                                        <?php  if($row['CarParking']=="1"){ ?>
                                        <input type="checkbox" name="carparking" id="carparking" value="1" checked="true">
                                         <?php } else { ?>
                                            <input type="checkbox" name="carparking" id="carparking" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Fire Alarm</span>
                                        <?php  if($row['FireAlarm']=="1"){ ?>
                                        <input type="checkbox" name="firealarm" id="firealarm" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Pet Friendly</span>
                                        <?php  if($row['PetFriendy']=="1"){ ?>
                                        <input type="checkbox" name="petfriendly" id="petfriendly" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="petfriendly" id="petfriendly" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Heating</span>
                                        <?php  if($row['Heating']=="1"){ ?>
                                        <input type="checkbox" name="heating" id="heating" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="heating" id="heating" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- .col-md-3 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

    <?php
        $image = $row['FeaturedImage'];
        $image1 = $row['GalleryImage1'];
        $image2 = $row['GalleryImage2'];
        $image3 = $row['GalleryImage3'];
        $image4 = $row['GalleryImage4'];
        $image5 = $row['GalleryImage5'];
                                    
    if(file_exists('propertyimages/'.$image))
            { $gimage = $image; } 
        else { $gimage = 'placeholder.png';}

    if(file_exists('propertyimages/'.$image1))
            { $gimage1 = $image1; } 
        else { $gimage1 = 'placeholder.png';}

    if(file_exists('propertyimages/'.$image2))
            { $gimage2 = $image2; } 
        else { $gimage2 = 'placeholder.png';}

    if(file_exists('propertyimages/'.$image3))
            { $gimage3 = $image3; } 
        else { $gimage3 = 'placeholder.png';}

    if(file_exists('propertyimages/'.$image4))
            { $gimage4 = $image4; } 
        else { $gimage4 = 'placeholder.png';}

    if(file_exists('propertyimages/'.$image5))
            { $gimage5 = $image5; } 
        else { $gimage5 = 'placeholder.png';}
    
    ?>

                            <div class="form-box bg-white mt-30">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Gallery</h4>
                                    </div>

                        <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerFeature()">
                                                <h4 id="uploadfile" style="opacity: 1;">
                                                    <i class="fa fa-cloud-upload"></i>Upload File</h4>
                                              </div>
                                              
                                        <img src="propertyimages/<?php echo $gimage;?>" value="propertyimages/<?php echo $gimage;?>" 
                                              onClick="triggerFeature()" class="profileDisplay" id="profileDisplay">
                                                                               
                                              <a href="javascript:void(0)" id="btn-reset" data-id="<?php echo $eid;?>" type="button">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="featuredimage" onChange="showFeature(this)" id="profileImage" class="form-control" style="display: none;">
                                             
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic1()">
                                                <h4 id="uploadfile1">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              
                                              <img src="propertyimages/<?php echo $gimage1;?>" value="propertyimages/<?php echo $gimage1;?>'" 
                                              onClick="triggerPic1()" class="profileDisplay" id="profileDisplay1">
                                              <a h href="javascript:void(0)" id="btn-reset1" type="button" data-id="<?php echo $eid;?>">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage1" onChange="showPic1(this)" id="profileImage1" class="form-control" style="display: none;">
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic2()">
                                                <h4 id="uploadfile2">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>

                                              <img src="propertyimages/<?php echo $gimage2;?>" value="propertyimages/<?php echo $gimage2;?>" 
                                              onClick="triggerPic2()" class="profileDisplay" id="profileDisplay2">
                                              <a href="javascript:void(0)" id="btn-reset2" type="button"  data-id="<?php echo $eid;?>">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage2" onChange="showPic2(this)" id="profileImage2" class="form-control"
                                            value="propertyimages/<?php echo $pic2;?>" style="display: none;">
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic3()">
                                                <h4 id="uploadfile3">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/<?php echo $gimage3;?>" value="propertyimages/<?php echo $gimage3;?>" 
                                              onClick="triggerPic3()" class="profileDisplay" id="profileDisplay3">
                                              <a href="javascript:void(0)" id="btn-reset3" data-id="<?php echo $eid;?>" type="button">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage3" onChange="showPic3(this)" id="profileImage3" class="form-control"
                                            value="<?php echo $row['GalleryImage3'];?>" 
                                            style="display: none;">
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >
                                            <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic4()">
                                                <h4 id="uploadfile4">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/<?php echo $gimage4;?>" value="propertyimages/<?php echo $gimage4;?>" 
                                              onClick="triggerPic4()" class="profileDisplay" id="profileDisplay4">
                                              <a href="javascript:void(0)" id="btn-reset4" data-id="<?php echo $eid;?>" type="button" >
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage4" onChange="showPic4(this)" id="profileImage4" class="form-control" value="<?php echo $row['GalleryImage4'];?>" 
                                            style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group text-center" >                                                                         <span class="img-div">
                                              <div class="text-center img-placeholder"  onClick="triggerPic5()">
                                                <h4 id="uploadfile5">
                                                    <i class="fa fa-cloud-upload"></i>Upload File
                                                </h4>
                                              </div>
                                              <img src="propertyimages/<?php echo $gimage5;?>" value="propertyimages/<?php echo $gimage5;?>" 
                                              onClick="triggerPic5()" class="profileDisplay" id="profileDisplay5">
                                              <a href="javascript:void(0)" id="btn-reset5" data-id="<?php echo $eid;?>" type="button">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                            </span>
                                            <input type="file" name="galleryimage5" onChange="showPic5(this)" id="profileImage5" class="form-control" value="<?php echo $row['GalleryImage5'];?>" style="display: none;">
                                        </div>
                                    </div>            



                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box bg-white mb-50">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Location</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address
                                            <span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" name="address" id="address" required="true" value="<?php  echo $row['Address'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">City / Province
                                            <span style="color: red;"> *</span></label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
     <select type="text" name="country" id="country" required="true" onChange="getsate(this.value)" class="form-control">
<option value="<?php  echo $row['cid'];?>"><?php  echo $row['CountryName'];?></option>
<?php $query=mysqli_query($con,"select * from tblcountry");
while($row1=mysqli_fetch_array($query))
{
              ?>      
<option value="<?php echo $row1['ID'];?>"><?php echo $row1['CountryName'];?></option>
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
<option value="<?php  echo $row['sid'];?>"><?php  echo $row['StateName'];?></option>
        
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
<option value="<?php  echo $row['City'];?>"><?php  echo $row['City'];?></option>
</select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                 
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip / Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" required="true" value="<?php  echo $row['ZipCode'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" id="neighborhood" required="true" value="<?php  echo $row['Neighborhood'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                             <?php } ?>
                            <!-- .form-box end -->
                            <input type="submit" value="Save Edits" name="submit" class="btn btn--primary">
                            <button class="btn btn-secondary" style="background-color: #ccc; margin-left: 10px; color: #f8f8f8"> Cancel</button>
                            <input type="submit" value="Save Edits" name="submit" class="btn btn--primary">
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
    <script src="assets/js/editphoto.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        $("select#selecttype option").each(function(){
            if($(this).val()=="Land" || $(this).val()=="Lands"){ 
                $('#Bedrooms').hide()
                $('#Bathrooms').hide()
                $('#property-features').hide()   
            }
            });
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