<?php
include 'database.inc.php';
session_start();
$out = $_SESSION['UID'];
echo $_SESSION['UID'];
$sql = "SELECT * FROM time WHERE UID = '$out' AND logged = '1';";
mysqli_query($conn,$sql);
$sql1 = "UPDATE time SET logged = '0', outtime = now() WHERE UID = '$out';";
mysqli_query($conn,$sql1);
header("Location:loginform.php");
session_destroy();
?>