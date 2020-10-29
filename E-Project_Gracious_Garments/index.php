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
	<title>Home</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
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
	require "BUS\CartBUS.php";
	?>
	<header id="header">
		<!--header-->
		<?php include "Header.php";
		?>
		<!--/header-->
	
	<section id="slider">
		<!--slider-->
		<?php
		include "Slider.php"
		?>
	</section>
	<?php 
		if(isset($_POST["addcart"])){
			$idproduct = $_POST["addcart"];
			$quantity = "1";
			if(isset($_SESSION["user"])){
				$username = $_SESSION["user"];
											
				CartBUS::AddCart($username, $idproduct, $quantity);						
				}
			else {
				header("loaction:login.php");
				}
			}
		?>


	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<!-- leftbar -->
					<?php
					include "Left-Bar.php"
					?>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!--Trending-->
						<form method="post">
							<h2 class="title text-center">Trending</h2>
							<?php
							$result = SanPhamBUS::LayDSSanPhamTheoTrend();
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
							?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<a href="product-details.php?maSP=<?php echo $row["ID"]; ?>" target="blank">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="images/shop/<?php echo $row['Image']; ?>" width="300px" height="350px" alt="" />
														<h2>$<?php echo $row['Price']; ?></h2>
														<p><?php echo $row['Name']; ?></p>
														<button type="submit" name="addcart"
                                                            value="<?php echo $row["ID"] ?>"
                                                            class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
						
													</div>
												</div>
											</a>
										</div>
									</div>
								<?php
								}
								?>
							<?php
							}
							?>
						</form>
						<!--features_items-->
					</div>
				</div>
			</div>

	</section>


	<div class="clearfix"></div>
	<!-- footer -->
	<?php
	include "Footer.php"
	?>
</body>

</html>