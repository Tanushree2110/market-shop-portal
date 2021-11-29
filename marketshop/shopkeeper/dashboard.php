<?php
session_start();
include('database.php');
if (strlen($_SESSION['shopkeeperID']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Shopkeeper Dashboard</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <style>
            .form-control:focus {
                box-shadow: none;
                border-color: #BA68C8
            }

            .profile-button {
                background: rgb(99, 39, 120);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                background: #682773
            }

            .profile-button:focus {
                background: #682773;
                box-shadow: none
            }

            .profile-button:active {
                background: #682773;
                box-shadow: none
            }

            .back:hover {
                color: #682773;
                cursor: pointer
            }

            .labels {
                font-size: 11px
            }

            .add-experience:hover {
                background: #BA68C8;
                color: #fff;
                cursor: pointer;
                border: solid 1px #BA68C8
            }

            .alert2 {
                padding: 20px;
                background-color: #f44336;
                /* Red */
                color: white;
                margin-bottom: 15px;
            }

            input[name="submit3"] {
                background: none;
                border: none;
                outline: none;
                text-decoration: none;
                color: yellow;
                cursor: pointer;

            }

            input[name="submit3"]:hover {
                color: lightblue;
            }
        </style>



    </head>

    <body>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo"><a href="dashboard.php">Dashboard </a></h1>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#profile">Profile</a></li>
                        <li><a class="nav-link scrollto" href="#update">Update Profile</a></li>
                        <li><a class="nav-link scrollto " href="#change">Change Password</a></li>
                        <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle" style="color:blue;"></i>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->
        <!-- ======= Dashboard ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Welcome <?php $shopkeeperID = $_SESSION['shopkeeperID'];
                                    $ret = mysqli_query($con, "SELECT * FROM shopkeeper WHERE shopkeeperID='$shopkeeperID'");
                                    $row = mysqli_fetch_array($ret);
                                    echo htmlentities($row['name']); ?></h1>
                        <br><br>
                        <div class="d-flex">
                            <a href="#profile" class="btn-get-started scrollto" style="background:blue; color:white;">Profile</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section>
        <br><br><br><br>

        <main id="main">
            <!-- ======= Profile Section ======= -->
            <section id="profile" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="assets/img/about.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>Profile Details</h3>
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td colspan="2">
                                        <hr />
                                    </td>
                                </tr>
                                <?php
                                $shopkeeperID = $_SESSION['shopkeeperID'];
                                $query = mysqli_query($con, "SELECT * FROM shopkeeper WHERE shopkeeperID='$shopkeeperID'");
                                $row = mysqli_fetch_array($query);
                                $shopID = $row['shopID'];
                                $sql = mysqli_query($con, "SELECT shopName FROM shop WHERE shopID='$shopID'");
                                $ret = mysqli_fetch_array($sql);
                                ?>
                                <tr height="20">
                                    <td><b>Shopkeeper Id:</b></td>
                                    <td><?php echo $row['shopkeeperID']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Shopkeeper Name:</b></td>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Shop Id:</b></td>
                                    <td><?php echo $row['shopID']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Shop Name:</b></td>
                                    <td><?php echo $ret['shopName']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Security Pass Validity:</b></td>
                                    <td><?php echo $row['secPassVal']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Address:</b></td>
                                    <td><?php echo $row['address']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Contact:</b></td>
                                    <td><?php echo $row['contact']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Gender:</b></td>
                                    <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td><b>Role:</b></td>
                                    <td><?php echo $row['role']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                    $sql = mysqli_query($con, "SELECT secPassVal as dt, DATEDIFF(secPassVal,CURRENT_TIMESTAMP()) as diff, secReq as req FROM shopkeeper where shopkeeperID='$shopkeeperID'");
                    $row = mysqli_fetch_array($sql);
                    $date = $row['dt'];
                    $datec = strtotime($date);
                    $final = date('d/m/Y', $datec);
                    if ($row['diff'] < 0 and $row['req'] == 'Inactive') { ?>

                        <div class="alert2" id="expire2">
                            <div style="display: flex;flex-flow: row wrap;">
                                <form method="post">Your security pass has expired. Click<input type="submit" id="submit4" name="submit3" value="here"></form> to request pass renewal.
                            </div>
                        </div>

                    <?php } elseif ($row['diff'] <= 10 and $row['req'] == 'Inactive') { ?>

                        <div class="alert2" id="expire2">
                            <div style="display: flex;flex-flow: row wrap;">
                                <form method="post">Your security pass will expire on <?php echo htmlentities($final); ?>. Click<input type="submit" id="submit4" name="submit3" value="here"></form> to request pass renewal.
                            </div>
                        </div>

                    <?php } elseif ($row['req'] == 'Active') { ?>

                        <div class="alert2" id="requested2" style="background-color:orange;">
                            <div style="display: flex;flex-flow: row wrap;">
                                <marquee behavior="alternate">Your security pass renewal request has been submitted successfully. Any updates will be reflected here.</marquee>
                            </div>
                        </div>
                    <?php } elseif ($row['req'] == 'Rejected') { ?>
                        <div class="alert2" id="rejected2">
                            <div style="display: flex;flex-flow: row wrap;">
                                <form method="post">Your security pass renewal request has been rejected. Click<input type="submit" id="submit5" name="submit3" value="here"></form> to try again or contact the administration.
                            </div>
                        </div>
                    <?php } ?>
                    <div id="msg2"></div>

                </div>
            </section><!-- End Profile Section -->

            <!---Update profile section-->
            <section id="update" class="about">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="assets/img/details-4.png" class="img-fluid" alt=""></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">

                                    <h3 class="text-right" style="color:#5f687b; font-weight:700; font-family:Raleway; font-size:32px;">Update Profile</h3>
                                </div>
                                <div id="success">

                                </div>

                                <div>
                                    <p style="color:dimgrey">You can only edit your address and contact details</p>
                                </div>
                                <?php
                                $shopkeeperID = $_SESSION['shopkeeperID'];
                                $query = mysqli_query($con, "select * from shopkeeper where shopkeeperID='$shopkeeperID'");
                                $row = mysqli_fetch_array($query);
                                ?>
                                <form name="update_profile" method="post">
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label style="font-size:medium;font-weight:bold;color:grey;">Contact</label><input type="number" name="contact" id="contact" class="form-control" placeholder="Contact Number" value="<?php echo  htmlentities($row['contact']); ?>" style="color:dimgray;" required></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label style="font-size:medium;font-weight:bold;color:grey;">Address</label><input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="<?php echo  htmlentities($row['address']); ?>" style="color:dimgray;" required></div>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" style="background:blue;" name="submit" id="submit1" type="submit" onclick="return sendData();">Save Profile</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End update profile Section -->

            <!---Change Password section-->
            <section id="change" class="about">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">

                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">

                                    <h3 class="text-right" style="color:#5f687b; font-weight:700; font-family:Raleway; font-size:32px;">Change Password</h3>
                                </div>
                                <div id="success2">

                                </div>

                                <form name="change_password" method="post">


                                    <div class="row mt-2">
                                        <div class="col-md-6"><label style="font-size:medium;font-weight:bold;color:grey;">New Password</label><input type="password" name="new" id="new" class="form-control" placeholder="New Password" style="color:dimgray;" required></div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6"><label style="font-size:medium;font-weight:bold;color:grey;">Confirm Password</label><input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirm Password" style="color:dimgray;" required></div>
                                    </div>

                                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" style="background:blue;" name="submit" id="submit2" type="submit" onclick="return updatePassword();">Change Password</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="assets/img/details-2.png" class="img-fluid" alt=""></div>
                        </div>
                    </div>
                </div>
            </section><!-- End update profile Section -->




            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script type="text/javascript">
                $('#submit1').click(function() {
                    var contact = document.getElementById('contact').value;
                    var address = document.getElementById('address').value;
                    if (contact == '' || address == '') {
                        alert("Fields cannot be empty");
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "update-profile.php",
                            data: {
                                'contact': contact,
                                'address': address
                            },
                            cache: false,
                            success: function(html) {
                                $('#success').html("<div class='alert alert-success alert-dismissible' role='alert'><span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span><strong>  Success! </strong>Profile updated</div>");
                            }
                        });
                    }
                    return false;
                });
            </script>

            <script type="text/javascript">
                $('#submit4').click(function() {
                    $.ajax({
                        type: "POST",
                        url: "pass-request.php",
                        data: {

                        },
                        cache: false,
                        success: function(html) {
                            var x = document.getElementById("expire2");
                            x.style.display = "none";

                            $('#msg2').html("<div class='alert2' style='background-color:orange;'><div>Your security pass renewal request has been submitted successfully. Any updates will be reflected here.</div></div>");
                        }
                    });
                    return false;
                });
            </script>

            <script type="text/javascript">
                $('#submit5').click(function() {
                    $.ajax({
                        type: "POST",
                        url: "pass-request.php",
                        data: {

                        },
                        cache: false,
                        success: function(html) {

                            var y = document.getElementById("rejected2");
                            y.style.display = "none";
                            $('#msg2').html("<div class='alert2' style='background-color:orange;'><div>Your security pass renewal request has been submitted successfully. Any updates will be reflected here.</div></div>");
                        }
                    });
                    return false;
                });
            </script>

            <script type="text/javascript">
                $('#submit2').click(function() {
                    var newP = document.getElementById('new').value;
                    var confirm = document.getElementById('confirm').value;
                    if (newP == '' || confirm == '') {
                        alert("Fields cannot be empty");
                    } else if (newP != confirm) {
                        alert("New password and confirm password do not match");
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "changePassword.php",
                            data: {
                                'password': newP
                            },
                            cache: false,
                            success: function(html) {
                                $('#success2').html("<div class='alert alert-success alert-dismissible' role='alert'><span type='button' class='close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></span><strong>  Success! </strong>Password updated</div>");
                            }
                        });
                    }
                    return false;
                });
            </script>

            <!-- Vendor JS Files -->
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>
            <script src="assets/vendor/purecounter/purecounter.js"></script>
            <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>

    </body>

    </html><?php } ?>