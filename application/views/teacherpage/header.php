
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/adminpagestyles/plugins/images/favicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>assets/adminpagestyles/css/colors/default.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">

    
 
</head>
<body class="fix-header">

	<!-- Preloader -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		</svg>
	</div>
	<!-- End Preloader -->

	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Topbar header - style you can find in pages.scss -->
		<div id="adminNavbarHeader">
			<div class="top-left-part" id="adminNavbarlogo">
				<!-- Logo -->
				<a class="navbar-brand absolute" href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url(); ?>assets/images/paliparan.png" height="45" width="150" class="logoBg"></a>
				<!-- End Logo -->
			</div>
			<ul class="nav navbar-top-links navbar-right pull-right">
				<li>
					<a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
				</li>
				<li>
					<form role="search" class="app-search hidden-sm hidden-xs m-r-10">
						<input type="text" placeholder="Search..." class="form-control">
						<a href="">
                                <i class="fa fa-search"></i>
                            </a> 
					</form>
				</li>
				<li>
					<a class="profile-pic" href="profile.php"> <img src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/images/users/noimage.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Teacher</b></a>
				</li>
			</ul>
		</div>
		<!-- End Top Navigation -->

		<!-- Left Sidebar -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav slimscrollsidebar" id="sidebar-menu">
				<div class="sidebar-head">
					<h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
				</div>
				<ul class="nav" id="side-menu">
					<li style="padding: 70px 0 0;">
						<a href="<?php echo base_url(); ?>dashboard-teacher" class="waves-effect"><i style="color: black" class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
					</li>
					<li>
						<a href="#" class="waves-effect"><i style="color: black" class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
						<ul class="nav" id="side-menu">
							<li>
								<a href="<?php echo base_url(); ?>information-teacher" class="waves-effect" style="left: 30px">Information</a>
								<a href="#" class="waves-effect" style="left: 30px">Accounts</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>class-advisory" class="waves-effect"><i style="color: black" class="fa fa-users fa-fw" aria-hidden="true" ></i>My Advisory</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>my-students" class="waves-effect"><i style="color: black" class="fa fa-users fa-fw" aria-hidden="true" ></i>My Students</a>
					</li>
					<li>

						<a href="#" class="waves-effect"><img src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/images/bulletinicon.png" alt="user-img" width="24"  style="margin-left: -7px"> Bulletin Board</a>
						<ul class="nav" id="side-menu">
							<li>
								<a href="#" class="waves-effect" style="left: 30px">School Event</a>
								<a href="#" class="waves-effect" style="left: 30px">School Activity</a>
								<a href="#" class="waves-effect" style="left: 30px">Class Suspension</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>adminpage/logout" class="waves-effect"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>