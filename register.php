<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/notify.css" rel="stylesheet">
    <link href="assets/css/notify.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/additional-css.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    


    
    <title>Real Estate Management System||Home Page</title>
    
</head>


<body class="bg-white">
    <?php 
    if(isset($_POST['signup']))
  {
    $fname=$_POST['fullname'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $usertype=$_POST['usertype'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result=mysqli_fetch_array($ret);

    if($result>0){
        echo "<script>alert('This email already associated with another account');</script>";
        
    }
    else{
        $query=mysqli_query($con, "insert into tbluser(FullName, Email, MobileNumber, Password,UserType) value('$fname', '$email','$mobno', '$password','$usertype' )");
    if ($query) {

       echo '<script>
       
       myFn();
      </script>';
  }
  else
    {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
            <div class="tab-pane" id="signup">
                                        <form class="mb-0" method="post" name="signup" id="signup">
                                            <div class="text-center">
                                                <h5>Register Account</h5>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 15px;position: absolute; top:75px;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                                            </div>
                                                            <!-- .form-group end -->
                                                           <div class="form-group">
                                                                <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" maxlength="10" required="true" placeholder="Mobile Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password">
                                                            </div>
                                                            <label>Account Type</label>
                                                             <div class="form-group text-center pb-3">
                                                               
                                                                <input type="radio" name="usertype" id="usertype" value="1" checked="true">&nbsp;Agency &nbsp; &nbsp;<input type="radio" name="usertype" id="usertype" value="2" >&nbsp;Owner &nbsp; &nbsp; 
                                                                <input type="radio" name="usertype" id="usertype" value="3">&nbsp;User
                                                            </div>
                                                            
                                                            <input type="submit" class="btn btn--primary btn--block" name="signup" value="Register">
                                                        </form>
                                                    </div>
        </div>
    </div>
    </div>

    




  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0dcaf9590c.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/notify.js"></script>
    <script src="assets/js/notify.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous"></script>
    <script src="assets/js/functions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha512-8vfyGnaOX2EeMypNMptU+MwwK206Jk1I/tMQV4NkhOz+W8glENoMhGyU6n/6VgQUhQcJH8NqQgHhMtZjJJBv3A==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.js" integrity="sha512-aVnPFUGTiptfhBMaq2MLZfzSbt0LZbP6Eb1yXpSHQ1YIgJaVvWvtKi0uQGggaeQH+irK/7xc1r44dDrpzt6BCw==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 
  

<script type="text/javascript">

function myFn(){
        swal(
                'Success',
                'You clicked the <b style="color:green;">Success</b> button!',
                'success'
            )
}
</script>

    
</body>

</html>
