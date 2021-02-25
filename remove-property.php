<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['deleteData']))
  {

$eid=$_GET['editid'];
$did=$_POST['id'];



    $query=mysqli_query($con,"DELETE FROM tblproperty where ID='$did'");
   if ($query) {
    echo '<script>alert("Property detail has been updated.")</script>';
    echo "<script>window.location.href ='my-properties.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}




?>

 

 <?php } ?>