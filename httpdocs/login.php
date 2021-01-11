<?php
session_start();

$_SESSION['activeUser'] = $email;
	include './CV download/config.php';
	$msg = "";
	if (isset($_POST['submit'])) {
		//$con = new mysqli('localhost', 'research_emailC', 'test123', 'research_phpEmailConfirmation');

		$email = $conn->real_escape_string($_POST['email']);
		$name = $conn->real_escape_string($_POST['name']);
		$password = $conn->real_escape_string($_POST['password']);

		if ($email == "" || $password == "")
			$msg = "Please check your inputs!";
		else {
			$sql = $conn->query("SELECT id, password,name, isEmailConfirmed FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {
                    if ($data['isEmailConfirmed'] == 0)
	                    $msg = "Please verify your email!";
                    else {
						    $_SESSION['username']=$data['name'];
				            $_SESSION['email']=$email;
	                     header("Location: index.php"); 
                    }
                } else
	                $msg = "Please check your inputs!";
			} else {
				$msg = "Please check your inputs!";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="bhupindertech.com" />
        <meta name="author" content="Bhupinder Singh" />
        <title>Bhupinder Tech</title>
		    <!-- Font Icon -->
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" >

    <!-- Main css -->
  <link rel="stylesheet" href="css/style_registration.css" >
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<style>
		.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    max-height: calc(60vh - 10vh);
    overflow-y: auto;
}</style>
    </head>
    <body id="page-top">

<!-- Navigation-->
<nav style="background-color:#f8f9fa"class="navbar navbar-expand-lg navbar-light fixed-top py-5" id="mainNav">
    <div class="container">
        <a style="color:black;"class="navbar-brand js-scroll-trigger" href="#page-top">Bhupinder Tech</a>
        <img alt="bhupinder singh sandhu" border="0" height="36" width="36" src="images/Bhupinder (1).jpg" style="border-radius:50%;outline:none;color:#ffffff;text-decoration:none" class="CToWUd">
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
			

		
            </ul>
        </div>
    </div>
</nav>
   
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="login.php" id="signup-form" class="signup-form">
                        <h2 class="form-title">Login</h2>
											  <?php if ($msg != "") echo $msg . "<br><br>" ?>
                     <br><br>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                 
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="login"/>
                        </div>
                    </form>
                 	<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="http://bhupindertech.com/register.php" class="ml-2">Sign Up</a>
					</div>
				</div>
                </div>
				
            </div>
        </section>

    </div>
 <!-- Footer-->
    <?php include 'homePage/footer.php';?>
    <!-- End Footer-->
<!--
</body> This templates was made by Colorlib (https://colorlib.com) -->
<!--</html>-->