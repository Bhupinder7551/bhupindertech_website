
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="bhupindertech.com" />
        <meta name="author" content="Bhupinder Singh" />
        <title>Bhupinder Tech</title>

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
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Bhupinder Tech</a>
        <img alt="bhupinder singh sandhu" border="0" height="36" width="36" src="images/Bhupinder (1).jpg" style="border-radius:50%;outline:none;color:#ffffff;text-decoration:none" class="CToWUd">
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
			

			<?php	
				if(!isset($_SESSION['username'])):?>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./login.php">LogIn </a></li> 
             <?php else: ?>          
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Welcome: <?php echo  $_SESSION['username']; ?>  </a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="./logout.php">Log out</a></li>
		<?php endif; ?>
            </ul>
        </div>
    </div>
</nav>