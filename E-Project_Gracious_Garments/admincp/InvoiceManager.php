<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Invoice Managerment</title>

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
                    require_once "BUS\InvoiceBUS.php";
                    ?>
                    <div class="container">
                        <h3 id="lblTieuDe">Invoice Managerment</h3>
                        <!-- Form thêm/sửa sản phẩm -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtMaHD">ID</label>
                                        <input id="txtMaHD" class="form-control" type="text" name="maHD" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtUser">ID_Account</label>
                                        <input id="txtUser" class="form-control" type="text" name="User">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtdate">Date</label>
                                        <input id="txtdate" class="form-control" type="datetime" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtname">Full Name</label>
                                        <input id="txtname" class="form-control" type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtdiaChi">Address</label>
                                        <input id="txtdiaChi" class="form-control" type="text" name="diaChi">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtSDT">Phone Address</label>
                                        <input id="txtSDT" class="form-control" type="text" name="SDT">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtTC">Total</label>
                                        <input id="txtTC" class="form-control" type="text" name="TC">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="custom-control custom-checkbox">
                                        <input id="chkTrangThai" class="custom-control-input" type="checkbox" name="trangThai" value="true" checked>
                                        <label for="chkTrangThai" class="custom-control-label">Avaiable</label>
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

                        <!-- Xử lí xóa sản phẩm -->
                        <?php
                        if (isset($_POST["xoa"])) {
                            InvoiceBUS::XoaInvoice($_POST["xoa"]);
                        }
                        ?>

                        <!-- Xử lí thêm sản phẩm -->
                        <?php
                        if (isset($_POST["them"])) {
                            $ID = $_POST["maHD"];
                            $ID_Account = $_POST["User"];
                            $Date = $_POST["date"];
                            $FullName = $_POST["name"];
                            $Address = $_POST["diaChi"];
                            $Phone = $_POST["SDT"];
                            $Total = $_POST["TC"];
                            $trangThai = isset($_POST["trangThai"]) ? 1 : 0;
                            if (!InvoiceBUS::ThemInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $trangThai)) {
                                echo "<script>alert('Failed to add a account');</script>";
                            }
                        }
                        ?>

                        <!-- Xử lí chọn và sửa sản phẩm -->
                        <?php
                        if (isset($_POST["chon"])) {
                            $sp = InvoiceBUS::LayTTInvoice($_POST["chon"]);
                        ?>
                            <script>
                                $("#txtMaHD").val('<?php echo $sp["ID"]; ?>');
                                $("#txtUser").val('<?php echo $sp["ID_Account"]; ?>');
                                $("#txtdate").val('<?php echo $sp["IssuedDate"]; ?>');
                                $("#txtname").val('<?php echo $sp["FullName"]; ?>');
                                $("#txtdiaChi").val('<?php echo $sp["Address"]; ?>');
                                $("#txtSDT").val('<?php echo $sp["PhoneAddress"]; ?>');
                                $("#txtTC").val('<?php echo $sp["Total"]; ?>');
                                $("#chkTrangThai").prop("checked", '<?php echo ($sp["Status"] == 1) ? true : false; ?>');
                                $("#txtMaHD").prop("readonly", "true");
                                $("#btnThem").hide();
                                $("#btnSua").show();
                            </script>
                        <?php
                        }

                        if (isset($_POST["sua"])) {
                            $ID = $_POST["maHD"];
                            $ID_Account = $_POST["User"];
                            $Date = $_POST["date"];
                            $FullName = $_POST["name"];
                            $Address = $_POST["diaChi"];
                            $Phone = $_POST["SDT"];
                            $Total = $_POST["TC"];
                            $trangThai = isset($_POST["trangThai"]) ? 1 : 0;
                            if (!InvoiceBUS::SuaInvoice($ID, $ID_Account, $Date, $FullName, $Address, $Phone, $Total, $trangThai)) {
                                echo "<script>alert('Failed to edit a account');</script>";
                            }
                        }

                        ?>

                        <!-- Xử lí hiển thị danh sách sản phẩm -->
                        <?php
                        $result = InvoiceBUS::LayDSInvoice();
                        if ($result->num_rows > 0) {
                            $i = 1;
                        ?>
                            <form method="post">
                                <table class="table table-light table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Account</th>
                                            <th>Issued Date</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th colspan="2">Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["ID"]; ?></td>
                                                <td><?php echo $row["ID_Account"]; ?></td>
                                                <td><?php echo $row["IssuedDate"]; ?></td>
                                                <td><?php echo $row["FullName"]; ?></td>
                                                <td><?php echo $row["Address"]; ?></td>
                                                <td><?php echo $row["PhoneAddress"]; ?></td>
                                                <td><?php echo $row["Total"]; ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" readonly <?php if ($row["Status"] == 1) echo "checked"; ?>>
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit" name="chon" value="<?php echo $row["ID"]; ?>"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" type="submit" name="xoa" value="<?php echo $row["ID"]; ?>" onclick="return confirm(' Are you sure you want to delete this item?');"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
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