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
    <title>Cart</title>

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
    require "BUS\CartBUS.php";
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
        <?php
        if ($_SESSION["user"] == true) {
            $username = $_SESSION["user"];
            /* Add Cart */
            if (isset($_POST["addCart"])) {
                $idproduct = $_POST["addCart"];
                CartBUS::AddCart($username, $idproduct, 1);
            }
            if (isset($_POST["reduceCart"])) {
                $idproduct = $_POST["reduceCart"];
                CartBUS::ReduceQuantity($username, $idproduct, 1);
            }
            if (isset($_POST["deleteCart"])) {
                $idproduct = $_POST["deleteCart"];
                CartBUS::DeleteCart($username, $idproduct);
            }
            if (isset($_POST["deleteallcart"])) {
                CartBUS::DeleteAllCart($username);
                header("location:cart.php");
            }
        ?>
            <form action="" method="post">
                <?php
                $username = $_SESSION["user"];
                $result = CartBUS::GetListCart($username);
                if ($result->num_rows > 0) {
                    $sum = 0;
                ?>
                    <section id="cart_items">
                        <div class="container">
                            <div class="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Shopping Cart</li>
                                </ol>
                            </div>
                            <table class="table table-light ">
                                <thead class="tablelist">
                                    <tr class="namelist">
                                        <th>Item</th>
                                        <th>Name Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $sum += $row["Price"] * $row["Quantity"];
                                    ?>
                                            <tr>
                                                <td class="align-middle"><img src="images/shop/<?php echo $row["Image"]; ?>" style="width: 60px;"></td>
                                                <td><?php echo $row["Name"]; ?></td>
                                                <td>
                                                    <button type="submit" name="reduceCart" value="<?php echo $row["ID_Product"] ?>">-</button>
                                                    <input class="quantity_cart" autocomplete="off" name="updatecart" type="text" value="<?php echo $row["Quantity"]; ?>">
                                                    <button type="submit" name="addCart" value="<?php echo $row["ID_Product"] ?>">+</button></td>
                                                <td><?php echo "$" . $row["Price"]; ?></td>
                                                <td><?php echo "$" . $row["Quantity"] * $row["Price"]; ?></td>
                                                <td><button type="submit" name="deleteCart" value="<?php echo $row["ID_Product"] ?>">Delete</button></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot class="tablelist">
                                    <tr class="namelist">
                                        <td colspan="5" class="text-right">Tổng tiền:</td>
                                        <td><?php echo "$" . $sum; ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <button class="btnCheckout" type="submit" name="deleteallcart">Delete Cart</button>
                                    <button class="btnCheckout"><a class href="checkout.php">Checkout</a></button>
                                </div>
                            </div>
                        </div>
                    </section>
            </form>
            <!--/#cart_items-->
        <?php
                } else {
        ?>
            <h4 class="nocart">No products in the cart</h4>
        <?php
                }
        ?>

        <!--/#do_action-->

        <div class="clearfix"></div>
        <footer id="footer" class="footer-cart">
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
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
</body>

</html>