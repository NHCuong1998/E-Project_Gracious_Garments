<?php
ob_start();
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Product Manager</title>

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
                        <h3 id="lblTieuDe">Product Managerment</h3>
                        <!-- Form thêm/sửa sản phẩm -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtMaSP">ID</label>
                                        <input id="txtMaSP" class="form-control" type="text" name="maSP" required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtTenSP">Name</label>
                                        <input id="txtTenSP" class="form-control" type="text" name="tenSP">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtThongTin">Description</label>
                                        <input id="txtThongTin" class="form-control" type="text" name="thongTin">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtGiaTien">Price</label>
                                        <input id="txtGiaTien" class="form-control" type="text" name="giaTien" pattern="\d*" title="Chỉ được nhập số">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtSoLuongTonKho">Quantity</label>
                                        <input id="txtSoLuongTonKho" class="form-control" type="number" name="soLuongTonKho">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="cboLoaiSP">ProductType</label>
                                        <select id="cboLoaiSP" class="custom-select" name="maLoaiSP">
                                            <?php
                                            $dsLoaiSP = LoaiSPBUS::LayDSLoai();
                                            if ($dsLoaiSP->num_rows > 0) {
                                                while ($row = $dsLoaiSP->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row["ID"]; ?>"><?php echo $row["Name"]; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                <div class="form-group">
                                        <label for="txtsize">Size</label>
                                        <input id="txtsize" class="form-control" type="text" name="size">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="txtmau">Colour</label>
                                        <input id="txtmau" class="form-control" type="text" name="mau">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="cbomaModel">Model</label>
                                        <select id="cbomaModel" class="custom-select" name="maModel">
                                            <?php
                                            $dsModel = ModelBUS::LayDSModel();
                                            if ($dsModel->num_rows > 0) {
                                                while ($row = $dsModel->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row["ID"]; ?>"><?php echo $row["NameModel"]; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="custom-file">
                                        <input id="filAnhMinhHoa" class="custom-file-input" type="file" name="anhMinhHoa">
                                        <label for="filAnhMinhHoa" class="custom-file-label">Image</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="custom-control custom-checkbox">
                                        <input id="chkTrangThai" class="custom-control-input" type="checkbox" name="trangThai" value="true" checked>
                                        <label for="chkTrangThai" class="custom-control-label">Avaiable</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col-md">
                                        <div class="custom-control custom-checkbox">
                                            <input id="chkTrend" class="custom-control-input" type="checkbox" name="trend" value="true" checked>
                                            <label for="chkTrend" class="custom-control-label">Is Trending</label>
                                        </div>
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
                            SanPhamBUS::XoaSP($_POST["xoa"]);
                        }
                        ?>

                        <!-- Xử lí thêm sản phẩm -->
                        <?php
                        if (isset($_POST["them"])) {
                            $maSP = $_POST["maSP"];
                            $tenSP = $_POST["tenSP"];
                            $thongTin = $_POST["thongTin"];
                            $giaTien = $_POST["giaTien"];
                            $soLuongTonKho = $_POST["soLuongTonKho"];
                            $maLoaiSP = $_POST["maLoaiSP"];
                            $maModel = $_POST["maModel"];
                            $size = $_POST["size"];
                            $mau = $_POST["mau"];
                            $trangThai = isset($_POST["trangThai"]) ? 1 : 0;
                            $laTrend = isset($_POST["trend"]) ? 1 : 0;

                            // Xử lí upload ảnh minh họa
                            $error = "";
                            if ($_FILES["anhMinhHoa"]["name"] != "") {
                                $anhMinhHoa = $maSP . ".jpg";
                                $path = "../images/shop/" . $anhMinhHoa;

                                // Kiểm tra file có phải là file ảnh hay không
                                $check = getimagesize($_FILES["anhMinhHoa"]["tmp_name"]);
                                if ($check == false) {
                                    $error .= "The selected file is not an image.  ";
                                }

                                // Kiểm tra dung lượng (tính bằng byte)
                                if ($_FILES["anhMinhHoa"]["size"] > 3000 * 4500) {
                                    $error .= "File is too large. Please select a file smaller than 5 MB. . ";
                                }

                                // Kiểm tra phần mở rộng của file
                                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
                                    $error .= "Only upload file JPG, JPEG, PNG and GIF. ";
                                }
                            } else {
                                $anhMinhHoa = NULL;
                            }

                            // Upload file ảnh
                            if ($error == "") {
                                if (isset($path)) {
                                    move_uploaded_file($_FILES["anhMinhHoa"]["tmp_name"], $path);
                                }
                                if (!SanPhamBUS::ThemSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend)) {
                                    echo "<script>alert('Failed to add a account');</script>";
                                }
                            } else {
                                echo "<script>alert('" . $error . "');</script>";
                            }
                        }
                        ?>

                       <!-- Xử lí chọn và sửa sản phẩm -->
                       <?php
                        if (isset($_POST["chon"])) {
                            $sp = SanPhamBUS::LayTTSP($_POST["chon"]);
                        ?>
                            <script>
                                $("#txtMaSP").val('<?php echo $sp["ID"]; ?>');
                                $("#txtTenSP").val('<?php echo $sp["Name"]; ?>');
                                $("#txtThongTin").val('<?php echo $sp["Description"]; ?>');
                                $("#txtGiaTien").val('<?php echo $sp["Price"]; ?>');
                                $("#txtSoLuongTonKho").val('<?php echo $sp["Quantity"]; ?>');
                                $("#txtsize").val('<?php echo $sp["Size"]; ?>');
                                $("#txtmau").val('<?php echo $sp["Colour"]; ?>');
                                $("#cboLoaiSP").val('<?php echo $sp["ID_ProductType"]; ?>');
                                $("#cbomaModel").val('<?php echo $sp["ID_Model"]; ?>');
                                $("#chkTrangThai").prop("checked", '<?php echo ($sp["Status"] == 1) ? true : false; ?>');
                                $("#chkTrend").prop("checked", '<?php echo ($sp["IsTrending"] == 1) ? true : false; ?>');
                                $("#txtMaSP").prop("readonly", "true");
                                $("#btnThem").hide();
                                $("#btnSua").show();
                            </script>
                        <?php
                        }

                        if (isset($_POST["sua"])) {
                            $maSP = $_POST["maSP"];
                            $tenSP = $_POST["tenSP"];
                            $thongTin = $_POST["thongTin"];
                            $giaTien = $_POST["giaTien"];
                            $soLuongTonKho = $_POST["soLuongTonKho"];
                            $maLoaiSP = $_POST["maLoaiSP"];
                            $maModel = $_POST["maModel"];
                            $size = $_POST["size"];
                            $mau = $_POST["mau"];
                            $trangThai = isset($_POST["trangThai"]) ? 1 : 0;
                            $laTrend = isset($_POST["trend"]) ? 1 : 0;
                            // Xử lí upload ảnh đại diện
                            $error = "";
                            if ($_FILES["anhMinhHoa"]["name"] != "") {
                                $anhMinhHoa = $maSP . ".jpg";
                                $path = "../images/shop/" . $anhMinhHoa;

                                // Kiểm tra file có phải là file ảnh hay không
                                $check = getimagesize($_FILES["anhMinhHoa"]["tmp_name"]);
                                if ($check == false) {
                                    $error .= "The selected file is not an image. ";
                                }

                                // Kiểm tra dung lượng (tính bằng byte)
                                if ($_FILES["anhMinhHoa"]["size"] > 3000 * 4500) {
                                    $error .= "File is too large. Please select a file smaller than 5 MB. . ";
                                }

                                // Kiểm tra phần mở rộng của file
                                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
                                    $error .= "Only upload file JPG, JPEG, PNG and GIF. ";
                                }
                            } else {
                                $anhMinhHoa = SanPhamBUS::LayTTSP($maSP)["Image"];
                            }

                            // Upload file ảnh
                            if ($error == "") {
                                if (isset($path)) {
                                    move_uploaded_file($_FILES["anhMinhHoa"]["tmp_name"], $path);
                                }
                                if (!SanPhamBUS::SuaSP($maSP, $tenSP, $thongTin, $giaTien, $soLuongTonKho, $maLoaiSP, $maModel, $size, $mau, $anhMinhHoa, $trangThai, $laTrend)) {
                                    echo "<script>alert('Failed to edit a account');</script>";
                                }
                            } else {
                                echo "<script>alert('" . $error . "');</script>";
                            }
                        }
                        ?>


                        <!-- Xử lí hiển thị danh sách sản phẩm -->
                        <?php
                        $result = SanPhamBUS::LayDSSP();
                        if ($result->num_rows > 0) {
                            $i = 1;
                        ?>
                            <form method="post">
                                <table class="table table-light table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Ảnh</th>
                                            <th>Tên SP</th>
                                            <th>Size</th>
                                            <th>Colour</th>
                                            <th>ID ProductType</th>
                                            <th>ID Model</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Tồn kho</th>
                                            <th>Trạng thái</th>
                                            <th>Is Trending</th>
                                            <th colspan="2">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["ID"]; ?></td>
                                                <td><img class="img-thumbnail" style="width: 450px" src="../images/shop/<?php echo $row["Image"]; ?>" alt=""></td>
                                                <td><?php echo $row["Name"]; ?></td>
                                                <td><?php echo $row["Size"]; ?></td>
                                                <td><?php echo $row["Colour"]; ?></td>
                                                <td><?php echo $row["ID_ProductType"]; ?></td>
                                                <td><?php echo $row["ID_Model"]; ?></td>
                                                <td><?php echo $row["Description"]; ?></td>
                                                <td><?php echo number_format($row["Price"]); ?></td>
                                                <td><?php echo $row["Quantity"]; ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" readonly <?php if ($row["Status"] == 1) echo "checked"; ?>>
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" readonly <?php if ($row["IsTrending"] == 1) echo "checked"; ?>>
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit" name="chon" value="<?php echo $row["ID"]; ?>"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" type="submit" name="xoa" value="<?php echo $row["ID"]; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
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
                            echo "CSDL không có sản phẩm";
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