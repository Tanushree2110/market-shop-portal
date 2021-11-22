<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Payment History</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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

                            <div class="module" >
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Payment History</h3>
                                </div>
                                <div class="module-body table" style="background:azure;">
                                    <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <br />


                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Shop Name</th>
                                                <th>Due Amount</th>
                                                <th style="width:100px;">Due Date</th>
                                                <th>Due Type</th>
                                                <th>Payment Status</th>
                                                <th>Payment Date</th>
                                                <th>Remark</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $status = 'Paid';
                                            $query = mysqli_query($con, "SELECT shop.shopName as shop_name, dues.dueID as id, dues.dueAmount as amt, dues.dueDate as dt, dues.dueType as type, dues.status as st, Payment.dop as dop, Payment.remark as remark FROM dues JOIN shop ON shop.shopID=dues.shopID JOIN Payment ON Payment.dueID=dues.dueID WHERE dues.status='$status' ORDER BY dop DESC");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $date=$row['dt'];
                                                $datec=strtotime($date);
                                                $final=date('d/m/Y',$datec);
                                                $date1=$row['dop'];
                                                $datec1=strtotime($date1);
                                                $final1=date('d/m/Y',$datec1);
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row['shop_name']); ?></td>
                                                    <td><?php echo htmlentities($row['amt']); ?></td>
                                                    <td><?php echo htmlentities($final); ?></td>
                                                    <td><?php echo htmlentities($row['type']); ?></td>
                                                    <td><?php echo htmlentities($row['st']); ?></td>
                                                    <td><?php echo htmlentities($final1); ?></td>
                                                    <td><?php echo htmlentities($row['remark']); ?></td>
                                                    </td>
                                                </tr>

                                            <?php $cnt = $cnt + 1;
                                            } ?>
                                        </tbody>
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