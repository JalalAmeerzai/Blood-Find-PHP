<?php 
    require '../include.php';
    

    session_start();
    


    
    if(isset($_POST["login"])){
        //echo $_SESSION["USERNAME"];
        if(isset($_POST["LogEmail"]) && isset($_POST["LogPass"])){
            //echo $_SESSION['USERNAME'];
            
            
            $useremail=$_POST['LogEmail'];
            $userpass = $_POST['LogPass'];
			$query="SELECT * from users where email = '$useremail' AND password = '$userpass';";
			$result = mysql_query($query);
            
            if($result){
                //$_SESSION["USERNAME"] = $_POST["LogEmail"];
                
                if($row=mysql_fetch_assoc($result)){
                    $user= $_POST["LogEmail"];
                    $pass= $_POST["LogPass"];
                    
                    $_SESSION['user'] = $user;
                    
                
                    
                    echo("<script>window.location = '../admin/user.php'</script>;");
                }
                else{
                    echo("<script>alert('Wrong Email/Password');</script>");
                }
            }
            else{
                echo('<script>alert("Something went wrong")</script>;');
            }
            
        }
        else{
            //echo $_SESSION['USERNAME'];
            
            echo('<script>window.location = "login.php"</script>;');
        }
    }

    


?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Login | The BloodFind</title>
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
				
				
			
				<form action="login.php" method="post">
					<h1>LOGIN</h1>	<br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <input type="email" class="form-control" id="LogEmail" name="LogEmail" placeholder="Enter Email" required><br>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <input type="password" class="form-control" id="LogPass" name="LogPass" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn tf-btn btn-default" id="login" name="login" value="login" style="border:0px;"/>
                    </form>
			</section>
			
		</div><!-- /container -->
	</body>
</html>