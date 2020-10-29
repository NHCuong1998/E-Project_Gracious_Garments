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
    <title>Login | E-Shopper</title>
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
    include "Header.php";
    ?>
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form method="post" action="#">
                            <?php
                            if (isset($_POST["username-DN"])) {
                                // Lấy thông tin người dùng submit
                                $username = $_POST["username-DN"];
                                $mk = $_POST["mk-DN"];

                                // Kiểm tra đăng nhập
                                if (TaiKhoanBUS::DangNhap($username, $mk)) {
                                    $_SESSION["user"] = $username;
                                    header("Location: index.php");
                                } else {
                                    echo "Wrong password or name does not exist. Please try again. ";
                                }
                            ?>
                                <input type="text" placeholder="Name" name="username-DN" />
                                <input type="password" placeholder="Password" name="mk-DN" />
                                <span>
                                    <input type="checkbox" class="checkbox">
                                    Keep me signed in
                                </span>
                                <button type="submit" class="btn btn-default">Login</button>
                            <?php
                            } else {
                            ?>
                                <input type="text" placeholder="Name" name="username-DN" />
                                <input type="password" placeholder="Password" name="mk-DN" />
                                <span>
                                    <input type="checkbox" class="checkbox">
                                    Keep me signed in
                                </span>
                                <button type="submit" class="btn btn-default">Login</button>
                            <?php
                            }
                            ?>

                        </form>
                    </div>
                    <!--/login form-->
                </div>

                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4 clearfix pull-right">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="post">
                            <?php
                            if (isset($_POST["username"])) {
                                // Lấy thông tin người dùng submit
                                $username = $_POST["username"];
                                $mk = $_POST["mk"];
                                $mk1 = $_POST["mk1"];
                                $email = $_POST["email"];
                                if($mk1 == $mk){
                                // Đăng kí tài khoản
                                if (TaiKhoanBUS::ThemTK($username, $mk, $email, '', '', '', '', 0, '', 1)) {
                                    echo "Regist Successfully!";
                                } else {
                                    echo "Regist Unsuccessfully!";
                                }
                                } else{
                                    echo "Password incorrect";
                                    ?>
                                    <input type="text" placeholder="Name" name="username" />
                                <input type="email" placeholder="Email Address" name="email" />
                                <input type="password" placeholder="Password" name="mk" />
                                <input type="password" placeholder="Re-enter Password " name="mk1" />
                                <button type="submit" class="btn btn-default">Signup</button>
                                    <?php
                                }
                            } else {
                            ?>
                                <input type="text" placeholder="Name" name="username" />
                                <input type="email" placeholder="Email Address" name="email" />
                                <input type="password" placeholder="Password" name="mk" />
                                <input type="password" placeholder="Re-enter Password " name="mk1" />
                                <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    <?php
                            }
                    ?>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->


    <div class="clearfix"></div>
    <!--Footer-->
    <?php include "Footer.php" ?>


    <script src="js/jquery.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>