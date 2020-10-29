<?php
ob_start();
session_start(); 
;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile</title>
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
        require_once "BUS\InvoiceBUS.php";
        require_once "BUS\ImageBUS.php";
        require_once "BUS\LoaiSanPhamBUS.php";
		if($_SESSION["user"]){
            if($_SESSION["user"] == true){
                $username = $_SESSION["user"];
                $result = TaiKhoanBUS::LayThongTinTK($username);
            } 
            $name = $result -> fetch_assoc();
	?>
    <header id="header">
        
        <!--header-->
        <?php
		include "Header.php"
		?>
        <!--/header-->
            
        <hr>
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-3">
                    <h4><?php echo $name["FullName"] ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <!--left col-->
                    <div class="text-center">
                        <?php 
                        $Profileimg = ImageBUS::CheckImage($username);
                        $checkimg = $Profileimg["ProfilePicture"];
                        

                        if($checkimg != ""){
                            ?>
                        <img src="images/ProfilePhoto/<?php echo $checkimg ?>" class="avatar img-circle img-thumbnail"
                            alt="avatar">
                        <?php

                            
                        }else {
                            ?>
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                            class="avatar img-circle img-thumbnail" alt="avatar">
                        <?php
                            

                        }
                    ?>
                        <h6>Upload a different photo...</h6>
                        <form method="POST" action="user.php" enctype="multipart/form-data">
                            <input type="file" name="image" class="text-center center-block file-upload">
                            <button type="submit" name="upload">Save</button>
                        </form>
                        <?php
                        if(isset($_POST["upload"])){                            
                            
                            $filename = $_FILES['image']['name'];
                            $filetmpname = $_FILES['image']['tmp_name'];
                            $folder = 'images/ProfilePhoto/';
                            
                            move_uploaded_file($filetmpname, $folder.$filename);
                            ImageBUS::UpImageBUS($username, $filename);  
                            header("location:user.php");                         
                           
                        } ?>

                    </div>

                    </hr><br>


                    <div class="panel panel-default">
                        <ul class="list-group">
                            <li class="list-group-item text-muted">User</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Account:</strong>
                                </span><?php echo $name["UserName"] ?></li>

                        </ul>
                    </div>
                    <?php 
						if($_SESSION["user"] == true){
                            $username = $_SESSION["user"];
                            $result = TaiKhoanBUS::LayThongTinTK($username); 
                        } 					
							if ($result ->num_rows > 0) {													
							while ($row = $result ->fetch_assoc()) { 
								
                                 
                                 ?>
           
                    <ul class="list-group">
                        <li class="list-group-item text-muted" style="height:40px">Profile <i
                                class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right" style="height:40px"><span class="pull-left"><strong>Full
                                    Name:</strong></span><?php echo $row["FullName"] ?></li>
                        <li class="list-group-item text-right" style="height:40px"><span
                                class="pull-left"><strong>Gender:</strong></span><?php echo $row["Gender"] ?></li>
                        <li class="list-group-item text-right" style="height:40px"><span
                                class="pull-left"><strong>Phone:</strong></span><?php echo $row["PhoneNumber"] ?></li>
                        <li class="list-group-item text-right" style="height:40px"><span
                                class="pull-left"><strong>Email:</strong></span><?php echo $row["Email"] ?></li>
                        <li class="list-group-item text-right" style="height:40px"><span
                                class="pull-left"><strong>Address:</strong></span><?php echo $row["Address"] ?></li>
                    </ul>
                   
                    <?php
                    
							
								}
							}

					?>
                </div>
                <!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Order History</a></li>
                        <li><a data-toggle="tab" href="#messages">Profile Edit</a></li>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <form method="post">
                                <div class="Order-list">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>User Order List : </h4>
                                        </div>
                                        <div class="panel-body">
                                            <?php 
                                             $listinvoice = InvoiceBUS::GetListInvoice($username);
                                             if($listinvoice->num_rows >0){
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Ref. No.</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th># #</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            while ($row =$listinvoice ->fetch_assoc()){
                                                                ?>
                                                        <tr>
                                                            <td>#<?php echo $row["ID"] ?></td>
                                                            <td><?php echo $row["IssuedDate"] ?></td>
                                                            <td><?php echo $row["Total"] ?></td>
                                                            <td><a href="invoice-detail.php?idinvoice=<?php echo $row["ID"]; ?>"
                                                                    name="idcheckout"
                                                                    value="<?php echo $row["ID"] ?>">View</a></td>
                                                        </tr>
                                                        <?php                                                                
                                                            }                                                        
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php 
                                             } else {
                                                ?>
                                            <h4 class="noinvoice">You have no invoice history</h4>
                                            <?php
                                             }
                                        ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- ORDER LIST END-->
                            </form>
                        </div>
                        <!--/tab-pane-->

                        
                        <div class="tab-pane" id="messages">
                        
                            <hr>                             
                
                            <form class="form" method="post" id="registrationForm">
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="firstname">
                                            <h4>Full Name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="fullname" id="fullname"
                                             title="enter your first name if any." value = "<?php echo $name["FullName"] ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Location</h4>
                                        </label>
                                        <input type="text" class="form-control" name="location" id="location"
                                             title="enter a location" value = "<?php echo $name["Address"] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="gender">
                                            <h4>Gender</h4>
                                        </label>
                                        <select name="gender" id="gender" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="phone">
                                            <h4>Phone</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                             title="enter your phone number if any." value = "<?php echo $name["PhoneNumber"] ?>">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                             title="enter your email." value = "<?php echo $name["Email"] ?>">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Password</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            title="enter your password." value = "<?php echo $name["Password"] ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h4>Verify</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2"
                                        value = "<?php echo $name["Password"] ?>"  title="enter your password2.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit" name="update"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i
                                                class="glyphicon glyphicon-repeat"></i>
                                            Reset</button>
                                    </div>
                                </div>

                                <?php 
								if($_SESSION["user"] == true){
                                        $username=$_SESSION["user"];
                                        
									if(isset($_POST["update"])){
										$fullname = $_POST["fullname"];
										$password = $_POST["password"];
										$email = $_POST["email"];
										$phonenumber = $_POST["phone"];
										$address = $_POST["location"];
										$gender = $_POST["gender"];
										$anhminhhoa = "";
										$isadmin = "0";										
										$status = "1";
										
                                        TaiKhoanBUS::SuaThongTin($username, $password, $email, $phonenumber, $address, $fullname, $gender, $isadmin,  $status);
                                        
                                        header("location:user.php");
								}
								
                            }
                            
								

							?>
                            </form>
                        

                        </div>

                    </div>
                    <!--/tab-content-->

                </div>
                <!--/col-9-->
            </div>
            <!--/row-->

        </div>


        <div class="clearfix"></div>
        <footer id="footer">
            <!--Footer-->
            <?php
			include "Footer.php"
			?>
            <!--/Footer-->

            <?php 
		}
		else {
			header("location:login.php");
		}
		?>


            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script type="text/javascript" src="js/gmaps.js"></script>
            <script src="js/contact.js"></script>
            <script src="js/price-range.js"></script>
            <script src="js/jquery.scrollUp.min.js"></script>
            <script src="js/jquery.prettyPhoto.js"></script>
            <script src="js/main.js"></script>
</body>

</html>