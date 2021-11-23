<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
    $shopID = strval($_GET['shopID']);
    if (isset($_POST['submit'])) {
        $shopName = $_POST['shopName'];
        $shopName = addslashes($shopName);
        $licVal = $_POST['licVal'];
        $licExt = $_POST['licExt'];
        $remark = $_POST['remark'];
        $contact = $_POST['contact'];
        $remark = addslashes($remark);
        $sql = mysqli_query($con, "update shop set shopName='$shopName', licVal='$licVal', licExt='$licExt', remark='$remark',contact='$contact' where shopID='$shopID'");
        if ($sql) {
            $_SESSION['msg'] = "Shop details updated successfully!";
        } else {
            $_SESSION['msg'] = "Failed to edit details!";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Edit Shop Details</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    </head>

    <body style="background:#eee">
        <?php include('header.php'); ?>

        <div style="padding:90px">
            <div class="container">
                <div class="row">
                    <?php include('sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Edit Shop Details</h3>
                                </div>
                                <div class="module-body" style="background:azure; padding:30px">

                                    <?php if (isset($_POST['submit'])) {
                                        if ($_SESSION['msg'] == "Shop details updated successfully!") { ?>
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

                                    <form class="form-horizontal row-fluid" name="edit_shop" method="post">
                                        <?php
                                        $query = mysqli_query($con, "select * from shop where shopID='$shopID'");
                                        $row = mysqli_fetch_array($query);
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shop name<span class="error" style="color:red;">*</span></label>
                                            <div class="controls">
                                                <input type="text" placeholder="Shop name" name="shopName" value="<?php echo  htmlentities($row['shopName']); ?>" class="span8 tip" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">License validity<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input placeholder="License expiry date" name="licVal" value="<?php echo  htmlentities($row['licVal']); ?>" class="span8 tip" type="text" onfocus="(this.type='date')" id="date" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">License extension period<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input type="number" step="any" min="0" placeholder="Extension period" name="licExt" value="<?php echo  htmlentities($row['licExt']); ?>" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Contact<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input type="number" min="0" placeholder="Contact number without country code" name="contact" pattern="[1-9]{1}[0-9]{9}" value="<?php echo  htmlentities($row['contact']); ?>" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Remark</label>
                                            <div class="controls">
                                                <textarea class="span8" name="remark" rows="5"><?php echo  htmlentities($row['remark']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button type="submit" name="submit" class="btn" style="background:#0074d9; color:white; font-weight:bold; text-shadow:none;">Update</button><br>
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
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js"></script>

    </body>
<?php } ?>