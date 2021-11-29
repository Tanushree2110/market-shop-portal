<?php
session_start();
include('database.php');
if (strlen($_SESSION['shopkeeperID']) == 0) {
    header('location:login.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
    if (isset($_POST['submit'])) {
            $con = mysqli_query($con, "update shopkeeper set password='" . md5($_POST['password']) . "' where shopkeeperID='" . $_SESSION['shopkeeperID'] . "'");   
    }
}
?>
