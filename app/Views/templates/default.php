<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?= PATH ?>/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?= PATH ?>/css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="<?= PATH ?>/css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?= PATH ?>/css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?= PATH ?>/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?= PATH ?>/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?= PATH ?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= PATH ?>/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= PATH ?>/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?= PATH ?>/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?= PATH ?>/css/style.css">

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="<?= PATH ?>">Footwear</a></div>
						</div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="<?= PATH ?>">Home</a></li>
								<li><a href="women.html">Women</a></li>
								<?php if($auth): ?>
									<li><a href="<?= PATH ?>/login/logout" tyle="color:#17a2b8"><span style="color:#17a2b8"><?= $_SESSION['auth']['name'] ?></span> Log Out</a></li>
								<?php else: ?>
									<li><a href="<?= PATH ?>/login">Login</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="colorlib-product">
      <div class="container">
        <?= $content ?>
      </div>
		</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?= PATH ?>/js/jquery.min.js"></script>
   <!-- popper -->
   <script src="<?= PATH ?>/js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="<?= PATH ?>/js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="<?= PATH ?>/js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="<?= PATH ?>/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?= PATH ?>/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="<?= PATH ?>/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="<?= PATH ?>/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= PATH ?>/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="<?= PATH ?>/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?= PATH ?>/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="<?= PATH ?>/js/main.js"></script>

	</body>
</html>