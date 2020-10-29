<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Account Manager</title>

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
     <link href="assets/img/favicon.png" rel="shortcut icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
     <link href="assets/img/favicon.png" rel="shortcut icon" />
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />



    <!-- FAVICON -->
   

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="assets/plugins/nprogress/nprogress.js"></script>
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
    
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    
  
    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <?php include_once "left-bar.php" ?>



        <div class="page-wrapper">
            <!-- Header -->
            <?php include_once "header.php" ?>


            <div class="content-wrapper">
                <div class="content">
                    <!--Content -->
                    <?php require_once "BUS\TaiKhoanBUS.php"; ?>
               
                    <div class="container">
                        <h3 id="lblTieuDe">Account Managerment</h3>
                        <div id="divThemTK">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="txtTenTK">UserName</label>
                                            <input id="txtTenTK" class="form-control" type="text" name="tenTK" required>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="txtMK">Password</label>
                                            <input id="txtMK" class="form-control" type="password" name="mk">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="txtEmail">Email</label>
                                            <input id="txtEmail" class="form-control" type="text" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="txtSDT">Phone Number</label>
                                            <input id="txtSDT" class="form-control" type="text" name="sdt">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="txtDiaChi">Address</label>
                                            <input id="txtDiaChi" class="form-control" type="text" name="diaChi">
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="txtHoTen">Full Name</label>
                                            <input id="txtHoTen" class="form-control" type="text" name="hoTen">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gioiTinh" id="chkgioi" value="Male" checked>
                                                Male<br>
                                                <input type="radio" class="form-check-input" name="gioiTinh" id="chkgioi" value="Female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="custom-control custom-checkbox">
                                            <input id="chkLaAdmin" class="custom-control-input" type="checkbox" name="laAdmin" value="true">
                                            <label for="chkLaAdmin" class="custom-control-label">Is Admin</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="custom-control custom-checkbox">
                                            <input id="chkTrangThai" class="custom-control-input" type="checkbox" name="trangThai" value="true" checked>
                                            <label for="chkTrangThai" class="custom-control-label">Activity</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md">
                                        <div class="custom-file">
                                            <input id="filAnhDaiDien" class="custom-file-input" type="file" name="anhDaiDien">
                                            <label for="filAnhDaiDien" class="custom-file-label">Avatar</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <button id="btnThem" class="btn btn-success" type="submit" name="them"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                        <button id="btnSua" class="btn btn-success" type="submit" name="sua"><i class="fa fa-check" aria-hidden="true"></i>Update</button>
                                        <button class="btn btn-danger" type="reset" onclick="this.form.submit();"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
                                        <script>
                                            $("#btnThem").show();
                                            $("#btnSua").hide();
                                        </script>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Xử lí xóa tài khoản -->
                        <?php
                        if (isset($_POST["xoa"])) {
                            TaiKhoanBUS::XoaTK($_POST["xoa"]);
                        }
                        ?>

                        <!-- Xử lí thêm tài khoản -->
                        <?php
                        if (isset($_POST["them"])) {
                            $tenTK = $_POST["tenTK"];
                            $mk = $_POST["mk"];
                            $email = $_POST["email"];
                            $sdt = $_POST["sdt"];
                            $diaChi = $_POST["diaChi"];
                            $hoTen = $_POST["hoTen"];
                            $gioiTinh = $_POST["gioiTinh"];
                            $laAdmin = isset($_POST["laAdmin"]) ? 1 : 0;
                            $trangThai = isset($_POST["trangThai"]) ? 1 : 0;

                            // Xử lí upload ảnh đại diện
                            $error = "";
                            if ($_FILES["anhDaiDien"]["name"] != "") {
                                $anhDaiDien = $tenTK . ".jpg";
                                $path = "../images/profilephoto/" . $anhDaiDien;

                                // Kiểm tra file có phải là file ảnh hay không
                                $check = getimagesize($_FILES["anhDaiDien"]["tmp_name"]);
                                if ($check == false) {
                                    $error .= "The selected file is not an image. ";
                                }

                                // Kiểm tra dung lượng (tính bằng byte)
                                if ($_FILES["anhDaiDien"]["size"] > 1024 * 1024) {
                                    $error .= "File is too large. Please select a file smaller than 1 MB. ";
                                }

                                // Kiểm tra phần mở rộng của file
                                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
                                    $error .= "Only upload file JPG, JPEG, PNG and GIF. ";
                                }
                            } else {
                                $anhDaiDien = NULL;
                            }

                            // Upload file ảnh
                            if ($error == "") {
                                if (isset($path)) {
                                    move_uploaded_file($_FILES["anhDaiDien"]["tmp_name"], $path);
                                }
                                if (!TaiKhoanBUS::ThemTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai)) {
                                    echo "<script>alert('Failed to add a account');</script>";
                                }
                            } else {
                                echo "<script>alert('" . $error . "');</script>";
                            }
                        }
                        ?>

                        <!-- Xử lí chọn và sửa tài khoản -->
                        <?php
                        if (isset($_POST["chon"])) {
                            $tk = TaiKhoanBUS::LayTTTK($_POST["chon"]);
                        ?>
                            <script>
                                $("#txtTenTK").val('<?php echo $tk["UserName"]; ?>');
                                $("#txtEmail").val('<?php echo $tk["Email"]; ?>');
                                $("#txtSDT").val('<?php echo $tk["PhoneNumber"]; ?>');
                                $("#txtDiaChi").val('<?php echo $tk["Address"]; ?>');
                                $("#txtHoTen").val('<?php echo $tk["FullName"]; ?>');
                                $("#chkgioi").prop("checked", '<?php echo ($tk["Gender"] )?>');
                                $("#chkLaAdmin").prop("checked", '<?php echo ($tk["IsAdmin"] == 1) ? true : false; ?>');
                                $("#chkTrangThai").prop("checked", '<?php echo ($tk["Status"] == 1) ? true : false; ?>');
                                $("#txtTenTK").prop("readonly", "true");
                                $("#btnThem").hide();
                                $("#btnSua").show();
                            </script>
                        <?php
                        }

                        if (isset($_POST["sua"])) {
                            $tenTK = $_POST["tenTK"];
                            $mk = $_POST["mk"] == "" ? TaiKhoanBUS::LayTTTK($tenTK)["Password"] : $_POST["mk"];
                            $email = $_POST["email"];
                            $sdt = $_POST["sdt"];
                            $diaChi = $_POST["diaChi"];
                            $hoTen = $_POST["hoTen"];
                            $gioiTinh = $_POST["gioiTinh"];
                            $laAdmin = isset($_POST["laAdmin"]) ? 1 : 0;
                            $trangThai = isset($_POST["trangThai"]) ? 1 : 0;

                            // Xử lí upload ảnh đại diện
                            $error = "";
                            if ($_FILES["anhDaiDien"]["name"] != "") {
                                $anhDaiDien = $tenTK . ".jpg";
                                $path = "../images/profilephoto/" . $anhDaiDien;

                                // Kiểm tra file có phải là file ảnh hay không
                                $check = getimagesize($_FILES["anhDaiDien"]["tmp_name"]);
                                if ($check == false) {
                                    $error .= "The selected file is not an image. ";
                                }

                                // Kiểm tra dung lượng (tính bằng byte)
                                if ($_FILES["anhDaiDien"]["size"] > 1024 * 1024) {
                                    $error .= "File is too large. Please select a file smaller than 1 MB. . ";
                                }

                                // Kiểm tra phần mở rộng của file
                                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
                                    $error .= "Only upload file JPG, JPEG, PNG and GIF. ";
                                }
                            } else {
                                $anhDaiDien = TaiKhoanBUS::LayTTTK($tenTK)["ProfilePicture"];
                            }

                            // Upload file ảnh
                            if ($error == "") {
                                if (isset($path)) {
                                    move_uploaded_file($_FILES["anhDaiDien"]["tmp_name"], $path);
                                }
                                if (!TaiKhoanBUS::SuaTK($tenTK, $mk, $email, $sdt, $diaChi, $hoTen, $gioiTinh, $laAdmin, $anhDaiDien, $trangThai)) {
                                    echo "<script>alert('Failed to edit a account');</script>";
                                }
                            } else {
                                echo "<script>alert('" . $error . "');</script>";
                            }
                        }
                        ?>

                        <!-- Xử lí hiển thị danh sách tài khoản -->
                        <?php
                        $result = TaiKhoanBUS::LayDSTK();
                        if ($result->num_rows > 0) {
                            $i = 1;
                        ?>

                            <form method="post">
                                <table class="table table-light table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Avatar</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Is admin</th>
                                            <th>Status</th>
                                            <th colspan="2">Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><img class="img-thumbnail" style="width: 100px;" src="../images/ProfilePhoto/<?php echo $row["ProfilePicture"]; ?>" alt=""></td>
                                                <td><?php echo $row["UserName"]; ?></td>
                                                <td><?php echo $row["Email"]; ?></td>
                                                <td><?php echo $row["PhoneNumber"]; ?></td>
                                                <td><?php echo $row["Address"]; ?></td>
                                                <td><?php echo $row["FullName"]; ?></td>
                                                <td><?php echo $row["Gender"]; ?></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" readonly <?php if ($row["IsAdmin"] == 1) echo "checked"; ?>>
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" readonly <?php if ($row["Status"] == 1) echo "checked"; ?>>
                                                        <label class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit" name="chon" value="<?php echo $row["UserName"]; ?>"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger" type="submit" name="xoa" value="<?php echo $row["UserName"]; ?>" onclick="return confirm(' Are you sure you want to delete this item? ');"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
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