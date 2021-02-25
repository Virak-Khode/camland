<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['remsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$uid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$uid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
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
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Real Estate Management System|| Change Password</title>
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
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
                <img src="assets/images/page-titles/Slider2.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Change Password</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Change Password</li>
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

        <!-- #user-profile
============================================= -->
        <section id="user-profile" class="user-profile">
            <div class="container">
                <div class="row">
                   <?php include_once('includes/sidebar.php');?>
                    <!-- .col-md-4 -->
                    <div class="col-xs-12 col-sm-12 col-md-8">

                        <form class="mb-0" method="post" name="changepassword" onsubmit="return checkpass();">
                            
                            
                            <div class="form-box bg-shadow">
                                <?php
$uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                <div class="form-box">
                                <h4 class="form--title"><i class="fa fa-pencil-square-o color-main" aria-hidden="true"></i>&nbsp;Change Password</h4>
                                <div class="form-group">
                                    <label for="password">Current Password</label>
                                    <input type="password" name="currentpassword" id="currentpassword" class="form-control" value="" required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="newpassword" id="newpassword" class="form-control" value="" required='true'>
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" value="" required='true'>
                                </div>
                                <!-- .form-group end -->
                            </div>
                            </div>
                            <?php }?>
                            
                            <input type="submit" value="Save Edits" name="submit" class="btn btn--primary">
                            <button class="btn btn-secondary" style="background-color: #ccc; margin-left: 10px; color: #f8f8f8"> Cancel</button>
                        </form>
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
        <!-- #user-profile  end -->


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
<?php }  ?>