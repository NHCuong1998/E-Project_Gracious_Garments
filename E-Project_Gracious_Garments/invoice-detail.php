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
	<title>Invoice</title>
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
	require_once "BUS\TaiKhoanBUS.php";
	require_once "BUS\LoaiSanPhamBUS.php";
	require_once "BUS\ShippingAddressBUS.php";
	require_once "BUS\CartBUS.php";
	require_once "BUS\InvoiceBUS.php";
	require_once "BUS\ImageBUS.php";



	if ($_SESSION["user"]) {
		if ($_SESSION["user"] == true) {
			$username = $_SESSION["user"];
			$result = TaiKhoanBUS::LayThongTinTK($username);
		}
		$name = $result->fetch_assoc();
	?>
		<header id="header">
			<!--header-->
			<?php
			include "Header.php"
			?>
			<!--/header-->

			<hr>
			<div class="container bootstrap snippet">
				<div class="row">
					<div class="col-sm-3">
						<h4><?php echo $name["FullName"] ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<!--left col-->

						<div class="text-center">
							<?php
							$Profileimg = ImageBUS::CheckImage($username);
							$checkimg = $Profileimg["ProfilePicture"];


							if ($checkimg != "") {
							?>
								<img src="images/ProfilePhoto/<?php echo $checkimg ?>" class="avatar img-circle img-thumbnail" alt="avatar">
							<?php


							} else {
							?>
								<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
							<?php


							}
							?>
							<h6>Upload a different photo...</h6>
							<form method="POST" action="user.php" enctype="multipart/form-data">
								<input type="file" name="image" class="text-center center-block file-upload">
								<button type="submit" name="upload">Save</button>
							</form>
							<?php
							if (isset($_POST["upload"])) {

								$filename = $_FILES['image']['name'];
								$filetmpname = $_FILES['image']['tmp_name'];
								$folder = 'images/ProfilePhoto/';

								move_uploaded_file($filetmpname, $folder . $filename);
								ImageBUS::UpImageBUS($username, $filename);
								header("location:user.php");
							} ?>

						</div>

						</hr><br>



						<div class="panel panel-default">
							<ul class="list-group">
								<li class="list-group-item text-muted">User</li>
								<li class="list-group-item text-right"><span class="pull-left"><strong>Account:</strong>
									</span><?php echo $name["UserName"] ?></li>

							</ul>
						</div>
						<?php
						if ($_SESSION["user"] == true) {
							$username = $_SESSION["user"];
							$result = TaiKhoanBUS::LayThongTinTK($username);
						}
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
						?>
								<ul class="list-group">
									<li class="list-group-item text-muted">Profile <i class="fa fa-dashboard fa-1x"></i></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Full
												Name:</strong></span><?php echo $row["FullName"] ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Gender:</strong></span><?php echo $row["Gender"] ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Phone:</strong></span><?php echo $row["PhoneNumber"] ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Email:</strong></span><?php echo $row["Email"] ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Address:</strong></span><?php echo $row["Address"] ?></li>
								</ul>
						<?php

							}
						} else echo "sai";

						?>
					</div>
					<!--/col-3-->
					<div class="col-sm-9">
						<ul class="nav nav-tabs">
							<div class="content-wrapper">
								<div class="content">
									<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
										<?php
										if ($_GET["idinvoice"]) {
											$id = $_GET["idinvoice"];
											$getinvoice = InvoiceBUS::GetInvoice($id);

										?>
											<div class="d-flex justify-content-between">
												<h2 class="text-dark font-weight-medium">Invoice
													#<?php echo $getinvoice["ID"] ?></h2>
											</div>
											<div class="row pt-5">
												<div class="col-xl-3 col-lg-4">
													<p class="text-dark mb-2"><strong>To</strong></p>
													<address>
														Full Name: <?php echo $getinvoice["FullName"] ?>
														<br> Address: <?php echo $getinvoice["Address"] ?>
														<br> Phone Number: <?php echo $getinvoice["PhoneAddress"] ?>
													</address>
												</div>
												<div class="col-xl-3 col-lg-4">
													<p class="text-dark mb-2"><strong>Details</strong></p>
													<address>
														Invoice ID: #<?php echo $getinvoice["ID"] ?>
														<br>Date: UTC <?php echo $getinvoice["IssuedDate"] ?>
													</address>
												</div>
											</div>
											<?php
											$idinvoice = $_GET["idinvoice"];
											$invoidetail = InvoiceBUS::GetInvoiceDetail($idinvoice);
											if ($invoidetail->num_rows > 0) {
												$sum = 0;
											?>
												<table class="table table-light ">
													<thead class="tablelist">
														<tr class="namelist">
															<th>Item</th>
															<th>Name Product</th>
															<th>Quantity</th>
															<th>Price</th>
															<th>Total</th>
														</tr>
													</thead>
													<tbody>
														<?php
														while ($row = $invoidetail->fetch_assoc()) {
															$sum += $row["Price"] * $row["Quantity"];
														?>
															<tr>
																<td class="align-middle"><img src="Images/shop/<?php echo $row["Image"]; ?>" style="width: 60px;"></td>
																<td><?php echo $row["Name_Product"]; ?></td>
																<td>
																	<?php echo $row["Quantity"]; ?>

																<td><?php echo "$" . $row["Price"]; ?></td>
																<td><?php echo "$" . $row["Quantity"] * $row["Price"]; ?></td>
															</tr>
													<?php

														}
													}
													?>
													</tbody>
													<tfoot class="tablelist">
														<tr class="namelist">
															<td colspan="4" class="text-right">Total Money:</td>
															<td>$<span name="sum"><?php echo $sum; ?></span></td>
														</tr>
													</tfoot>
												</table>
									</div>
								<?php } else {
											header("location:user.php");
										}
								?>
								</div>
								<!--/tab-content-->

							</div>
							<!--/col-9-->
					</div>
					<!--/row-->

				</div>
			</div>
			<div class="clearfix"></div>
			<footer id="footer">
				<!--Footer-->
				<?php
				include "Footer.php"
				?>
				<!--/Footer-->
			<?php
		} else {
			header("location:login.php");
		}
			?>


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