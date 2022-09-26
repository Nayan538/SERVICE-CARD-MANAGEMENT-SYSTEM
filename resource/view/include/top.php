<!DOCTYPE html>
<html lang="en">
	
	<!-- Mirrored from adminex.themebucket.net/blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2015 19:55:06 GMT -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="ThemeBucket">
		<link rel="shortcut icon" href="public/images/logo_icon1.png" type="image/png">
		
		<title>SERVICE CARD MANAGEMENT SYSTEM</title>
		
		<link href="public/css/style.css" rel="stylesheet">
		<link href="public/css/style-responsive.css" rel="stylesheet">

		<!-- Summernote Start -->
		<link href="public/summernote/summernote-lite.min.css" rel="stylesheet">
		<script src="public/summernote/summernote-lite.min.js"></script>
		<!-- Summernote End -->
		
		<link href="public/css/style.css" rel="stylesheet">
		<link href="public/css/style-responsive.css" rel="stylesheet">
		
		<link href="public/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
		<link href="public/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
		<link rel="stylesheet" href="public/js/data-tables/DT_bootstrap.css" />
		<script src="public/js/jquery-1.10.2.min.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="public/js/html5shiv.js"></script>
			<script src="public/js/respond.min.js"></script>
		<![endif]-->
		
	</head>
	
	<body class="sticky-header">
		
		<section>
			<!-- left side start-->
			<div class="left-side sticky-left-side" >
				
				<!--logo and iconic logo start-->
				<div class="logo">
					<a href="dashboard.php"><img src="public/images/logo1.png" alt=""></a>		<!--here i just edit for click on logo it's come to homepage-->
				</div>
				<!--logo and iconic logo end-->
				
				<div class="left-side-inner">
					<!-- visible to small devices only -->
					<div class="visible-xs hidden-sm hidden-md hidden-lg">
						<h5 class="left-nav-title">Account Information</h5>
						<ul class="nav nav-pills nav-stacked custom-nav">
							<li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
							<li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
						</ul>
					</div>
					
					<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						
						<li><a href="dashboard.php"><i class="fa fa-home"></i> <span><b>DASHBOARD</b></span></a> </li>
						
						<?php 
							
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list"><a href="#"><i class="fa fa-list-alt"></i> <span><b>CADRS</b></span></a>
								<ul class="sub-menu-list">
								<li><a href="active-card.php"><i class="fa fa-plus-circle"></i> Active a Card </a></li>
								<li><a href="use-card.php"><i class="fa fa-user"></i> Use a Card </a></li>
								<li><a href="search-card.php"><i class="fa fa-search-plus"></i>Search a Card  </a></li>
								<li><a href="referral-info-card.php"><i class="fa fa-heart"></i>Referrals Info </a></li>
								</ul>
								</li>
								';
							}
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list"><a href="#"><i class="fa fa-folder-open"></i><b><span>MY PROFILE</b></span></a>
								<ul class="sub-menu-list">
								<li><a href="my-profile.php">My Profile  </a></li>
								</ul>
								</li>
								';
							}

							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list"><a href="#"><i class="fa fa-th"></i> <span><b>REPORTS</b></span></a>
								<ul class="sub-menu-list">
								<li><a href="report.php">Reports  </a></li>
								</ul>
								</li>
								';
							}
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Technical Operator")
							{
								echo '
								<li class="menu-list"><a href="#"><i class="fa fa-user"></i> <span><b>USERS</b></span></a>
								<ul class="sub-menu-list">
								<li><a href="create-admin.php"><i class="fa fa-plus-circle"></i><b> Create Users </b></a></li>
								<li><a href="list-admin.php"><i class="fa fa-users"></i> <b>List Users</b></a></li>
								</ul>
								</li>
								';
							}
							if($_SESSION['SMC_login_admin_type'] == "Root Admin" || $_SESSION['SMC_login_admin_type'] == "Sales Manager")
							{
								echo '
								<li class="menu-list"><a href="#"><i class="fa fa-cogs"></i> <span><b>SETTINGS</b></span></a>
								<ul class="sub-menu-list">
								<li><a href="add-card.php">Add New Cards</a></li>
								<li><a href="list-card.php">List Of Cards</a></li>
								<li><a href="Settings.php">Settings</a></li>
								</ul>
								</li>
								';
							}
						?>
					</ul>
					<!--sidebar nav end-->
				</div>
			</div>
			<!-- left side end-->
			
			<!-- main content start-->
			<div class="main-content" >
				<!-- header section start-->
				<div class="header-section">
					<!--toggle button start-->
					<a class="toggle-btn"><i class="fa fa-bars"></i></a>
					<!--toggle button end-->
					
					
					<!--notification menu start -->
					<div class="menu-right" >
							<ul class="notification-menu">
								<li>
									<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<img src="<?php echo $GLOBALS['ADMINS_DIRECTORY'] . $_SESSION['SMC_login_admin_image']; ?>" alt="" />
										<?php echo $_SESSION['SMC_login_admin_name']; ?> 
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
										<li>
											<a href="?exit=lock"><i class="fa fa-user"></i> Lock Screen </a>
										</li>
										<li>
											<a href="?exit=yes"><i class="fa fa-sign-out"></i> Log Out </a>
										</li>
									</ul>
								</li>
							</ul>
					</div>
					<!--notification menu end -->
					
				</div>
			<!-- header section end-->						