<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {
        $shopID = $_POST['shopName'];
        $dueType = $_POST['dueType'];
        $dueAmount = $_POST['dueAmount'];
        $dueDate = $_POST['dueDate'];
        $status = 'Pending';
        $sql = mysqli_query($con, "insert into dues value(NULL,'$shopID','$dueAmount','$dueDate','$dueType','$status')");
        if ($sql)
            $_SESSION['msg'] = "Due added successfully!";
        else
            $_SESSION['msg'] = "Failed to add dues!";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Insert Product</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

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
        <?php include('header.php'); ?>

        <div style="padding:90px">
            <div class="container">
                <div class="row">
                    <?php include('sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Add Dues</h3>
                                </div>
                                <div class="module-body" style="background:azure;padding:30px">

                                    <?php if (isset($_POST['submit'])) {
                                        if ($_SESSION['msg'] == "Due added successfully!") { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-error">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?>
                                            </div>
                                    <?php }
                                    } ?>

                                    <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <br />

                                    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data" id="frm">

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Shop Name<span class="error" style="color:red;">*</span></label>
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
                                            <label class="control-label" for="basicinput">Due Type<span class="error" style="color:red;">*</span></label>
                                            <div class="controls">
                                                <select onchange="changeMe(this)" name="dueType" id="dueType" class="span8 tip" required>
                                                    <option hidden value="">Select Due Type</option>

                                                    <option><?php echo "Electricity"; ?></option>
                                                    <option><?php echo "Rent"; ?></option>
                                                    <option><?php echo "Water"; ?></option>
                                                    <option><?php echo "Miscellaneous"; ?></option>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Due Amount<span class="error" style="color:red;">*</span></label>
                                            <div class="controls">
                                                <input type="number" step="any" min="0" name="dueAmount" placeholder="Enter Due Amount" class="span8 tip" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Due Date<span class="error" style="color:red;">*</span></label>
                                            <div class="controls">
                                                <input placeholder="Due date" name="dueDate" class="span8 tip" type="text" onfocus="(this.type='date')" id="date" required>

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