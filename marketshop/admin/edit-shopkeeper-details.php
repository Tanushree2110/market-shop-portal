<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    $shopkeeperID = strval($_GET['shopkeeperID']);
    if (isset($_POST['submit'])) {
        $secPassVal = $_POST['secPassVal'];
        $address = $_POST['address'];
        $address = addslashes($address);
        $name = $_POST['name'];
        $name = addslashes($name);
        $contact = $_POST['contact'];
        $sql = mysqli_query($con, "update shopkeeper set name='$name', address='$address',secPassVal='$secPassVal', contact='$contact' where shopkeeperID='$shopkeeperID'");
        if ($sql) {
            $_SESSION['msg'] = "Shopkeeper details updated successfully!";
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
        <title>Admin| Edit Shopkeeper Details</title>
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
                            <div class="module" >
                                <div class="module-head" style="background:#24a0ed;">
                                    <h3 style="color:white; text-shadow:none;">Edit Shopkeeper Details</h3>
                                </div>
                                <div class="module-body" style="background:azure; padding:30px">
                                    <?php if (isset($_POST['submit'])) {
                                        if ($_SESSION['msg'] == "Shopkeeper details updated successfully!") { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                        <?php } else ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        </div>
                                    <?php } ?>
                                    <br />
                                    <form class="form-horizontal row-fluid" name="edit_shopkeeper_details" method="post">
                                        <?php
                                        $query = mysqli_query($con, "select * from shopkeeper where shopkeeperID='$shopkeeperID'");
                                        $row = mysqli_fetch_array($query);
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Name</label>
                                            <div class="controls">
                                                <input type="text" class="span8 tip" name="name" value="<?php echo  htmlentities($row['name']); ?>" style="color:dimgray;" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Address</label>
                                            <div class="controls">
                                                <input type="text" class="span8 tip" name="address" value="<?php echo  htmlentities($row['address']); ?>" style="color:dimgray;" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Security pass validity
                                            </label>
                                            <div class="controls">
                                                <input placeholder="Security pass validity" name="secPassVal" value="<?php echo  htmlentities($row['secPassVal']); ?>" class="span8 tip" type="text" onfocus="(this.type='date')" id="date" style="color:dimgray;" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Contact Number
                                            </label>
                                            <div class="controls">
                                                <input type="number" placeholder="Contact Number" name="contact" value="<?php echo  htmlentities($row['contact']); ?>" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn" style="background:#0074d9; color:white; font-weight:bold; text-shadow:none;">Update</button>
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