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
    <title>Product Details</title>
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
	require_once "BUS\SanPhamBUS.php";
	require "BUS\LoaiSanPhamBUS.php";
	require "BUS\CartBUS.php";
	?>

    <header id="header">
        <!--header-->
        <?php
		include "Header.php"
		?>
        <!--/header-->
        <?php 
		if(isset($_POST["addcart"])){
			$idproduct = $_POST["addcart"];
			$quantity = 1;
			if(isset($_SESSION["user"])){
				$username = $_SESSION["user"];
											
				CartBUS::AddCart($username, $idproduct, $quantity);
					
				}
			else {
				header("loaction:login.php");
				}
			}
			
		if(isset($_POST["quantitycart"])){
			$idproduct = $_POST["quantitycart"];
			$quantity = $_POST["quantityselect"];
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
                        <?php include "Left-Bar.php" ?>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <!--product-details-->
                        <div class="product-details">
                            <?php
							if (isset($_GET["maSP"])) {
								$ProdId = $_GET["maSP"];
								$sp = SanPhamBUS::LayDSSanPhamDefault($ProdId);
							?>
                            <!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="images/shop/<?php echo $sp["Image"] ?>" alt="" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information">
                                    <!--/product-information-->
                                    <form method="post">
                                        <h2><?php echo $sp["Name"] ?></h2>
                                        <p><?php echo $sp["Description"] ?></p>
                                        <span>
                                            <span>Price: $<?php echo $sp["Price"] ?></span>
                                            
											<div class="form-group form-inline">
											<label>Quantity:</label>
               								 <select name="quantityselect" id="cboSoLuong">
                 								   <?php
                    									 $n = ($sp["Quantity"] < 20) ? $sp["Quantity"] : 20;
                    									for ($i = 1; $i <= $n; $i++) {
                           									 echo "<option value='$i'>$i</option>";
                      										  }
                   									     ?>
               								 </select>
          									  </div>	
                                            <button type="submit" name="quantitycart" value="<?php echo $sp["ID"] ?>"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </span>
                                        <p><b>Availability:</b>
                                            <?php echo $sp["Status"] == 1 ? "In Stock" : "Out of Stock" ?></p>
                                        <p><b>Condition:</b> New</p>
                                        <p><b>Brand:
                                            </b>
                                            <?php if ($sp["ID_Model"] == 1 | $sp["ID_Model"] == 2 | $sp["ID_Model"] == 3 | $sp["ID_Model"] == 4 | $sp["ID_Model"] == 5 | $sp["ID_Model"] == 6 | $sp["ID_Model"] == 7) {
												echo "Adidas";
											}
											if ($sp["ID_Model"] == 8 | $sp["ID_Model"] == 9 | $sp["ID_Model"] == 10 | $sp["ID_Model"] == 11 | $sp["ID_Model"] == 12 | $sp["ID_Model"] == 13 | $sp["ID_Model"] == 14 | $sp["ID_Model"] == 15) {
												echo "Nike";
											}
											if ($sp["ID_Model"] == 16 | $sp["ID_Model"] == 17 | $sp["ID_Model"] == 18 | $sp["ID_Model"] == 19 | $sp["ID_Model"] == 20) {
												echo "H&M";
											}
											if ($sp["ID_Model"] == 21 | $sp["ID_Model"] == 22 | $sp["ID_Model"] == 23 | $sp["ID_Model"] == 24 | $sp["ID_Model"] == 25) {
												echo "Uniqlo";
											}
											if ($sp["ID_Model"] == 26 | $sp["ID_Model"] == 27 | $sp["ID_Model"] == 28 | $sp["ID_Model"] == 29) {
												echo "Zara";
											}
											if ($sp["ID_Model"] == 30 | $sp["ID_Model"] == 31 | $sp["ID_Model"] == 32 | $sp["ID_Model"] == 33 | $sp["ID_Model"] == 34) {
												echo "Yame";
											}
											?>
                                        </p>
									</form>
                                </div>
                                <!--/product-information-->
                            </div>
                            <?php
							}
							?>
                        </div>

                        <!--/product-details-->

                        <div class="category-tab shop-details-tab">
                            <!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#details" data-toggle="tab">Compare list</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="details">
                                    <?php
										if (isset($_GET["maSP"])) {
											$ProdId = $_GET["maSP"];
											$sp1 = SanPhamBUS::LayDSSanPhamDefault($ProdId);
											$IdModelaa = $sp1['ID_Model'];
											$result = SanPhamBUS::LayDSSanPhamTheoBrand2($IdModelaa);
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
											
                                        ?>
                                    <div class="col-sm-3">

                                        <a href="product-details.php?maSP=<?php echo $row["ID"]; ?>" target="blank">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="images/shop/<?php echo $row['Image']; ?>"
                                                            width="100px" alt="" />
                                                        <h2>$<?php echo $row['Price']; ?></h2>
                                                        <p><?php echo $row['Name']; ?></p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <?php
												}
											}
										}
										?>
                                </div>
                            </div>
                        </div>
                        <!--/category-tab-->
                      

                    </div>
                </div>
            </div>
            </div>

        </section>


        <div class="clearfix"></div>
        <footer id="footer">
            <!--Footer-->
            <?php
			include "Footer.php"
			?>
            <!--/Footer-->
</body>

</html>