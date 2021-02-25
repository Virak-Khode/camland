<?php
include('includes/dbconnection.php');

if(isset($_POST['id'])){
   $id=  $_POST['id'];

   $sql = "UPDATE tblproperty Set FeaturedImage='no file' WHERE ID=".$id;
   mysqli_query($con,$sql);
   exit;
	}

if(isset($_POST['id1'])){
   $id=  $_POST['id1'];

   $sql1 = "UPDATE tblproperty Set GalleryImage1='no file' WHERE ID=".$id;
   mysqli_query($con,$sql1);
   exit;
	}

if(isset($_POST['id2'])){
   $id=  $_POST['id2'];

   $sql2 = "UPDATE tblproperty Set GalleryImage2='no file' WHERE ID=".$id;
   mysqli_query($con,$sql2);
   exit;
	}

if(isset($_POST['id3'])){
   $id=  $_POST['id3'];
   
   $sql3 = "UPDATE tblproperty Set GalleryImage3='no file' WHERE ID=".$id;
   mysqli_query($con,$sql3);
   exit;
	}

if(isset($_POST['id4'])){
   $id=  $_POST['id4'];
   
   $sql4 = "UPDATE tblproperty Set GalleryImage4='no file' WHERE ID=".$id;
   mysqli_query($con,$sql4);
   exit;
	}

if(isset($_POST['id5'])){
   $id=  $_POST['id5'];
   
   $sql5 = "UPDATE tblproperty Set GalleryImage5='no file' WHERE ID=".$id;
   mysqli_query($con,$sql5);
   exit;
	}

	echo 0;
	exit;
 
?>
