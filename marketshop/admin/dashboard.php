<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['password']) . "' && email='" . $_SESSION['email'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update admin set password='" . md5($_POST['newpassword']) . "', updationDate=NOW() where email='" . $_SESSION['email'] . "'");
            $_SESSION['msg'] = "Password changed successfully!";
        } else {
            $_SESSION['msg'] = "Please enter correct current password!";
        }
    }
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Change Password</title>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Field is Empty!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Field is Empty !");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Field is Empty!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body style="background:#eee">
        <?php include('header.php');?>
           
        <div style="padding:90px">
            <div class="container">
                <div class="row">
                    <?php include('sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Change Password</h3>
                                </div>
                                <div class="module-body" style="background:azure;">

                                    <?php if (isset($_POST['submit'])) {
                                        if ($_SESSION['msg'] == "Password changed successfully!") { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-error">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                    <?php }
                                    } ?>
                                    <br />

                                    <form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput" style="color: #696969; font-weight:bold">Current Password</label>
                                            <div class="controls">
                                                <input type="password" placeholder="Enter the current password" name="password" class="span8 tip" required>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="basicinput" style="color: #696969; font-weight:bold">New Password</label>
                                            <div class="controls">
                                                <input type="password" placeholder="Enter the new password" name="newpassword" class="span8 tip" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput" style="color: #696969; font-weight:bold">Confirm New Password</label>
                                            <div class="controls">
                                                <input type="password" placeholder="Re-enter the new password" name="confirmpassword" class="span8 tip" required>
                                            </div>
                                        </div>






                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn" style="background:#0074d9; color:white; font-weight:bold; text-shadow:none;">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->




    </body>
<?php } ?>