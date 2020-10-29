<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Search</title>

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

    <style>
        tr>td:first-child {
            padding-right: 5px;
        }
    </style>
    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <?php require_once "BUS\SearchBUS.php"; ?>
    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <?php include "left-bar.php" ?>



        <div class="page-wrapper">
            <!-- Header -->
            <?php include "header.php" ?>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <?php include "Left-Bar.php" ?>
                        </div>

                        <div class="col-sm-9 padding-right">
                            <div class="features_items">
                                <form action="" method="get">
                                    <h2 class="title text-center">Result</h2>
                                    <?php
                                    if (isset($_GET['txtSearch'])) {
                                        $nameSearch = $_GET['txtSearch'];
                                        $result = SearchBUS::ShowSearchResult($nameSearch);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                    ?>
                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img src="../images/ProfilePhoto/<?php echo $row['ProfilePicture']; ?>" width="300px" height="350px" alt="" />
                                                                <p><?php echo $row["UserName"]; ?></p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
            </section>

</body>

</html>