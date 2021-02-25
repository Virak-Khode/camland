<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/additional-css.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet"> 
    <title>Real Estate Management System | Properties Grid</title>
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
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>
        <?php include_once('includes/hero-search.php');?>


        <!-- properties-grid
============================================= -->
<section id="properties-grid" style="padding-top: 25px !important;">
    <div class="container">
        <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3">

    <span class="text-black font-20">Filter Property</span>
    <!-- widget property type -->
    <div class="widget widget-property" style="margin-top: 26px; box-shadow: 1px 1px 6px rgba(0,0,0,0.03);">
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
                        
                        

<!-- widget property status-->
    <div class="widget widget-property" style="box-shadow: 1px 1px 6px rgba(0,0,0,0.03);">
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
                      


<!-- widget property city-->
    <div class="widget widget-property" style="box-shadow: 1px 1px 6px rgba(0,0,0,0.03);">
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
                    
                    <div class="col-xs-12 col-sm-12 col-md-9">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="properties-filter clearfix">
                                  
                                    <!-- .select-box -->
                                    <div class="view--type pull-right">
                                        <span class="text-black font-14">View by : </span>
                                        <a id="switch-list" href="#" class=""><i class="fa fa-th-list"></i></a>
                                        <a id="switch-grid" href="#" class="active"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties properties-grid">
                                <!-- .col-md-12 end -->

<?php
$city=$_POST['city'];
$type=$_POST['type'];
$status=$_POST['status'];
// $query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where(tblproperty.City='$city' AND tblproperty.Type='$type' OR tblproperty.Status='$status')");
$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where(tblproperty.Country='$city' AND tblproperty.Type='$type' AND tblproperty.Status='$status')");
$num=mysqli_num_rows($query);
if($num>0){
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
<?php }} 
else{ ?>
      
    <div class="col-xs-12 col-sm-12 col-md-12" style="width: 100%;">
        <div class="alert alert-danger alert-dismissible text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>No result found !</strong> 
  </div>
    </div>

           

<?php }?>                     

                              
                                <!-- .property item end -->
                            </div>
                     
                            <!-- .col-md-12 end -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-grid  end  -->

        <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Join our professional team & agents to start selling your house</h3>
                         <a href="contact.php" class="btn btn--primary">Contact</a>
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #cta1 end -->
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
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/map-addresses.js"></script>
    <script src="assets/js/map-custom.js"></script>
</body>



<script>
    jQuery(document).ready(function($){
     $("abbr.timeago").timeago()

    });


    function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
    </script>

</html>
