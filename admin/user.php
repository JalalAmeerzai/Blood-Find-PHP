<?php
     require '../include.php';
    

    session_start();
    $username="";
    $status="";
    $frequency=0;
    $daysleft=0;
    
    if(isset($_SESSION['user'])){
        
        //echo("<script>window.location = '../website/login.php''</script>;");
        
        $email = $_SESSION['user'];
        $query="select * from userInfo inner join DonationInfo on userInfo.email = donationInfo.email where userinfo.email = '$email'";
			$result = mysql_query($query);
            
            if($result){
                //$_SESSION["USERNAME"] = $_POST["LogEmail"];
                
                if($row=mysql_fetch_assoc($result)){
                    $username = $row['fname']." ".$row['lname'];
                    $status= $row['AcStatus'];
                    $frequency = 7 * $row['frequency'];
                    
                    
                }
                
            }
        
        
        
    }
    else{
        echo('<script>window.location = "../website/login.php"</script>;');
        //echo ("<script>alert('sssss');</script>");
    }


    if($status == 'No')
        $daysleft = 0;
    else
        $daysleft = $frequency-7;



?>



<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Dashboard | BloodFind</title>
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
                            <span class="name"><?php echo $username;?></span>
                            
                        </div>
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Navigation</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <!-- .side-nav -->
                        <div class="side-nav">
                            <ul class="nav">
                                <li><a href="user.php" class="active"><i class="l-basic-laptop"></i><span class="txt">Dashboard</span></a>
                                </li>
                               
                                
                                <li>
                                    <a href="help.php"><i class="fa fa-search"></i><span class="txt">Search Donor</span></a>
                                   
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
                                <h2>Dashboard</h2>
                                <span class="txt">Welcome to The BloodFind</span>
                            </div>
                            
                        </div>
                        
                        
                        
                        
                        
                        
                        <!-- / .row -->
                        <div class="row" style="display: none">
                            <!-- Start .row -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- col-lg-8 start here -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 p0">
                                    <!-- col-lg-9 start here -->
                                    <div class="panel panel-default plain btrr0 bbrr0" data-mh="payments">
                                        <!-- Start .panel -->
                                        <div class="panel-heading">
                                            <h4 class="panel-title" style="text-align:center; font-size: 25px;"><i class="fa fa-dollar"></i> Sales and Profits</h4>
                                             <form>
                                                 
                                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="supselectdiv1">
                                                    <select class="form-control select1"  id="barchartselect">
                                                        <option value="">Profit</option>
                                                        <option value="" selected>Sales</option>

                                                    </select>
                                                </div>
                                                 
                                            </form>
                                            <br><br><br>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mapbuttonsbody">
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mapbutton" id="weekly">Weekly</div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mapbutton mapbuttonactive" id="monthly">Monthly</div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mapbutton" id="yearly">Yearly</div>
                                        
                                            </div>
                                            
                                            
                                        </div>
                                         
                                   
                                        
                                       
                                        
                                        
                                        <div class="panel-body">
                                                <div class="canvas-holder">
                                                    <canvas id="bar-chartjs-Monthly-Sales" height="100"></canvas>
                                                    <canvas id="bar-chartjs-Weekly-Sales" height="100" style="display:none;"></canvas>
                                                    <canvas id="bar-chartjs-Yearly-Sales" height="100" style="display:none"></canvas>
                                                    <canvas id="bar-chartjs-Monthly-Profit" height="100"></canvas>
                                                    <canvas id="bar-chartjs-Weekly-Profit" height="100" style="display:none;"></canvas>
                                                    <canvas id="bar-chartjs-Yearly-Profit" height="100" style="display:none"></canvas>
                                                    
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <!-- End .panel -->
                                </div>
                               
                            </div>
                            <!-- col-lg-8 end here -->
                            
                            
                            
                            
                            
                            
                           
                            <!-- col-lg-4 end here -->
                        </div>
                        <!-- End .row -->
                       
                        
                        
                        
                        <div class="row">
                            <!-- Start .row -->
                            <div class=" col-lg-12 col-md-12">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" style=" background-color:rgba(211,47,47,.8);">
                                            <h4 class="panel-title" style="text-align: center; font-size:25px; color:white"><i class="l-ecommerce-megaphone" style="font-size:25px; color:white"></i>User Info</h4>

                                    </div>
                                    
                                    <div class="panel-body">
                                        
                                <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default plain" style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px;"><?php echo $username;?></h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="fa fa-user" style="color:rgb(211,47,47);"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;"><i class="fa fa-check-square-o"></i> Active Donor :<span style="color:rgb(211,47,47);"> <?php echo $status;?></span></h3>
                                                <br>
                                                <a href="settings.php" id="subcbtn" class="btn btn-default">Settings</a>

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                    </div>
                                        
                                    
                                        
                                <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default plain" style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px;">Current</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="fa fa-tint" style="color:rgb(211,47,47);"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;"><i class="fa fa-calendar"></i> Last Donation :<span style="color:rgb(211,47,47);"> 25-02-18</span></h3>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;"><i class="fa fa-calendar-check-o"></i> Available :<span style="color:rgb(211,47,47);"> 25-04-18</span></h3>

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                    </div>
                            
                            
                            
                            
                            
                                 <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <!-- col-lg-4 start here -->

                                    <div class="panel panel-default plain" style="border:0;">

                                        <!-- Start .panel -->
                                        <div class="panel-heading" >
                                            <h4 class="panel-title" style="text-align: center; font-size:25px;">Remaining Days</h4>

                                        </div>
                                        <div class="panel-body">
                                            
                                            <div class="text-center">
                                                <div id="customer-exp" class="custom-progressbar blue" style="width:180px;height:180px;">
                                                    <div class="percent"><?php echo $daysleft;?>
                                                    </div>
                                                    <div class="description">out of <?php echo $frequency;?></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- End .panel -->
                                </div>
                                        
                                        
                                        
                                        
                                        <br><br><br><br>
                                        
                                        
                                        <div class="col-lg-12">
                                <!-- col-lg-6 start here -->
                               
                                
                                        
                                        
                                        
                                      
                                        
                                        
                                <div class=" col-lg-2"></div>
                                  <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default " style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px;">No. of Donations</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="fa fa-heart" style="color:rgb(211,47,47);"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                    <i class="l-basic-elaboration-calendar-star"></i> Current Year
                                                    <br>
                                                    <div class="stats-number" data-from="0" data-to="3" style="color:rgb(211,47,47); font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                                 <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                    <i class="l-basic-elaboration-calendar-previous"></i> Overall
                                                    <br>
                                                    <div class="stats-number" data-from="0" data-to="44" style="color:rgb(211,47,47); font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                               

                                            </div>
                                            <br>
                                        </div>
                                    
                                      
                                </div>
                                 
                                 
                                 <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default " style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px;">Help Received</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="fa fa-hospital-o" style="color:rgb(211,47,47);"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                    <i class="l-basic-elaboration-calendar-star"></i> Current Year
                                                    <br>
                                                    <div class="stats-number" data-from="0" data-to="4" style="color:rgb(211,47,47); font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                                 <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                    <i class="l-basic-elaboration-calendar-previous"></i> Overall
                                                    <br>
                                                    <div class="stats-number" data-from="0" data-to="24" style="color:rgb(211,47,47); font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                               

                                            </div>
                                            <br>
                                        </div>
                                    
                                      
                                </div>
                            </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                   
                               
                                </div>
                            </div>
                            
                            
                            
                            
                        
                        </div>
                        <!-- End .row -->
                        
                        
                        
                        
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
    
   
        
    </body>
</html>