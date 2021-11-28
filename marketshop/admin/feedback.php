<?php
session_start();
include('database.php');
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {

    date_default_timezone_set('Asia/Kolkata'); // change according timezone

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Feedback</title>
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

    <body>
        <?php include('header.php'); ?>
        <br><br><br>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php include('sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Yearly Performance Summary</h3>
                                </div>
                                <div class="module-body table" style="background:azure;">

                                    <br />


                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Shop Id</th>
                                                <th>Shop Name</th>
                                                <th>Availability</th>
                                                <th>Services</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $cnt = 1;
                                            $query=mysqli_query($con,"SELECT * FROM shop ORDER BY shopID");
                                            //$query = mysqli_query($con, " SELECT feedback.shopID as sid, shop.shopName as sName, avg(availabilty) as avg1, avg(services) as avg2 FROM feedback JOIN shop ON shop.shopID=feedback.shopID WHERE dof>=DATE_SUB(NOW(),INTERVAL 1 YEAR) GROUP BY feedback.shopID ORDER BY shop.shopID");
                                            while ($row = mysqli_fetch_array($query)) {
                                                $shopID=$row['shopID'];
                                                $query2=mysqli_query($con,"SELECT avg(availability) as avg1, avg(services) as avg2 FROM feedback WHERE dof>=DATE_SUB(NOW(),INTERVAL 1 YEAR) GROUP BY shopID HAVING shopID='$shopID'");
                                                $count=mysqli_num_rows($query2);
                                                if($count>0)
                                                {
                                                    $row2=mysqli_fetch_array($query2);
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($shopID); ?></td>
                                                    <td><?php echo htmlentities($row['shopName']); ?></td>
                                                    <td><?php echo htmlentities($row2['avg1']); ?></td>
                                                    <td><?php echo htmlentities($row2['avg2']); ?></td>
                                                    </td>
                                                </tr>

                                            <?php
                                            } else { ?>
                                                    <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($shopID); ?></td>
                                                    <td><?php echo htmlentities($row['shopName']); ?></td>
                                                    <td><?php echo htmlentities("NA"); ?></td>
                                                    <td><?php echo htmlentities("NA"); ?></td>
                                                    </td>
                                                    </tr>
                                            <?php }$cnt = $cnt + 1;}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="module">
                                <div class="module-head" style="background:#0074d9;">
                                    <h3 style="color:white; text-shadow:none;">Performance Feedback</h3>
                                </div>
                                <div class="module-body table" style="background:azure;">

                                    <br />


                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Shop Id</th>
                                                <th>Shop Name</th>
                                                <th>Date of feedback</th>
                                                <th>Availability</th>
                                                <th>Services</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT feedback.shopID, shop.shopName, feedback.availability, feedback.dof, feedback.services, feedback.description FROM feedback JOIN shop ON feedback.shopID=shop.shopID ORDER BY dof DESC");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $date=$row['dof'];
                                                $datec=strtotime($date);
                                                $final=date('d/m/Y H:i:s',$datec);
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row['shopID']); ?></td>
                                                    <td><?php echo htmlentities($row['shopName']); ?></td>
                                                    <td><?php echo htmlentities($final); ?></td>
                                                    <td><?php echo htmlentities($row['availability']); ?></td>
                                                    <td><?php echo htmlentities($row['services']); ?></td>
                                                    <td><?php echo htmlentities($row['description']); ?></td>
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
<?php
} ?>