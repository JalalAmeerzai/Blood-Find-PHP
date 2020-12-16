<?php
    require '../include.php';
    

    if(isset($_POST["signUp"])){
        if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["contact"]) && isset($_POST["address"]) && isset($_POST["lat"]) && isset($_POST["long"]) && isset($_POST["blood"]) ){
            
            $signEmail = $_POST["email"];
            $query="SELECT * from users where email = '$signEmail';";
			$result = mysql_query($query);
            
            
            if($result){
					
					if($row=mysql_fetch_assoc($result)){
						echo("<script>alert('email already taken');</script>");
						
					}
					else{
						  
				        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $fname = $_POST["fname"];
                        $lname = $_POST["lname"];
                        $contact = $_POST["contact"];
                        $address = $_POST["address"];
                        $lat = (double)$_POST["lat"];
                        $long = (double)$_POST["long"];
                        $blood = $_POST["blood"];
                        $frequency = 8;
                        $emergency = "";
                        $status = "Yes";
							
                        
                        
							$query = "Insert INTO users values('$email','$password');";
							$result = mysql_query($query);
							if($result){
                                $query1 = "Insert INTO userInfo values('$fname','$lname','$contact','$email','$address','$lat','$long','$blood');";
				                $result1 = mysql_query($query1);
                                if($result1){
                                    $query2 = "Insert INTO DonationInfo values('$email','$frequency','$emergency','$status');";
				                    $result2 = mysql_query($query2);
                                    if($result2){
                                        echo("<script>alert('account created');</script>");
                                        session_start();
                                        //unset($_SESSION['user']);
                                        session_destroy();
                                        
                                        echo('<script>window.location = "login.php"</script>;');
                                    }
                                }
							}
							
						
						
					}
					
			}
            
            
            
        }
    }
    
?>



<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Sign Up | The BloodFind</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		
		<script src="js/modernizr.custom.js"></script>
        
        
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
        

        add = document.getElementById("autocomplete").value;

          //alert("what");

        var geocoder = new google.maps.Geocoder();


        geocoder.geocode( { 'address': add}, function(results, status) {
            //alert(2);
        if (status == google.maps.GeocoderStatus.OK) {
            //alert("what");
          var latitude = results[0].geometry.location.lat();
          var longitude = results[0].geometry.location.lng();
          document.getElementById("lat").value = latitude;
            document.getElementById("long").value = longitude;
            
            
        } 
      });




      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU6g2ceeEQx_ZCln51nnRb6eJUEEh05js&libraries=places&callback=initAutocomplete"
        async defer></script>
        
        
	</head>
	<body style="padding: 0;">
		<div class="container" style="width:100%;">
			<!-- Top Navigation -->
			
			<header>
				<a href="index.php"><img src="img/logo2.png" class="loginlogo"></a>
			</header>
			
			
			
			
			
			
			

  
  <div class="progress">
   
  </div>

		
			
			
			
			
			
			
			
			
			
			
			
			<section class="col-2 ss-style-triangles">
				
				
			
				<form action="signUp.php" method="post">
					<h1>SIGN UP</h1>	<br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="SignFname" name="fname" placeholder="First Name" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="SignLname" name="lname" placeholder="Last Name">
                                </div>
                            </div><br>
							
							
							 <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <input type="email" class="form-control" id="SignEmail"  name="email" placeholder="Email" required>
                                </div>
                            </div><br>
							
							
							
							 <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <input type="password" class="form-control" id="SignPass" name="password" placeholder="Password" required>
                                </div>
                            </div><br>
							
							
							 <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="SignContact"  name="contact" placeholder="Phone Number" required>
                                </div>
                            </div><br>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="autocomplete" placeholder="Address" onFocus="geolocate();" required name="address">
                                    <input type="text"  id="lat" name="lat" style="display:none" />
                                    <input type="text"  id="long" name="long" style="display:none"/>
                                     
                                </div>
                            </div><br>
                            
                            
                            
                            <div class="col-md-6">
                            <div class="form-group">
                                    
                                    
                                                       
                                                        <div class="col-lg-10 col-md-6">
                                                            <br>
                                                            <select class="form-control select2" id="DonationStatus" required name="blood" onchange="checkkero();">
                                                                
                                                                <option >Select Blood Group</option>    
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
                                                    
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                        
                            
							
                        </div>
                        <br>
                    <input  type="submit" class="btn tf-btn btn-default" id="login" name="signUp"   style="border:0px"  value="Sign Up"/>
                    
                   
                    </form>
			</section>
			
		</div><!-- /container -->
	</body>
</html>