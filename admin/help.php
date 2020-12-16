<?php
    
    require '../include.php';
    

    session_start();
    $username="";
    $contact="";
    $emergency="";
    $address="";
    $lat=0;
    $long=0;
    
    
    
    if(isset($_SESSION['user'])){
        $email = $_SESSION['user'];
        $query="select * from userInfo inner join DonationInfo on userInfo.email = donationInfo.email where userinfo.email = '$email'";
        $result = mysql_query($query);
        
        if($result){
            
            if($row=mysql_fetch_assoc($result)){
                $username=$row['fname']." ".$row['lname'];
                $address =  $row['address'];
                $lat = $row['lat'];
                $long = $row['lng'];
            }
            
        }
        
    }
    else{
        echo('<script>window.location = "../website/login.php"</script>;');
    }

?>





<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Search Donors | BloodFind</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="css/icons.css" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="css/main.css" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="css/custom.css" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="icon" href="img/ico/favicon.ico" type="image/png">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body>
        <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- .page-navbar -->
        <div id="header" class="page-navbar">
            <!-- .navbar-brand -->
            <a href="user.php" class="navbar-brand hidden-xs hidden-sm">
                <img src="img/logo.png" class="logo hidden-xs" alt="Dynamic logo">
                <img src="img/logosm.png" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo">
                 
            </a>
            <!-- / navbar-brand -->
            <!-- .no-collapse -->
            <div id="navbar-no-collapse" class="navbar-no-collapse">
                <!-- top left nav -->
                <ul class="nav navbar-nav">
                    <li class="toggle-sidebar" id="menubut">
                        <a href="#">
                            <i class="fa fa-reorder"></i>
                            <span class="sr-only">Collapse sidebar</span>
                        </a>
                    </li>
                    
                </ul>
                <!-- / top left nav -->
                <!-- top right nav -->
                <ul class="nav navbar-nav navbar-right">
                    
                    <li id="otherbut">
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            <span class="sr-only">Settings</span>
                        </a>
                        
                    </li>
                    <li id="otherbut">
                        <a href="logout.php">
                            <i class="fa fa-power-off" ></i>
                            <span class="sr-only">Logout</span>
                        </a>
                    </li>
                   
                </ul>
                <!-- / top right nav -->
            </div>
            <!-- / collapse -->
        </div>
        <!-- / page-navbar -->
        <!-- #wrapper -->
        <div id="wrapper">
            <!-- .page-sidebar -->
            <aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Account</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <div class="user-info clearfix">
                            <img src="img/avatars/128.jpg" alt="avatar">
                            <span class="name"><?php echo $username; ?></span>
                            
                        </div>
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Navigation</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <!-- .side-nav -->
                        <div class="side-nav">
                            <ul class="nav">
                                <li><a href="user.php" ><i class="l-basic-laptop"></i><span class="txt">Dashboard</span></a>
                                </li>
                               
                                
                                <li>
                                    <a href="help.php" class="active"><i class="fa fa-search"></i><span class="txt">Search Donor</span></a>
                                   
                                </li>
                               
                                
                                
                               
                            </ul>
                        </div>
                        <!-- / side-nav -->
                        <!--  .sidebar-panel -->
                        
                        
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- / page-sidebar -->
           
            
            
            
            
            
            
            <!-- .page-content -->
            <div class="page-content sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            
                            <div class="page-header">
                                <h2>Search</h2>
                                <span class="txt">Find Donors nearby</span>
                            </div>
                            
                            
                            
                            <form method="post" action="help.php"> 
                             <div class="form-group">
                                 <br><br>
                                 <div class="col-md-2"></div> 
                                                        <div class="col-md-6">
                                                             <select class="form-control select2" id="SearchGroup" required>
                                                                
                                                                 <option >ALL</option>   
                                                                 <option >O+</option>
                                                                    <option >O-</option>
                                                                <option >A+</option>
                                                                    <option >A-</option>
                                                                <option >B+</option>
                                                                    <option >B-</option>
                                                                <option >AB+</option>
                                                                    <option >AB-</option>
                                                                    
                                                                    
                                                                
                                                                
                                                            </select>
                                                        </div>
                                 
                                                        <button type="submit" class="btn btn-default col-md-2" id="subcbtn" name="filter">Filter</button>
                                 
                            </div>
                                
                                </form>
                            
                        </div>
                        
                        
                        
                        
                        
                        <div class="row" style="margin-top: -20px">
                            
                            
                            
                            
                            
                            
                            <div id="map" class='col-md-12'></div>
                        </div>
                        <!-- / .row -->
                        
                        
                        
                        
                        </div>
                    </div>
                    <!-- / .page-content-inner -->
                </div>
                <!-- / page-content-wrapper -->
            </div>
            <!-- / page-content -->
        </div>
        <!-- / #wrapper -->
        <div id="footer" class="clearfix sidebar-page">
            <!-- Start #footer  -->
            <p class="pull-left">
                Copyrights &copy; 2018 <a href="../website/index.php" class="color-red strong" target="_blank">The BloodFind</a>. All rights reserved.
            </p>
            <p class="pull-right">
                
                Designed by 
                <a href="https://www.facebook.com/bitstobytes1/" class="ml5 mr25 color-red strong">BITS se BYTES</a>
            </p>
        </div>
        <!-- End #footer  -->
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>
        <!-- Javascripts -->
        <!-- Load pace first -->
        <script src="plugins/core/pace/pace.min.js"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="js/bootstrap/bootstrap.js"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="js/libs/modernizr.custom.js"></script>
        <!-- Handle responsive view functions -->
        <script src="js/jRespond.min.js"></script>
        <!-- Custom scroll for sidebars,tables and etc. -->
        <script src="plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
        <!-- Remove click delay in touch -->
        <script src="plugins/core/fastclick/fastclick.js"></script>
        <!-- Increase jquery animation speed -->
        <script src="plugins/core/velocity/jquery.velocity.min.js"></script>
        <!-- Quick search plugin (fast search for many widgets) -->
        <script src="plugins/core/quicksearch/jquery.quicksearch.js"></script>
        <!-- Bootbox fast bootstrap modals -->
        <script src="plugins/ui/bootbox/bootbox.js"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="js/libs/date.js"></script>
        <script src="plugins/charts/flot/jquery.flot.custom.js"></script>
        <script src="plugins/charts/flot/jquery.flot.pie.js"></script>
        <script src="plugins/charts/flot/jquery.flot.resize.js"></script>
        <script src="plugins/charts/flot/jquery.flot.time.js"></script>
        <script src="plugins/charts/flot/jquery.flot.growraf.js"></script>
        <script src="plugins/charts/flot/jquery.flot.categories.js"></script>
        <script src="plugins/charts/flot/jquery.flot.stack.js"></script>
        <script src="plugins/charts/flot/jquery.flot.orderBars.js"></script>
        <script src="plugins/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="plugins/charts/flot/jquery.flot.curvedLines.js"></script>
        <script src="plugins/charts/sparklines/jquery.sparkline.js"></script>
        <script src="plugins/charts/progressbars/progressbar.js"></script>
        <script src="plugins/ui/waypoint/waypoints.js"></script>
        <script src="plugins/ui/weather/skyicons.js"></script>
        <script src="plugins/ui/notify/jquery.gritter.js"></script>
        <script src="plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="plugins/misc/countTo/jquery.countTo.js"></script>
        <script src="js/jquery.dynamic.js"></script>
        <script src="js/main.js"></script>
        <script src="plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
         <script src="plugins/forms/fancyselect/fancySelect.js"></script>
        <script src="plugins/forms/select2/select2.js"></script>
        <script src="plugins/forms/maskedinput/jquery.maskedinput.js"></script>
        <script src="plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js"></script>
        <script src="plugins/forms/spinner/jquery.bootstrap-touchspin.js"></script>
        <script src="plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="plugins/forms/bootstrap-timepicker/bootstrap-timepicker.js"></script>
        <script src="plugins/forms/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>
        <script src="plugins/forms/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
       <script src="plugins/charts/chartjs/Chart.js"></script>
<!--    -->
   
  
        <script src="js/pages/user.js"></script>
    
    
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU6g2ceeEQx_ZCln51nnRb6eJUEEh05js&callback=initMap">
</script>
    
    
    
    
    
    
    
    
    
    
    <script>


// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.

function initMap() {
  var user = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: user
  });
  
   

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">User Info</h1>'+
      '<div id="bodyContent">'+
      '<p><b><?php echo $username; ?></b><br/><?php echo $address;?>' +
      
      '</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: user,
    map: map,
    title: 'User Information'
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
  
  
  
  
  
  
  
  
    
    
    
    
    
    
    
     <?php
        if(isset($_POST['filter'])){
    
        }
        else{
            
            $username1="";
            $contact1="";
            $emergency1="";
            $address1="";
            $lat1=0;
            $long1=0;



            
                    $ema=$_SESSION['user'];
                    $query10="select * from userInfo inner join DonationInfo on userInfo.email = donationInfo.email where userinfo.email != '$ema';";
                    $result10 = mysql_query($query10);

                    if($result10){
                        $count=0;
                        while($row=mysql_fetch_assoc($result10)){
                            $username1=$row['fname']." ".$row['lname'];
                            $address1 =  $row['address'];
                            $lat1 = $row['lat'];
                            $long1 = $row['lng'];
                            $contact1 = $row['contact'];
                            $emergency1 = $row['emContact'];
                            
                            
                            
                            
                            
                            
                            
                        }

                    }
            
        }
            

                
    ?>
  
  
  
  
  
  
  
  
  
  
}


</script>
    
    
    
    
    
    
    
    
   
        
    </body>
</html>