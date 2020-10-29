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
    <title>Checkout</title>
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
		require_once "BUS\ShippingAddressBUS.php";
		require_once "BUS\CartBUS.php";
        require_once "BUS\InvoiceBUS.php";
        require_once "BUS\LoaiSanPhamBUS.php";
		require_once "BUS\SanPhamBUS.php";

		if(isset($_SESSION["user"])){
			$username = $_SESSION["user"];
	?>
    <header id="header">
        <!--header-->
        <?php
		include "Header.php"
		?>
        <!--/header-->


        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Check out</li>
                    </ol>
                </div>
                <!--/breadcrums-->
                <!--/checkout-options-->
                <form method="post">
                    <?php					
					if(isset($_POST["updateSAddress"]) > 0 ){
						$fullname = $_POST["fullname"];
						$phonenumber = $_POST["phone"];
						$address = $_POST["address"];
						ShippingAddressBUS::AddAddress($username, $fullname, $phonenumber, $address);
						header("location:checkout.php");
					} else {
					if(ShippingAddressBUS::CheckAddress($username)){
						if(isset($_POST["changebillto"]) == true){			
							?>
                    <div class="billto" style="height:550px">
                        <fieldset>
                            <legend>
                                <h4>Bill To</h4>
                            </legend>
                            <table class="tablebillto">
                                <tr class="trbillto">
                                    <td>Full Name:</td>
                                    <td><input class="inpbillto" type="text" name="fullname"></td>
                                </tr>
                                <tr class="trbillto">
                                    <td>Phone Number:</td>
                                    <td><input class="inpbillto" type="text" name="phone"></td>
                                </tr>
                                <tr class="trbillto">
                                    <td>Address:</td>
                                    <td><textarea class="inpbillto" name="address" rows="1"></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                        <button type="submit" name="updateSAddress" value="1">Confilm</button>
                    </div>
                    <?php 
									
									} else {
										?>
                    <div class="shopper-informations">
                        <div class="listbillto" style="height:550px">
                            <?php 
										$listbillto = ShippingAddressBUS::GetAddress($username);
								if($listbillto -> num_rows >0){
									$row = $listbillto -> fetch_assoc()
									?>
                            <ul class="list-group">
                                <li class="list-group-item text-muted">Bill To <i class="fa fa-dashboard fa-1x"></i>
                                </li>
                                <li class="list-group-item text-right" style="height:40px"><span class="pull-left"><strong>Full
                                            Name:</strong></span><?php echo $row["FullName"] ?><input type="hidden"
                                        name="fullname" value="<?php echo $row["FullName"] ?>">
                                </li>
                                <li class="list-group-item text-right" style="height:40px"><span class="pull-left"><strong>Phone
                                            Number:</strong></span><?php echo $row["PhoneNumber"] ?><input type="hidden"
                                        name="phone" value="<?php echo $row["PhoneNumber"] ?>">
                                </li>
                                <li class="list-group-item text-right" style="height:40px"><span
                                        class="pull-left"><strong>Address:</strong></span><?php echo $row["Address"] ?>
                                    <input type="hidden" name="address" value="<?php echo $row["Address"] ?>">
                                </li>
                                <li class="list-group-item text-right"><span class="pull-left">
                                    </span><button type="submit" class="btnbillto" name="changebillto" value="1"><span
                                            class="btnbillto-white">Change</span></button>
                                </li>

                            </ul>
                            <?php									
								}
							?>
                        </div>
                    </div>
                    <?php
									}
					} else {
						if(isset($_POST["changebillto"]) == true){
						
							?>
                    <div class="billto" style="height:1000px">
                        <fieldset>
                            <legend>
                                <h4>Bill To</h4>
                            </legend>
                            <table class="tablebillto">
                                <tr class="trbillto">
                                    <td>Full Name:</td>
                                    <td><input class="inpbillto" type="text" name="fullname"></td>
                                </tr>
                                <tr class="trbillto">
                                    <td>Phone Number:</td>
                                    <td><input class="inpbillto" type="text" name="phone"></td>
                                </tr>
                                <tr class="trbillto">
                                    <td>Address:</td>
                                    <td><textarea class="inpbillto" name="address" rows="1"></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                        <button type="submit" name="updateSAddress" value="1">Confilm</button>
                    </div>
                    <?php 
									
									} else {
										?>
                    <div class="shopper-informations">
                        <div class="listbillto" ">
                            <?php 
								$listbillto = TaiKhoanDAO::LayThongTinTK($username);
								if($listbillto -> num_rows >0){
									$row = $listbillto -> fetch_assoc();
									?>
                            <ul class="list-group">
                                <li class="list-group-item text-muted" style="height:40px">Bill To <i class="fa fa-dashboard fa-1x"></i>
                                </li>
                                <li class="list-group-item text-right" style="height:40px"><span class="pull-left"><strong>Full
                                            Name:</strong></span><?php echo $row["FullName"] ?><input type="hidden"
                                        name="fullname" value="<?php echo $row["FullName"] ?>">
                                </li>
                                <li class="list-group-item text-right" style="height:40px"><span class="pull-left"><strong>Phone
                                            Number:</strong></span><?php echo $row["PhoneNumber"] ?><input type="hidden"
                                        name="phone" value="<?php echo $row["PhoneNumber"] ?>">
                                </li>
                                <li class="list-group-item text-right" style="height:40px"><span
                                        class="pull-left"><strong>Address:</strong></span><?php echo $row["Address"] ?>
                                    <input type="hidden" name="address" value="<?php echo $row["Address"] ?>">
                                </li>
                                <li class="list-group-item text-right" ><span class="pull-left">
                                    </span><button type="submit" class="btnbillto" name="changebillto" value="1"><span
                                            class="btnbillto-white">Change</span></button>
                                </li>

                            </ul>
                            <?php
									
								}
							
							?>
                        </div>
                    </div>
                    <?php
					}
				}				
				?>
                    <div class="review-payment">
                        <h2>Review & Payment</h2>
                    </div>
                    <?php 
						$result = CartBUS::GetListCart($username);
						if($result ->num_rows > 0){
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
                    													
						while ($row = $result ->fetch_assoc()) { 
                        $sum += $row["Price"] * $row["Quantity"];
                    ?>
                            <tr>
                                <td class="align-middle"><img src="images/shop/<?php echo $row["Image"]; ?>"
                                        style="width: 60px;"></td>
                                <td><?php echo $row["Name"]; ?></td>
                                <td><?php echo $row["Quantity"]; ?></td>                                    
                                <td><?php echo "$".$row["Price"]; ?></td>
                                <td><?php echo "$".$row["Quantity"] * $row["Price"]; ?></td>
                            </tr>
                            <?php
						
                    }
                    ?>
                        </tbody>
                        <tfoot class="tablelist">
                            <tr class="namelist">
                                <td colspan="4" class="text-right">Total Money:</td>
                                <td>$<?php echo $sum; ?> <input type="hidden" name="sum" value="<?php echo $sum; ?>">
                                </td>
                            </tr>
                            <tr class="bgorder">
                                <td colspan="5" class="text-right">
                                <button  class="btnorder"><strong><a class="backorder" href="Cart.php">Back Order</a></strong></button>
                                    <button type="submit" name="addorder" class="btnorder"
                                        value="1" onclick="return confirm('You definitely want to buy')";><strong>Order</strong></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
						}						
					}
					if(isset($_POST["addorder"])){						
						$date = date('Y-m-d H:i:s');
						$total = $_POST["sum"];
						$fullname = $_POST["fullname"];
						$phonenumber = $_POST["phone"];
						$address = $_POST["address"];							
						$status = 1;
						
						if(InvoiceBUS::AddInvoice($username, $date, $fullname, $address, $phonenumber, $total, $status))
						{
							$idinvoice = InvoiceBUS::GetInvoiceMax();
							$result = CartBUS::GetListCart($username);
							if($result ->num_rows > 0){																				
								while ($row = $result ->fetch_assoc()) { 
									$idproduct = $row["ID_Product"];
									$nameproduct = $row["Name"];
									$quantity = $row["Quantity"];
									$price = $row["Price"];
									if(InvoiceBUS::AddInvoiceDetail($idinvoice, $idproduct,$nameproduct, $quantity, $price)){
                                        SanPhamBUS::SuaSP_GiamSoLuongTonKho($idproduct, $quantity);
                                    }									
								}
								 
								CartBUS::DeleteAllCart($username);
								?>
                    
                    <?php 
								header("location:index.php");
							}
							
						} else {
							
						}
						
					}
					?>

                </form>
            </div>
        </section>
        <!--/#cart_items-->


        <div class="clearfix"></div>
        <footer id="footer">
            <!--Footer-->
            <?php
			include "Footer.php"
			?>
            <!--/Footer-->
            <?php 
		} else{
			header("location:login.php");
		}
	?>

            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.scrollUp.min.js"></script>
            <script src="js/jquery.prettyPhoto.js"></script>
            <script src="js/main.js"></script>
</body>

</html>