
<?php
session_start();
include('database.php');
if (strlen($_SESSION['shopkeeperID']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
    $shopkeeperID = $_SESSION['shopkeeperID'];
    $qu = mysqli_query($con, "SELECT * FROM shopkeeper where shopkeeperID='$shopkeeperID'")or die('error');
    $r1 = mysqli_fetch_array($qu);
    $shopID = $r1['shopID'];
    $q = mysqli_query($con, "UPDATE shop SET licReq='Active' WHERE shopID='$shopID'");
    if ($q == 0) {
        echo "<script>alert('Error')</script>";
    }
}
?>

