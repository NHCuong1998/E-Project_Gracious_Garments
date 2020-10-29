<?php
ob_start();
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Contact | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
	<?php
	require "BUS\TaiKhoanBUS.php";
	require "BUS\SanPhamBUS.php";
	require "BUS\LoaiSanPhamBUS.php";
	?>
	<header id="header">
		<!--header-->
		<?php
		include "Header.php"
		?>
		<!--/header-->

		<div id="contact-page" class="container">
			<div class="bg">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="title text-center">Contact <strong>Us</strong></h2>
						<div id="map" style="width:600px;height:300px;">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4244704632133!2d106.68783431469507!3d10.778765892319905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3a9d92c4a7%3A0x6293396afcadc8a5!2zMjEyIE5ndXnhu4VuIMSQw6xuaCBDaGnhu4N1LCBQaMaw4budbmcgNiwgUXXhuq1uIDMsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1586459800275!5m2!1svi!2s" width="1100px" height="280px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<div class="contact-form">
							<h2 class="title text-center">Get In Touch</h2>
							<div class="status alert alert-success" style="display: none"></div>
							<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="send_form_email.php">

								<div class="form-group col-md-6">
									<input type="text" name="first_name" class="form-control" required="required" placeholder="First Name">
								</div>
								<div class="form-group col-md-6">
									<input type="text" name="last_name" class="form-control" required="required" placeholder="Last Name">
								</div>
								<div class="form-group col-md-6">
									<input type="email" name="email" class="form-control" required="required" placeholder="Email">
								</div>
								<div class="form-group col-md-6">
									<input type="text" name="telephone" class="form-control"  placeholder="Phone Number">
								</div>
								<div class="form-group col-md-12">
									<textarea name="comments" id="message" required="required" class="form-control" rows="8" placeholder="Your omments Here"></textarea>
								</div>
								<div class="form-group col-md-12">
									<input type="submit" name="submit" class="btn btn-primary pull-right" value="Send">
								</div>

							</form>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="contact-info">
							<h2 class="title text-center">Contact Info</h2>
							<address>
								<p>E-Project Inc.</p>
								<p>212-214 Nguyễn Đình Chiểu, Q.3, TPHCM</p>
								<p>Ho Chi Minh, Viet Nam</p>
								<p>Hot line: 1800 1779</p>
								<p>Fax: 1800 1779</p>
								<p>Email: <a href="mailto:aptech2@aprotrain.com"><i class="fa fa-envelope"></i> aptech2@aprotrain.com</a></p>
							</address>
							<div class="social-networks">
								<h2 class="title text-center">Social Networking</h2>
								<ul>
									<li>
										<a href="https://aptechvietnam.com.vn/gioi-thieu"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-youtube"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/#contact-page-->

		<div class="clearfix"></div>
		<footer id="footer">
			<!--Footer-->
			<?php
			include "Footer.php"
			?>
			<!--/Footer-->


			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script type="text/javascript" src="js/gmaps.js"></script>
			<script src="js/contact.js"></script>
			<script src="js/price-range.js"></script>
			<script src="js/jquery.scrollUp.min.js"></script>
			<script src="js/jquery.prettyPhoto.js"></script>
			<script src="js/main.js"></script>
</body>

</html>