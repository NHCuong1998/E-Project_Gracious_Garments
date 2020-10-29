<header id="header">
    <!--header-->
    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="images/home/logoGG.png" width="150px" height="80px" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-4 clearfix">
                    <div class="logo pull-center">
                        <a href="index.php">
                            <h1>GRACIOUS GARMENT</h1>
                        </a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav"> 
                            <?php 
                                if(isset($_SESSION["user"])){ ?>
                            <li><a href="user.php"><i class="fa fa-user"></i> Account</a>
                                <?php
                                }
                            ?>
                                <form method="post">
                                    <!-- Kiểm tra người dùng đã đăng nhập chưa -->
                                    <?php
                                    if (isset($_SESSION["user"])) {
                                        // Xử lí đăng xuất
                                        if (isset($_POST["signout"])) {
                                            session_unset();
                                            header("Location: index.php");
                                        } else {
                                            if ($_SESSION["user"] == true) {
                                                $username = $_SESSION["user"];
                                                $result = TaiKhoanBUS::LayThongTinTKadmin($username);
                                                if ($result["IsAdmin"] == 1) {
                                                    echo "Hi Admin. Click <a href='admincp/accountmanager.php'>here</a> for managerment.";
                                    ?>
                                                    <button class="btn" name="signout" value="true"><i class="fa fa-times" aria-hidden="true"></i> Log out</button>
                                                <?php
                                                } else {
                                                ?>
                                                    Welcome <?php echo $_SESSION["user"]; ?>
                                                    <button class="btn" name="signout" value="true"><i class="fa fa-times" aria-hidden="true"></i> Log out</button>
                                    <?php
                                                }
                                            } else {
                                                echo "Sign for NOT YET. Click <a href='login.php'>here</a> for sign in.";
                                            }
                                        }
                                    } else {
                                        echo "Sign for NOT YET. Click <a href='login.php'>here</a> for sign in.";
                                    }
                                    ?>
                                </form>
                            </li>
                            <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php 
                            if(isset($_SESSION["user"])){
                                ?>
                                <?php
                            }else{ ?>
                            <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                            <?php 
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <form action="product.php" method="get">
                    <div class="col-sm-9">

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown"><a href="product.php">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                        $result = LoaiSanPhamBUS::LayDSLoaiSP();
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <li><a href="product.php?maLoaiSP=<?php echo $row["ID"]; ?>" target="blank"><?php echo $row["Name"]; ?></a></li>
                                        <?php

                                            }
                                        } else echo "Wrong";

                                        ?>
                                    </ul>
                                </li>

                                <li class="dropdown"><a href="product.php">Brand<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                        $result = LoaiSanPhamBUS::LayDSBrand();
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <li><a href="product.php?maBrand=<?php echo $row["ID"]; ?>" target="blank"><?php echo $row["Name"]; ?></a></li>
                                        <?php

                                            }
                                        } else echo "sai";

                                        ?>
                                    </ul>
                                </li>

                                <li><a href="contact-us.php" target="blank">Contact us</a></li>

                            </ul>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>