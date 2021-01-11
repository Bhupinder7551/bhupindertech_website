<?php

session_start();
	$msg = "";
	use PHPMailer\PHPMailer\PHPMailer;

	if (isset($_POST['submit'])) {
		$con = new mysqli('198.71.225.62', 'bhupinderteach', 'Bhinda123', 'db');
      
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password =$_POST['password'];
		$cPassword =$_POST['cPassword'];

		if ($name == "" || $email == "" || $password != $cPassword)
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "Email already exists in the database!";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);

				$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

				$con->query("INSERT INTO users (name,email,password,isEmailConfirmed,token)
					VALUES ('$name', '$email', '$hashedPassword', '0', '$token');
				");
				

                include_once "PHPMailer/src/PHPMailer.php";

                $mail = new PHPMailer();
                $mail->setFrom('bhupindersingh7551@gmail.com');
                $mail->addAddress($email, $name);
                $mail->Subject = "Please verify email!";
                $mail->isHTML(true);  
				$mail->Body = "
                   <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<title>bhupindertech.</title>
</head>
<body style=\" font-family:'Trebuchet MS', Tahoma; margin: 0px; padding: 0px; font-size: 10pt; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none;\">
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
	<tr>
    	<td width=\"322\" rowspan=\"18\">&nbsp;</td> 
        <td width=\"700\" align=\"center\">&nbsp;</td>
        <td width=\"386\" rowspan=\"18\">&nbsp;</td>    
	</tr>
    <tr>
    	</tr>
    <tr height=\"35\">
    	<td height=\"35\" align=\"right\" bgcolor=\"#036\" width=\"700\">
			<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"5\" style=\"font-size:18px; color:#FFFFFF; font-weight:bold; height:35px;\" bgcolor=\"#036\">
			<tr>
			  <td align=\"center\">
			Thanks For Registration With Bhupinder Tech
				 
				 </td>
        	</tr></table>    
		</td>
	</tr>
    <tr>
    	<td bgcolor=\"#FFFFFF\">
        	<table width=\"100%\" border=\"2px solid #036\" align=\"center\" cellpadding=\"5\" cellspacing=\"0\" height=\"100\">
            	<tr>
                	<td valign=\"top\">    
	                    <p>Hello,</p>						
						<p>your Name: ".$name."</p>
						<p>Your Email: ".$email."</p>
						<p>Please Click here to confirm and login with Bhupinder Tech:</p>
					 
					 <a  align=\"center\" style=\"color:white; cursor: pointer; display: inline-block; font-size: 16px; border: none; border-radius: 11px; background-color:#009d00; padding:5px 12px;
					 text-decoration:none;\" href='http://bhupindertech.com/confirm.php?email=$email&token=$token&name=$name'>Click Here</a>
					
                          <p></p>
					</td>
				</tr>
		  </table>
	  </td>
	</tr>
    <tr>
    	<td>
        	<table width=\"100%\" height=\"30\" border=\"0\" cellpadding=\"5\" cellspacing=\"5\" bgcolor=\"#036\" style=\"color:#FFFFFF;\">
           	  <tr><td height=\"30\" align=\"center\"><a href=\"http://www.bhupindertech.com\" style=\"color:#FFF; text-decoration:none;\">www.bhupindertech.com</a></td></tr>
			</table>        
        </td>
    </tr>  
</table>
   
                
</body>
</html>";
                 

                if ($mail->send())
                    $msg = "You have been registered! Please verify your email!";
                else
                    $msg = "Something wrong happened! Please try again!";
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
   
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				

					<h2 class="form-title">Register here</h2>
				<br><br>
				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="register.php">

					<input class="form-control" name="name" placeholder="Name..."><br>
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="form-control" name="password" type="password" placeholder="Password..."><br>
					<input class="form-control" name="cPassword" type="password" placeholder="Confirm Password..."><br>
					<input class="btn btn-secondary" type="submit" name="submit" value="Register">
					<br><br>
				</form>
     	
					<div class="d-flex justify-content-center links">
						Already have an account? <a href="http://bhupindertech.com/login.php" class="ml-2">Sign In</a>
					</div>
				<br>
				
			</div>
		</div>
	</div>
</body>
		   <?php include 'homePage/footer.php';?>
</html>