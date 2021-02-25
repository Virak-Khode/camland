<?php

        session_start();
        include('includes/dbconnection.php');
        error_reporting(0);
        if (strlen($_SESSION['remsuid']==0|| $_SESSION['ut']==3)) {
          header('location:logout.php');
          }

        else{
            
            if(isset($_GET['success']) && $_GET['success'] == 1){
            $msg = '<div class="alert alert-success p-0 mr-15 ml-15 mb-30" role="alert" id="success-alert">
                    <i class="fas fa-check-circle mr-20 p-sm bg-green2 font-25"></i>
                    <strong>Congratulations ! </strong>Your property has been posted.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 20px;">
                    <span aria-hidden="true" class=""font-18>&times;</span>
                </button>
                </div>';

                }
            else if(isset($_GET['updated-success']) && $_GET['updated-success'] == 1){
            $msg = '<div class="alert alert-success p-0 mr-15 ml-15 mb-30" role="alert" id="success-alert">
                    <i class="fas fa-check-circle mr-20 p-sm bg-green2 font-25"></i>
                    <strong>Your property has been updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 20px;">
                    <span aria-hidden="true" class=""font-18>&times;</span>
                </button>
                </div>';

                }
?>




<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/css/additional-css.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    
    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/sweetalert2.css" rel="stylesheet">
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <style type="text/css">
        .property--img img{
             object-fit: cover;
             width: 100%;
             height: 250px;
        }
        
    </style>

    

    <title>Real Estate Management System || My Properties</title>
</head>

<body>
    <?php  header('Content-type: text/html; charset=UTF-8');   ?>

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
                                    <h1>my properties</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">my properties</li>
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


    <!-- #my properties
    ============================================= -->
        <section id="my-properties" class="my-properties properties-list">
            <div class="container">
                <div class="row">
                    <?php if($msg){
                        echo $msg;
                      }?>
                    <?php include_once('includes/sidebar.php');?>

                    <!-- .col-md-4 -->                    
                    <div class="col-xs-12 col-sm-8 col-md-8">

        <?php
            $uid=$_SESSION['remsuid'];
            $query=mysqli_query($con,"SELECT tblproperty.*,tblcountry.CountryName FROM tblproperty join tblcountry on tblcountry.ID=tblproperty.Country WHERE UserID='$uid' ORDER BY ListingDate DESC");
            mysqli_query($con, "SET NAMES utf8"); 
            $num=mysqli_num_rows($query);
            
            if($num>0){
            while($row=mysqli_fetch_array($query))
            { ?>

                <div class="col-xs-12 col-sm-12 col-md-12 pr-0">
                <div class="property-item">
                    <div class="property--img" style=" height: 250px; width: 100%;">
                        <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                        <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="property image" class="img-responsive" style="height: 250px;">
                        <span class="property--status"><?php echo $row['Status'];?></span>
    					</a>
                    </div>


                    <div class="property--content">
                        <div class="property--info" style="height: 180px !important;
max-height: 180px;">
                            <h5 class="property--title">
                                <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                                <?php echo $row['PropertyTitle'];?></a>
                            </h5>
                                
                            <p class="property--location" style="font-size: 14px;">
                                <i class="fa fa-map-marker"></i>                              <?php echo $row['City'];?> - 
                                <?php echo $row['CountryName'];?>
                            </p>
                            <p class="property--location" style="font-size: 14px;">
                                <i class="fa fa-check-circle-o"></i>
                                Type : <?php echo $row['Type'];?>&nbsp;|&nbsp;
                                For : <?php echo $row['Status'];?>                                    
                            </p>
                            <p class="property--price" style="padding-top: 12px;">
                               $<?php
                                $price = $row['RentorsalePrice'];
                                echo number_format($price)
                                ?>       
                            </p>
                        </div>
    <!-- .property-info end -->

                        <div class="property--features" style="padding: 20px">
                              
                            
                                  
                                  

                                    <div style="padding: 0px 50px;">
                                        <ul style="display: flex; justify-content: space-between;">
                                   <li><a href="edit-property.php?editid=<?php echo $row['ID'];?>" style="color:#5bc0de;"><i class="fa fa-edit"></i> Edit</a></li>

                                   <li>
                                    <a href="JavaScript:Void(0)" class="btn-delete" style="cursor: pointer; color: #d9534f;" data-id="<?php echo $row['ID'];?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                                   
                                    

                                        </ul>
                                    </div>
                                    
                        </div>
                        
    <!-- .property-features end -->

                        </div>

                    </div>
                </div>
    <!-- .property item end -->

    <!-- show message if nothing found -->
    <?php } } else { ?>

        <div class="alert alert-warning text-center" role="alert">
            No Property Added !
        </div>
    <?php } ?>               
                                         
                        <!-- .pagination end -->
                </div>

                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #my properties  end -->


    <!-- cta #1
    ============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-2.png" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Are you looking for an opportunity for start with us ?</h3>
                         <a href="contact.php" class="btn btn--primary">Contact</a>
                    </div>
                </div>
            </div>
        </section>




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

    <script type="text/javascript">
    $(document).ready(function(){

  // Delete 
  $('.btn-delete').click(function(){
    var el = this;
  
    // Delete id
    var deleteid = $(this).data('id');
    
    swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            icon: 'warning',
            showCancelButton: true,
            buttons: true,
            dangerMode: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result){
                $.ajax({
                    url: 'delete-my-property.php',
                    type: 'POST',
                    data: {id:deleteid},
                    
                    success:function(response){
                        swal("Success",{
                            icon: "success",
                        }).then((result) =>{
                            window.location="my-properties.php"
                             // Removing row from HTML Table
                            // if(response == 1){
                            // $(el).closest('tr').css('background','#eee');
                            // $(el).closest('tr').fadeOut(800,function(){
                            // $(this).remove();

                            // });

                            //         }
                                                        
                        });
                    }
                });                
            }
        })
 
  });
});


</script> 

    <!-- Footer Scripts
============================================= -->

    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/6d163e61fd.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#success-alert").fadeTo(5000, 200).slideUp(200, function(){
            $("#success-alert").slideUp(200);
            });
        });
    </script>
</body>

</html>
<?php } ?>
