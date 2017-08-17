<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include 'head.inc.php' ?>
</head>
<body>
<?php
	$navlink = 'logout.php';
	$navname = 'Logout';
	include 'nav.inc.php'; 
?>
<?php
	include 'database.inc.php';
	include 'core.inc.php';
	if(!loggedin()) {
		header('Location: index.php');
	}
?>
<div class="heading">Welcome <?php echo $_SESSION['user']; ?></div>
</body>
</html>