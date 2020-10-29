<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Model Managerment</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />



    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <style>
        tr>td:first-child {
            padding-right: 5px;
        }
    </style>
    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    
    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <?php include "left-bar.php" ?>



        <div class="page-wrapper">
            <!-- Header -->
            <?php include "header.php" ?>


            <div class="content-wrapper">
                <div class="content">
                    <!--Content -->

                    <?php
                    require_once "BUS\SanPhamBUS.php";
                    require_once "BUS\LoaiSPBUS.php";
                    require_once "BUS\ModelBUS.php";
                    require_once "BUS\LoaiBrandBUS.php";
                    ?>
                    <div class="container">
                        <h3 id="lblTieuDe">Model Managerment</h3>
                        <!-- Form thêm/sửa sản phẩm -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtMaModel">ID</label>
                                        <input id="txtMaModel" class="form-control" type="text" name="maModel" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtTenModel">Name</label>
                                        <input id="txtTenModel" class="form-control" type="text" name="tenModel">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtMaLoai">ID Product Type</label>
                                        <input id="txtMaLoai" class="form-control" type="text" name="maLoai" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtmaBrand">ID Brand</label>
                                        <input id="txtmaBrand" class="form-control" type="text" name="maBrand">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-md">
                                    <button id="btnThem" class="btn btn-success" type="submit" name="them"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                    <button id="btnSua" class="btn btn-success" type="submit" name="sua"><i class="fa fa-check" aria-hidden="true"></i> Edit</button>
                                    <button class="btn btn-danger" type="reset" onclick="this.form.submit();"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
                                    <script>
                                        $("#btnThem").show();
                                        $("#btnSua").hide();
                                    </script>
                                </div>
                            </div>
                        </form>


                        <!-- Xử lí thêm sản phẩm -->
                        <?php
                        if (isset($_POST["them"])) {
                            $maSP = $_POST["maModel"];
                            $tenSP = $_POST["tenModel"];
                            $maType = $_POST["maLoai"];
                            $maBrand = $_POST["maBrand"];
                            if (!ModelBUS::ThemModel($maSP, $tenSP, $maType, $maBrand)) {
                                echo "<script>alert('Failed to add a account');</script>";
                            }
                        }
                        ?>

                        <!-- Xử lí chọn và sửa sản phẩm -->
                        <?php
                        if (isset($_POST["chon"])) {
                            $sp = ModelBUS::LayTTModel($_POST["chon"]);
                        ?>
                            <script>
                                $("#txtMaModel").val('<?php echo $sp["ID"]; ?>');
                                $("#txtTenModel").val('<?php echo $sp["NameModel"]; ?>');
                                $("#txtMaLoai").val('<?php echo $sp["ID_ProductType"]; ?>');
                                $("#txtmaBrand").val('<?php echo $sp["ID_Brand"]; ?>');
                                $("#txtMaBrand").prop("readonly", "true");
                                $("#btnThem").hide();
                                $("#btnSua").show();
                            </script>
                        <?php
                        }

                        if (isset($_POST["sua"])) {
                            $maSP = $_POST["maModel"];
                            $tenSP = $_POST["tenModel"];
                            $maType = $_POST["maLoai"];
                            $maBrand = $_POST["maBrand"];
                            if (!ModelBUS::SuaModel($maSP, $tenSP, $maType, $maBrand)) {
                                echo "<script>alert('Failed to edit a account');</script>";
                            }
                        }

                        ?>

                        <!-- Xử lí hiển thị danh sách sản phẩm -->
                        <?php
                        $result = ModelBUS::LayDSModel();
                        if ($result->num_rows > 0) {
                            $i = 1;
                        ?>
                            <form method="post">
                                <table class="table table-light table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>ID Product Type</th>
                                            <th>ID Brand</th>
                                            <th colspan="2">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["ID"]; ?></td>
                                                <td><?php echo $row["NameModel"]; ?></td>
                                                <td><?php echo $row["ID_ProductType"]; ?></td>
                                                <td><?php echo $row["ID_Brand"]; ?></td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit" name="chon" value="<?php echo $row["ID"]; ?>"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        <?php
                        } else {
                            echo "No data";
                        }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/toaster/toastr.min.js"></script>
    <script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/charts/Chart.min.js"></script>
    <script src="assets/plugins/ladda/spin.min.js"></script>
    <script src="assets/plugins/ladda/ladda.min.js"></script>
    <script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/jekyll-search.min.js"></script>
    <script src="assets/js/sleek.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/date-range.js"></script>
    <script src="assets/js/map.js"></script>
    <script src="assets/js/custom.js"></script>




</body>

</html>