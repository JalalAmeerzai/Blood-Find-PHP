<?php
     require '../include.php';
    

    session_start();
    $username="";
    $email="";
    $fname="";
    $lname="";
    $number="";
    $address="";
    $blood="";
    $status="";
    $emergency="";
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
                    $email = $row['email'];
                    $fname=$row['fname'];
                    $lname=$row['lname'];
                    $number = $row['contact'];
                    $address = $row['address'];
                    $blood = $row['blood'];
                    $emergency = $row['emContact'];
                    $status= $row['AcStatus'];
                    $frequency = $row['frequency'];
                    
                    
                }
                
            }
        
        
        
    }
    else{
        echo('<script>window.location = "../website/login.php"</script>;');
        //echo ("<script>alert('sssss');</script>");
    }

    $select = "<option selected>YES</option> <option >NO</option>";
    if($status == 'No')
        $select = "<option>YES</option> <option selected>NO</option>";
    else if($status == 'Yes'){
        $select = "<option selected>YES</option> <option >NO</option>";
    }





    if(isset($_POST['infoupdate'])){
        $fname1=$_POST['settingfname'];
        $lname1 = $_POST['settinglname'];
        $contact1 = $_POST['settingcontact'];
        $address1 = $_POST['settingaddress'];
        
        $email = $_SESSION['user'];
        $query1="UPDATE userinfo set fname='$fname1',lname='$lname1',contact='$contact1',address='$address1' where email = '$email'";
			$result1 = mysql_query($query1);
        
        if($result1){
            echo("<script>alert('record updated');</script>");
            echo("<script>window.location = 'settings.php'</script>;");
        }
        else{
            echo("<script>alert('something went wrong');</script>");
        }
        
    }



    if(isset($_POST['deleteaccount'])){
        
        $email = $_SESSION['user'];
        $query2="DELETE from DonationInfo where email = '$email'";
			$result2 = mysql_query($query2);
            if($result2){
                $query3="DELETE from userinfo where email = '$email'";
			    $result3 = mysql_query($query3);
                if($result3){
                    $query4="DELETE from users where email = '$email'";
			        $result4 = mysql_query($query4);
                    if($result4){
                        echo("<script>alert('account deleted');</script>");
                        unset($_SESSION['user']);
                        session_destroy();
                        echo("<script>window.location = '../website/index.php'</script>;");
                    }
                    else{
                        echo("<script>alert('something went wrong!');</script>");
                    }
                }
                else{
                    echo("<script>alert('something went wrong!!');</script>");
                }
            }
            else{
                echo("<script>alert('something went wrong!!!');</script>");
            }
        
    }






    if(isset($_POST['passwordupdate'])){
        
        $email = $_SESSION['user'];
        $current = $_POST['changepass1'];
        $new=$_POST['changepass2'];
        $query="select * from users where email = '$email' and password='$current'";
			$result = mysql_query($query);
            
            if($result){
                //$_SESSION["USERNAME"] = $_POST["LogEmail"];
                
                if($row=mysql_fetch_assoc($result)){
                    
                    $query2="Update users set password = '$new' where email = '$email'";
			         $result2 = mysql_query($query2);
                    if($result2){
                        echo("<script>alert('Password Changed.');</script>");
                    }
                    else{
                        echo("<script>alert('Something Went Wrong!');</script>");
                    }
                }
                else{
                    echo("<script>alert('Current Password is Wrong');</script>");
                }
                
        
          }
            else{
                echo("<script>alert('Something Went Wrong!!');</script>");
            }
        
    }
    



    if(isset($_POST['bloodupdate'])){
        
        $frequency=$_POST['donationfrequency'];
        $emergency = $_POST['donationemergency'];
        $status1 = $_POST['donationstatus'];
        
        
        $email = $_SESSION['user'];
        $query1="UPDATE donationinfo set frequency='$frequency',emContact='$emergency',AcStatus='$status1' where email = '$email'";
			$result1 = mysql_query($query1);
        
        if($result1){
            echo("<script>alert('record updated');</script>");
            echo("<script>window.location = 'settings.php'</script>;");
        }
        else{
            echo("<script>alert('something went wrong');</script>");
        }
        
    }




?>










<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Settings | BloodFind</title>
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
        
        
        
        <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
            
          }

        }

        
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());

             





          });
        }
      }

      var add="";

      function checkkero(){
        alert(document.getElementById("autocomplete").value);

        add = document.getElementById("autocomplete").value;



        var geocoder = new google.maps.Geocoder();


        geocoder.geocode( { 'address': add}, function(results, status) {

        if (status == google.maps.GeocoderStatus.OK) {
          var latitude = results[0].geometry.location.lat();
          var longitude = results[0].geometry.location.lng();
          alert(latitude+" "+ longitude);
        } 
      });




      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU6g2ceeEQx_ZCln51nnRb6eJUEEh05js&libraries=places&callback=initAutocomplete"
        async defer></script>
        
        
        
        
        
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
            <div class="page-content sidebar-page right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- Start .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            <div class="page-header">
                                <h2>Settings</h2>
                                <span class="txt">Complete your account settings for a better experience.</span>
                            </div>
                            
                        </div>
                        <!-- Start .row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 sortable-layout">
                                <!-- col-lg-6 start here -->
                                
                                <div class="tabs mb20">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li>
                                            <a href="#tab1" data-toggle="tab" style="color: rgb(211,47,47)"><i class="fa fa-cogs"> </i> General</a>
                                        </li>
                                        
                                        
                                        
                                        
                                    </ul>
                                    <div id="myTabContent2" class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1">
                                           
                                    <!-- Start .panel -->
                                    
                                    
                                                <div class="bs-callout bs-callout-info mt0" style="border-left-color: rgb(211,47,47); background-color: rgba(211,47,47,.1)">
                                                    <p> <i class="fa fa-user" style="font-size:20px;">  </i> Account Details</p>
                                                </div>
                                                <form class="form-horizontal group-border stripped" role="form" method="post" action="settings.php">
                                                    <div class="form-group">
                                                        <label for="inputEmail4" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="settingemail" placeholder="Email" readonly value="<?php echo $email; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputFirstName" class="col-sm-2 control-label">First Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="settingfname" placeholder="First Name" value="<?php  echo $fname; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="settinglname" placeholder="Last Name" value="<?php  echo $lname; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-md-3 control-label" for="">Contact Number</label>
                                                        <div class="col-lg-10 col-md-9">
                                                            <input type="text" class="form-control" name="settingcontact" placeholder="Contact Number" value="<?php  echo $number; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-md-3 control-label" for="">Address</label>
                                                        <div class="col-lg-10 col-md-9">
                                                            <input type="text" class="form-control" id="autocomplete" name="settingaddress" placeholder="Address" onFocus="geolocate()" value="<?php  echo $address; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                     <div class="form-group">
                                                        <label for="ebayConnection" class="col-sm-2 control-label">BloodFind Account</label>
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-default" name="deleteaccount" id="DeleteAccount">Delete Your Account</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                         <div class="col-sm-offset-4 col-sm-4">
                                                            <button type="submit" class="btn btn-default" id="subcbtn" style="width:100%" name="infoupdate">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            
                                            
                                            
                                            
                                            
                                            <div class="bs-callout bs-callout-info mt0" style="border-left-color: rgb(211,47,47); background-color: rgba(211,47,47,.1)">
                                                    <p> <i class="fa  fa-key" style="font-size:20px;">  </i> Change Password</p>
                                            </div>
                                                <form class="form-horizontal group-border stripped" role="form" method="post" action="settings.php">
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label">Current Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" id="ChangePass1" name="changepass1" placeholder="Current Password" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputnpass" class="col-sm-2 control-label">New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" id="changePass2" name="changepass2" placeholder="New Password" required>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                         <div class="col-sm-offset-4 col-sm-4">
                                                            <button type="submit" class="btn btn-default" id="subcbtn" style="width:100%" name="passwordupdate">Change Password</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="bs-callout bs-callout-info mt0" style="border-left-color: rgb(211,47,47); background-color: rgba(211,47,47,.1)">
                                                    <p> <i class="fa  fa-tint" style="font-size:20px;">  </i> Dashboard Alerts</p>
                                            </div>
                                                <form class="form-horizontal group-border stripped" role="form" method="post" action="settings.php">
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label center">Blood Type</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="donationtype" placeholder="BloodGroup" readonly value="<?php echo $blood;?>">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label center">Donation Frequency</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" name="donationfrequency" placeholder="Weeks" value="<?php echo $frequency?>">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label center">Emergency Contact</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="donationemergency" placeholder="Emergency Contact" value="<?php echo $emergency;?>">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-md-3 control-label" for="">Status (Active?)</label>
                                                        <div class="col-lg-10 col-md-9">
                                                            <select class="form-control select" id="donationstatus" name="donationstatus">
                                                                
                                                                    <?php echo $select; ?>
                                                                    
                                                                    
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-offset-4 col-sm-4">
                                                            <br>
                                                            <button type="submit" class="btn btn-default" id="subcbtn" style="width:100%" name="bloodupdate">Update</button>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </form>

                                    
                                
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="tab-pane fade" id="tab2">
                                            <div class="bs-callout bs-callout-info mt0" style="border-left-color: rgb(211,47,47); background-color: rgba(211,47,47,.1)">
                                                    <p> <i class="fa  fa-tint" style="font-size:20px;">  </i> Dashboard Alerts</p>
                                            </div>
                                                <form class="form-horizontal group-border stripped" role="form">
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label center">Blood Type</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="DonationType" placeholder="BloodGroup" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label center">Donation Frequency</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="DonationFrequency" placeholder="Weeks">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-2 control-label center">Emergency Contact</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="DonationEmergency" placeholder="Emergency Contact">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="col-lg-2 col-md-3 control-label" for="">Status (Active?)</label>
                                                        <div class="col-lg-10 col-md-9">
                                                            <select class="form-control select" name="donationstatus">
                                                                
                                                                    <?php echo $status; ?>
                                                                    
                                                                    
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-offset-4 col-sm-4">
                                                            <br>
                                                            <button type="submit" class="btn btn-default" id="subcbtn" style="width:100%">Update</button>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group" style="background-color: transparent">
                                                        <div class="col-sm-offset-4 col-sm-4">
                                                            <button type="submit" class="btn btn-default" id="subcbtn" style="width:100%">Update</button>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                </form>
                                         </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="tab-pane fade" id="tab3">
                                           <div class="bs-callout bs-callout-info mt0">
                                                    <p> <i class="fa   fa-bar-chart-o" style="font-size:20px;">  </i> Lister Settings</p>
                                            </div>
                                                <form class="form-horizontal group-border stripped" role="form">
                                                      <div class="form-group">
                                                        <label class="col-lg-2 col-md-3 control-label" for="">Default Target</label>
                                                        <div class="col-lg-10 col-md-9">
                                                            <select class="form-control select2">
                                                                
                                                                    <option value="AK">ebay.com</option>
                                                                    <option value="HI">ebay.co.uk</option>
                                                                    <option value="HI">ebay.jp</option>
                                                                    <option value="AK">ebay.in</option>
                                                                    <option value="HI">ebay.eu</option>
                                                                    
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-4 control-label center">Default Item Location</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="2" placeholder="leave empty for auto fill">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-4 control-label center">Default Break-Even Percentage</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="2" placeholder="%">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                        <label for="inputcpass" class="col-sm-4 control-label center">Desired profit percentage</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="2" placeholder="%">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-lg-4 col-md-3 control-label" for="">Bad word filter (seperate with comma (,) )</label>
                                                        <div class="col-lg-8 col-md-9">
                                                            <textarea class="form-control icon-textarea" rows="3" style="resize:none"></textarea>
                                                            <i class="fa fa-comments textarea-icon s16"></i> 
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <div class="checkbox-custom">
                                                                <input type="checkbox" id="checkbox2">
                                                                <label for="checkbox2">Block VeRO brands reported by other users</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <div class="checkbox-custom">
                                                                <input type="checkbox" id="checkbox2">
                                                                <label for="checkbox2">Enable auto-filling of item specifics by lister</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="ebayConnection" class="col-sm-4 control-label">Default item specifics</label>
                                                        <div class="col-sm-8">
                                                            <button type="submit" class="btn btn-default" id="subcbtngreen">Set default item specifics that will be added to all of your listings</button>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                   
                                                    
                                                    <div class="form-group">
                                                         <div class="bs-callout bs-callout-info mt0">
                                                            <p>Return Policy Defaults</p>
                                                        </div>
                                                        
                                                        <label class="col-lg-4 col-md-3 control-label" for="">All returns accepted up to</label>
                                                        <div class="col-lg-8 col-md-9">
                                                            <select class="form-control select1">
                                                                
                                                                    <option value="AK">14 Days</option>
                                                                    <option value="HI">30 Days</option>
                                                                    
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-lg-4 col-md-3 control-label" for="">Refund shipping paid by</label>
                                                        <div class="col-lg-8 col-md-9">
                                                            <select class="form-control select1">
                                                                
                                                                    <option value="AK">Sellers</option>
                                                                    <option value="HI">Buyers</option>
                                                                    
                                                                
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                         <div class="col-sm-offset-4 col-sm-4">
                                                            <button type="submit" class="btn btn-default" id="subcbtn" style="width:100%">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                          
                            </div>
                            <!-- col-lg-6 end here -->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .page-content-inner -->
                </div>
                <!-- / page-content-wrapper -->
            </div>
            <!-- / page-content -->
        </div>
        <!-- / #wrapper -->
        <div id="footer" class="clearfix sidebar-page right-sidebar-page">
            <!-- Start #footer  -->
            <p class="pull-left">
                Copyrights &copy; 2018 <a href="../website/index.php" class="color-red strong" target="_blank">The BloodFind</a>. All rights reserved.
            </p>
            <p class="pull-right">
                
                Designed by 
                <a href="https://www.facebook.com/bitstobytes1/" class="ml5 mr25 color-red strong" >BITS se BYTES</a>
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
        <script src="plugins/charts/sparklines/jquery.sparkline.js"></script>
        <script src="plugins/ui/tabdrop/bootstrap-tabdrop.js"></script>
        <script src="js/jquery.dynamic.js"></script>
        <script src="js/main.js"></script>
        <script src="plugins/forms/fancyselect/fancySelect.js"></script>
        <script src="plugins/forms/select2/select2.js"></script>
        <script src="plugins/forms/maskedinput/jquery.maskedinput.js"></script>
        <script src="plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js"></script>
        <script src="plugins/forms/spinner/jquery.bootstrap-touchspin.js"></script>
        <script src="plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="plugins/forms/bootstrap-timepicker/bootstrap-timepicker.js"></script>
        <script src="plugins/forms/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>
        <script src="plugins/forms/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <script src="js/libs/typeahead.bundle.js"></script>
        <script src="plugins/forms/summernote/summernote.js"></script>
        <script src="plugins/forms/bootstrap-markdown/bootstrap-markdown.js"></script>
        <script src="plugins/forms/dropzone/dropzone.js"></script>
        <script src="js/pages/forms-advanced.js"></script>
        <script src="js/pages/tabs.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    </body>
</html>