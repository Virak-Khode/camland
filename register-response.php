<?php
include('includes/dbconnection.php');


    $fname=$_POST['fullname'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $usertype=$_POST['usertype'];
    $password=md5($_POST['password']);

    // $ret=mysqli_query($con, "select Email from tbluser where Email='$email'");
    // $result=mysqli_fetch_array($ret);

    
    
        $query=mysqli_query($con, "insert into tbluser(FullName, Email, MobileNumber, Password,UserType) value('$fname', '$email','$mobno', '$password','$usertype' )");
    	if ($query) {
        	echo 1;
  		}
  		else
    	{
        	echo 0;
    	}


 
?>