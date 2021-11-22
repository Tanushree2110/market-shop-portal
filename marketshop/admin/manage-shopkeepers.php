<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $shopkeeperID = $_POST['shopkeeperID'];
        $shopID = $_POST['shopName'];
        $name = $_POST['name'];
        $name = addslashes($name);
        $address = $_POST['address'];
        $address = addslashes($address);
        $contact = $_POST['contact'];
        $secPassVal = $_POST['secPassVal'];
        $role = $_POST['role'];
        $gender = $_POST['gender'];
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $passwd = substr(str_shuffle($chars), 0, 8);
        $password=md5($passwd);
        $sql = mysqli_query($con, "insert into shopkeeper values('$shopkeeperID','$name','$contact','$address','$shopID','$gender','$role','$secPassVal','$password')");
        if (mysqli_errno($con) == 1062) {
            $_SESSION['msg'] = 'Failed to add shopkeeper. Possible error: Duplicate shopkeeper Id';
            $_SESSION['pwd']='';
        } else {
            $_SESSION['msg'] = "Shopkeeper added!";
            $_SESSION['pwd']=$passwd;
        }
    }


    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from shopkeeper where shopkeeperID= '" . $_GET['shopkeeperID'] . "'");
        $_SESSION['delmsg'] = "Shopkeeper removed!";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Manage Shopkeepers</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

        <style>
            select {
                color: #ccc;
            }

            option {
                color: dimgray;
            }

            option:first-child {
                color: #ccc;
            }
        </style>

        <script type="text/javascript">
            function changeMe(sel) {
                sel.style.color = "dimgray";
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
                                    <h3 style="color:white; text-shadow:none;">Add Shopkeeper</h3>
                                </div>
                                <div class="module-body" style="background:azure;padding:30px">



                                    <?php if (isset($_POST['submit'])) {
                                        if ($_SESSION['msg'] == "Shopkeeper added!") { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); echo htmlentities(" The generated password is: "); echo htmlentities($_SESSION['pwd']); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-error">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                    <?php }
                                    } ?>



                                    <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong></strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <br />

                                    <form class="form-horizontal row-fluid" name="shopkeeper" method="post" action="manage-shopkeepers.php">

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shopkeeper Id</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Shopkeeper Id" name="shopkeeperID" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shopkeeper Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Name" name="name" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shop Name</label>
                                            <div class="controls">
                                                <select onchange="changeMe(this)" name="shopName" class="span8 tip" id="shopName" required>
                                                    <option hidden value=""> Select Shop</option>
                                                    <?php $query = mysqli_query($con, "select * from shop");
                                                    while ($row = mysqli_fetch_array($query)) { ?>
                                                        <option value="<?php echo $row['shopID']; ?>"><?php echo $row['shopName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Role</label>
                                            <div class="controls">
                                                <select onchange="changeMe(this)" name="role" id="role" class="span8 tip" required>
                                                    <option hidden value="">Select Role</option>

                                                    <option><?php echo "Shop owner"; ?></option>
                                                    <option><?php echo "Shop employee"; ?></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Gender</label>
                                            <div class="controls">
                                                <select onchange="changeMe(this)" name="gender" id="gender" class="span8 tip" required>
                                                    <option hidden value="">Select Gender</option>

                                                    <option><?php echo "Male"; ?></option>
                                                    <option><?php echo "Female"; ?></option>
                                                    <option><?php echo "Other"; ?></option>
                                                    <option><?php echo "Prefer not to say"; ?></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Security Pass validity
                                            </label>
                                            <div class="controls">
                                                <input placeholder="Security Pass Validity" name="secPassVal" class="span8 tip" type="text" onfocus="(this.type='date')" id="date" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Contact Number
                                            </label>
                                            <div class="controls">
                                                <input type="number" placeholder="Contact Number" name="contact" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Address
                                            </label>
                                            <div class="controls">
                                                <input type="text" placeholder="Address" name="address" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn" style="background:#0074d9; color:white; font-weight:bold; text-shadow:none;">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="module" >
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Manage Shopkeepers</h3>
                                </div>
                                <div class="module-body table" style="background:azure;">
                                    <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr">
                                                <th >#</th>
                                                <th style="padding:5px;">Id</th>
                                                <th style="padding:5px;">Name</th>
                                                <th style="padding:5px;">Shop Name</th>
                                                <th style="padding:5px;">Role</th>
                                                <th style="padding:5px;">Gender</th>
                                                <th style="padding:5px;">Security pass validity</th>
                                                <th style="padding:5px;">Contact</th>
                                                <th style="padding:5px;">Address</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $query = mysqli_query($con, "select * from shopkeeper ORDER BY shopID");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $sid = $row['shopID'];
                                                $query2 = mysqli_query($con, "select shopName from shop WHERE shopID='$sid'");
                                                $row2 = mysqli_fetch_array($query2);
                                                $date = $row['secPassVal'];
                                                $datec = strtotime($date);
                                                $final = date('d/m/Y', $datec);
                                            ?>
                                                <tr>
                                                    <td style="padding:5px;"><?php echo htmlentities($cnt); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row['shopkeeperID']); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row['name']); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row2['shopName']); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row['role']); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row['gender']); ?></td>
                                                    <td style="padding:10px;"><?php echo htmlentities($final); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row['contact']); ?></td>
                                                    <td style="padding:5px;"><?php echo htmlentities($row['address']); ?></td>
                                                    <td style="padding:10px;">
                                                        <a href="edit-shopkeeper-details.php?shopkeeperID=<?php echo $row['shopkeeperID'] ?>" title="Edit shopkeeper details"><i class="icon-edit"></i></a>
                                                        <a href="manage-shopkeepers.php?shopkeeperID=<?php echo $row['shopkeeperID'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i></a>
                                                    </td>
                                                    </td>
                                                </tr>
                                            <?php $cnt = $cnt + 1;
                                            } ?>

                                    </table>
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
        <script>
            $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            });
        </script>
    </body>
<?php } ?>