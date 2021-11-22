<?php
session_start();
include('database.php');
$shopkeeperID = strval($_SESSION['shopkeeperID']);
$mobileNo = $_POST['contact'];
$address = $_POST['address'];
$sql = mysqli_query($con, "update shopkeeper set contact='$mobileNo', address='$address' WHERE shopkeeperID='$shopkeeperID'");
?>