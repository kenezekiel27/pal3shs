<!DOCTYPE html>
<html>
<head>
	<title>Paliparan III Señior High School</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/css/magnific-popup.css">

 <!-- Theme Style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homepagestyles/css/style.css">


 <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/homepagestyles/loginForm/css/main.css">
</head>
<body style="background: #fbf9f9">
<!-- Login Form -->
	
	<div class="modal" id="loginForm" style="position: fixed; z-index: 111111111; width: 100%;">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
					<button type="button" class="closeBtn btn btn-default" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
						<span class="login100-form-title p-b-33">
							Account Login
						</span>
						<div class="loginwarning" ></div>
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100 username" type="text" name="username" placeholder="Username">
							<span class="focus-input100-1"></span>
							<span class="focus-input100-2"></span>
						</div>

						<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
							<input class="input100 password" type="password" name="password" placeholder="Password">
							<span class="focus-input100-1"></span>
							<span class="focus-input100-2"></span>
						</div>
						<br>
						
						<div class="container-login100-form-btn m-t-20">
							<button class="login100-form-btn loginBtn" type="button">
								Sign in
							</button>
						</div>

						<div class="text-center p-t-45 p-b-4">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2 hov1">
								Username / Password?
							</a>
						</div>

						<div class="text-center">
							<span class="txt1">
								Create an account?
							</span>

							<a href="#" class="txt2 hov1">
								Sign up
							</a>
						</div>
				</div>
			</div>
		</div>
	</div>
<!-- End of Login Form -->
	<header role="banner">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; width: 100%;">
			<div class="container">
				<a class="navbar-brand absolute" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/homepagestyles/images/Pal3Logo.png" height="60" width="60"></a>
				<a class="navbar-brand absolute" href="<?php echo base_url(); ?>home"> <img src="<?php echo base_url(); ?>assets/homepagestyles/images/paliparan.png" height="60" width="250"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item">
							<a class="nav-link active" href="<?php echo base_url(); ?>home">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle aboutBtn" href="about.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a class="dropdown-item missionBtn" href="<?php echo base_url(); ?>about-mission">Mission</a>
                 				<a class="dropdown-item visionBtn" href="<?php echo base_url(); ?>about-vision">Vision</a>
                 				<a class="dropdown-item historyBtn" href="<?php echo base_url(); ?>about-history">History</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle coursesBtn" href="<?php echo base_url(); ?>courses" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
							<div class="dropdown-menu" aria-labelledby="dropdown05">
								<a class="dropdown-item abmBtn" href="<?php echo base_url(); ?>courses-abm">ABM</a>
                 				<a class="dropdown-item humssBtn" href="<?php echo base_url(); ?>courses-humss">HUMSS</a>
                 				<a class="dropdown-item stemBtn" href="<?php echo base_url(); ?>courses-stem">STEM</a>
							</div>
						</li>
						<li class="nav-item">
				            <a class="nav-link" href="<?php echo base_url(); ?>contact">Contact</a>
				        </li>
					</ul>
					<ul class="navbar-nav absolute-right">
						<button class="openLoginForm" data-toggle="modal" data-target="#loginForm" style="color: #11cbd7; background: none; border:none; cursor: pointer;" >Login</button>
					</ul>
				</div>
			</div>
		</nav>
	</header>

