<?php
session_start();
include("database.php");
$_SESSION['email']="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
session_unset();
$_SESSION['errmsg']="You have successfully logged out";
?>
<script language="javascript">
document.location="login.php";
</script>
