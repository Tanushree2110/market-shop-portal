<?php
session_start();

include_once 'database.php';
if (strlen($_SESSION['email']) == 0) {
    header('location:login.php');
} else {
    $oid = intval($_GET['dueID']);
    if (isset($_POST['submit2'])) {
        $remark = $_POST['remark']; //space char
        $dop = $_POST['dop'];
        $query = mysqli_query($con, "insert into payment value('$oid','$dop','$remark')");
        if ($query) {
            echo "<script>alert('Payment status updated successfully. Refresh to view changes.');</script>";
            echo "<script>window.close()</script>";
        } else {
            echo "<script>alert('Failed to update due status.');</script>";
        }
    }

?>
    <script language="javascript" type="text/javascript">
        function f2() {
            window.close();
        }
        ser

        function f3() {
            window.print();
        }
    </script>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Update Dues</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            @media screen and (min-width: 850px) {
                .hello {
                    margin: 180px;
                }
            }

            #button {
                display: inline-block;

            }
        </style>

    </head>

    <body>

        <div class="container">
            <form class="border p-5" method="POST" style="margin-top:5%;margin-bottom:0; background:lavender;">

                <p class="h4 mb-4 text-center" style="color:dimgrey; font-family: sans-serif; font-weight:bold">Update Dues</p>

                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px; text-align:justify">
                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM dues WHERE dueId='$oid'");

                    $row = mysqli_fetch_array($ret);
                    $id = $row['shopID'];
                    $hello = mysqli_query($con, "SELECT * FROM shop WHERE shopID='$id'");
                    $row2 = mysqli_fetch_array($hello);
                    ?>
                    <tr height="20">
                        <td class="fontkink1"><b>Shop Name:</b></td>
                        <td></td>
                        <td class="fontkink"><?php echo $row2['shopName']; ?></td>
                    </tr>

                    <tr height="20">
                        <td class="fontkink1"><b>Due Date:</b></td>
                        <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                        <td class="fontkink"><?php echo $row['dueDate']; ?></td>
                    </tr>
                    <tr height="20">
                        <td class="fontkink1"><b>Due Amount:</b></td>
                        <td></td>
                        <td class="fontkink"><?php echo $row['dueAmount']; ?></td>
                    </tr>
                    <tr height="20">
                        <td class="fontkink1"><b>Due Type:</b></td>
                        <td></td>
                        <td class="fontkink"><?php echo $row['dueType']; ?></td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <hr />
                        </td>
                    </tr>
                    <?php ?>
                </table>

                <input type="date" class="form-control mb-4" name="dop" style="width:300px;" placeholder="Date of payment" required>
                <textarea cols="50" rows="7" name="remark"></textarea>
                <div class="row">
                    <div class="col-sm-12 text-center col-sm-offset-2">
                        <input id="button" class="btn btn-primary btn-block my-4" name="submit2" type="submit" value="Submit" Style="width: 100px;">&emsp;&emsp;&emsp;&emsp;
                        <input id="button" class="btn btn-danger btn-block my-4" name="Submit2" type="submit" value="Close" onClick="return f2();" Style="width: 100px;">
                    </div>
                </div>

            </form>

        </div>
    </body>

    </html>
<?php } ?>