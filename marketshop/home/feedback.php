<?php
session_start();

include 'database.php';
date_default_timezone_set('Asia/Kolkata'); // change according timezone

$shopID = strval($_GET['shopID']);
if (isset($_POST['submit'])) {
    $remark = $_POST['remark']; //space char
    $availability = $_POST['availability'];
    $services = $_POST['services'];
    $query = mysqli_query($con, "insert into feedback value('$shopID','$availability','$services','$remark',NOW())");
    echo "<script>alert('Your feedback has been saved!');</script>";
    echo "<script>window.close()</script>";
}

?>
<script language="javascript" type="text/javascript">
    function f2() {
        window.close();
    }

    function f3() {
        window.print();
    }
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @media screen and (min-width: 850px) {
            form {
                margin: 180px;
            }
        }

        #button {
            display: inline-block;

        }
    </style>
    <script language="javascript" type="text/javascript">
        function f2() {
            window.close();
        }
        ser

        function f3() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="container">
        <form class="border p-5" method="POST" style="margin-top:5%;margin-bottom:0; background:lavender;">

            <p class="h4 mb-4 text-center" style="color:dimgrey; font-family: sans-serif; font-weight:bold">Feedback form</p>

            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:10px; text-align:justify">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM shop WHERE shopID='$shopID'");
                $row = mysqli_fetch_array($ret);
                ?>

                <tr height="20" >
                    <td style="color:grey" class="fontkink1"><b>Shop Id:</b></td>
                    <td></td>
                    <td class="fontkink" style="color:grey" ><?php echo $row['shopID']; ?></td>
                </tr>

                <tr height="20">
                    <td style="color:grey" class="fontkink1"><b>Shop Name:</b></td>
                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                    
                    <td class="fontkink" style="color:grey;" ><?php echo $row['shopName']; ?></td>
                </tr>

                <tr height="20">
                    <td style="color:grey" class="fontkink1"><b>Location:</b></td>
                    <td></td>
                    <td class="fontkink" style="color:grey" ><?php echo $row['location']; ?></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <hr />
                    </td>
                </tr>
                <?php ?>
            </table>

            <input type="number" min="0" max="5" class="form-control mb-4" name="availability" placeholder="Availability" required>

            <input type="number" min="0" max="5" class="form-control mb-4" name="services" placeholder="Services" required>

            <textarea cols="50" rows="7" name="remark"></textarea>
            <div class="row">
                <div class="col-sm-12 text-center col-sm-offset-2">
                    <input id="button" class="btn btn-primary btn-block my-4" name="submit" type="submit" value="Submit" Style="width: 100px;">&emsp;&emsp;&emsp;&emsp;
                    <input id="button" class="btn btn-danger btn-block my-4" name="Submit2" type="submit" value="Close" onClick="return f2();"  Style="width: 100px;">
                </div>
            </div>

        </form>

    </div>


</body>

</html>