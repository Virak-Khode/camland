<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <title>Camland Real Estate | Properties</title>
    <style type="text/css">
        .property--img{
            width: 100%;
            height: 190px;
        }
        .property--img img{
             object-fit: cover;
             width: 100%;
             height: 190px;
        }
        .description{
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            height: 64px;
            margin-top: 10px;
            margin-bottom: 10px;

}
    </style>

</head>

<body>
   
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>
        <?php include_once('includes/hero-search.php');?>
        
        <section id="properties-grid" style="padding-top: 25px !important;">
            <div class="container">
                <div class="row">

            <!-- property filter widget -->
            <div class="col-xs-12 col-sm-12 col-md-3">
                <span class="text-black font-20">Filter Property</span>

                        <div class="widget widget-property" style="margin-top: 26px;box-shadow: 1px 1px 8px rgba(0,0,0,0.05);">
                           
                            <div class="widget--title">
                                <h5 class="text-black">By Type</h5>
                            </div>

                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
                        $query3=mysqli_query($con,"select distinct Type from  tblproperty");
                        while($row3=mysqli_fetch_array($query3))
                                    {
                                    ?>
                                    <li>
                                        <a href="protypewise-property-detail.php?protypeid=<?php echo $row3['Type'];?>"><?php echo $row3['Type'];?></a>
                                    </li>
                                    <?php } ?>
                                   
                                </ul>
                            </div>
                        </div>
                        

                        <div class="widget widget-property" style="box-shadow: 1px 1px 8px rgba(0,0,0,0.05);">
                            <div class="widget--title">
                                <h5 class="text-black">By Status</h5>
                            </div>
                            <div class="widget--content">
                                <?php
                        $query4=mysqli_query($con,"select distinct Status from  tblproperty");
                        while($row4=mysqli_fetch_array($query4))
                        {
                        ?>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                       <a href="statuswise-property-detail.php?stproid=<?php echo $row4['Status'];?>"><?php echo $row4['Status'];?></a>
                                    </li>
                                    <?php } ?>
                                    
                                </ul>
                            </div>
                        </div>
                     
                        <div class="widget widget-property" style="box-shadow: 1px 1px 8px rgba(0,0,0,0.05);">
                            <div class="widget--title">
                                <h5 class="text-black">By Locations</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty");
while($row5=mysqli_fetch_array($query5))
{
?>
                                    <li>
                                       <a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>"><?php echo $row5['City'];?></a>
                                    </li>
                                    
                                    <?php } ?>
                                   
                                </ul>
                            </div>
                        </div>
                      
        </div>

        <!-- property card view -->
        <div class="col-xs-12 col-sm-12 col-md-9">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="properties-filter clearfix">
                                  
                                    <div class="view--type pull-right">
                                        <span class="text-black font-14">View by : </span>
                                        <a id="switch-list" href="#" class=""><i class="fa fa-th-list"></i></a>
                                        <a id="switch-grid" href="#" class="active"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
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
        $no_of_records_per_page = 15;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


        $query=mysqli_query($con,"SELECT tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State order by ListingDate DESC LIMIT $offset, $no_of_records_per_page");
        while($row=mysqli_fetch_array($query))
        {
        ?>

        <div class="col-xs-12 col-sm-6 col-md-4" style="padding-right: 10px; padding-left: 10px;">                           
            <div class="property-item" width="100%">
                <div class="property--img">
                    <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>">
                    </a>

                    <span class="property--status"><?php echo $row['Status'];?></span>
                </div>
                <div class="property--content">
                <div class="property--info">
                    <h5 class="property--title">
                    <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
                    <?php echo $row['PropertyTitle'];?></a></h5>

                    <span class="property--description" id="description" style="display: none;
                    "><?php echo $row['PropertDescription'];?></span>
                    <p class="property--location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>

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
                        echo number_format($price)?>
                    </p>
                </div>
                                                                              
            </div>
        </div>
    </div>
                    <?php } ?>

</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center mt-50">
    <ul class="pagination" >
        <li class="active"><a style="border-radius: 50%; cursor: pointer;" href="?pageno=1">
            <i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><</a>
            </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> ba-gray">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">></a>
            </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
    </ul>
</div>
                         
                </div>
            </div> 
        </div>
    </div>
</section>
       



<section>
            
    <div class="feature" style="margin-top: -130px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                            
                    <div class="feature-item">    
                        <i class="fa fa-user-shield"></i>
                            <h4>Create an Account</h4>
                            <p class="text-grey">Register for account to login with this website and manage your dashboard. Make sure to choose your account type.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-item">
                        <i class="fas fa-cloud-upload-alt text-primary"></i>
                            <h4>Add Property</h4>
                            <p>After you've created an account then you can start selling your own property to our visitor and you can manage your dashboard from here.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                            <h4>Done</h4>
                            <p>Get the thing done with easy step to go with us. We are so happy to help you grow your income. Stay better Stay easy.</p>
                    </div>
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
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;  key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/map-addresses.js"></script>
    <script src="assets/js/map-custom.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#switch-list').on("click", function(event) {
                $('span#description').css('display','block');
                $('span#description').addClass('description');
            });

            $('#switch-grid').on("click", function(event) {
                $('span#description').css('display','none');
                $('span#description').removeClass('description');
            });
    });
    </script>
</body>

</html>
