<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {

    if(isset($_POST['submit1']))
    {
        $sid=$_POST['shopID'];
        $edt=$_POST['edt'];
        $sql=mysqli_query($con,"Update shop set licReq='Inactive' WHERE shopID='$sid'");
        $sql=mysqli_query($con,"Update shop set licVal='$edt' WHERE shopID='$sid'");
    }
    if(isset($_POST['submit2']))
    {
        $sid=$_POST['shopID'];
        $sql=mysqli_query($con,"Update shop set licReq='Rejected' WHERE shopID='$sid'");
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
                                    <h3 style="color:white; text-shadow:none;">Manage License Agreement Requests</h3>
                                </div>
                                <div class="module-body table" style="background:azure;">
                                    <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th width=15%>Shop Id</th>
                                                <th width=15%>Shop Name</th>
                                                <th width=25%>License Expiry Date</th>
                                                <th width=25%>License extension Period</th>
                                                <th width=40%>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $query = mysqli_query($con, "select * from shop WHERE licReq='Active'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $date = $row['licVal'];
                                                $datec = strtotime($date);
                                                $final = date('d/m/Y', $datec);
                                                $shopID=$row['shopID'];
                                                $ext=$row['licExt'];
                                                $s1=mysqli_query($con,"SELECT calculateExtension('$ext','$date') as dt");
                                                $r1=mysqli_fetch_array($s1);
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($shopID); ?></td>
                                                    <td><?php echo htmlentities($row['shopName']); ?></td>
                                                    <td><?php echo htmlentities($final); ?></td>
                                                    <td> <?php echo htmlentities($ext); ?></td>
                                                    <td>
                                                        <form method="POST"><input type="hidden" name="shopID" value="<?php echo $row['shopID']?>"><input type="hidden" name="edt" value="<?php echo $r1['dt']?>"><button type="submit" id="submit1" value="approve" class="btn btn-success btn-inline my-4" style="width:70px;" name="submit1" onClick="return confirm('The license will be extended to <?php echo htmlentities($r1['dt']); ?> Are you sure you want to approve?');">Approve</button>   <button type="submit" class="btn btn-danger btn-inline my-4" value="reject" style="width:70px;" id="submit2" name="submit2" onClick="return confirm('Are you sure you want to reject the request?');">Reject</button></form>
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