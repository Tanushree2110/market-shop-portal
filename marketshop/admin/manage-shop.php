<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {
        $shopID = $_POST['shopID'];
        $shopID=addslashes($shopID);
        $location = $_POST['location'];
        $locaton=addslashes($location);
        $licVal = $_POST['licVal'];
        $licVal=addslashes($licVal);
        $licExt = $_POST['licExt'];
        $licExt=addslashes($licExt);
        $shopName = $_POST['shopName'];
        $shopName=addslashes($shopName);
        $remark = $_POST['remark'];
        $remark=addslashes($remark);
        $contact = $_POST['contact'];
        $contact= addslashes($contact);
        $sql = mysqli_query($con, "insert into shop values('$shopID','$location','$licVal','$licExt','$contact','$shopName','$remark')");
        if (mysqli_errno($con) == 1062) {
            $_SESSION['msg'] = 'Failed to add shop. Possible error: Duplicate shop Id';
        } else {
            $_SESSION['msg'] = "Shop added!";
        }
    }
    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from shop where shopID = '" . $_GET['shopID'] . "'");
        $_SESSION['delmsg'] = "Shop removed!";
    }
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Manage Shops</title>
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
                                    <h3 style="color:white; text-shadow:none;">Add Shop</h3>
                                </div>
                                <div class="module-body" style="background:azure;padding:30px">
                                    <?php if (isset($_POST['submit'])) {
                                        if ($_SESSION['msg'] == "Shop added!") { ?>
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

                                    <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong></strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>
                                    <br />

                                    <form class="form-horizontal row-fluid" name="shop" method="post" action="manage-shop.php">

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shop Id<span class="error" style="color:red;">*</span></label>
                                            <div class="controls">
                                                <input type="text" placeholder="Shop Id" name="shopID" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shop Name<span class="error" style="color:red;">*</span></label>
                                            <div class="controls">
                                                <input type="text" placeholder="Shop Name" name="shopName" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Location<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input type="text" placeholder="Location" name="location" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">License expiry date<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input placeholder="License expiry date" name="licVal" class="span8 tip" type="text" onfocus="(this.type='date')" id="date" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">License extension period<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input type="number" step="any" min="0" placeholder="License extension period" name="licExt" class="span8 tip" style="color:dimgray;" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Contact Number<span class="error" style="color:red;">*</span>
                                            </label>
                                            <div class="controls">
                                                <input type="tel" placeholder="Contact Number" name="contact" class="span8 tip" style="color:dimgray;" pattern="[1-9]{1}[0-9]{9}" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Remarks</label>
                                            <div class="controls">
                                                <textarea class="span8" name="remark" rows="5"></textarea>
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


                            <div class="module">
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Manage Shops</h3>
                                </div>
                                <div class="module-body table" style="background:azure;">
                                    <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Shop Id</th>
                                                <th width=15%>Shop Name</th>
                                                <th width=15%>Contact</th>
                                                <th width=20%>Location</th>
                                                <th width=15%>licVal</th>
                                                <th width=10%>licExt</th>
                                                <th width=15%>Remarks</th>
                                                <th width=15%>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $query = mysqli_query($con, "select * from shop ORDER BY shopID");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $date=$row['licVal'];
                                                $datec=strtotime($date);
                                                $final=date('d/m/Y',$datec);
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row['shopID']); ?></td>
                                                    <td><?php echo htmlentities($row['shopName']); ?></td>
                                                    <td><?php echo htmlentities($row['contact']); ?></td>
                                                    <td><?php echo htmlentities($row['location']); ?></td>
                                                    <td><?php echo htmlentities($final); ?></td>
                                                    <td> <?php echo htmlentities($row['licExt']); ?></td>
                                                    <td><?php echo htmlentities($row['remark']); ?></td>
                                                    <td>
                                                        <a href="edit-shop-details.php?shopID=<?php echo $row['shopID'] ?>" title="Edit shop details"><i class="icon-edit"></i></a>&emsp;
                                                        <a href="manage-shop.php?shopID=<?php echo $row['shopID'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i></a>
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