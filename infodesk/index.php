<!DOCTYPE html>
<html>
<head>
	<title>Infodesk</title>
	<?php include 'head.inc.php' ?>
</head>
<body>
<?php 
	include 'database.inc.php';
	include 'core.inc.php';
	if(loggedin()) {
		header('Location: home.php');
	} else {
		include 'loginform.inc.php';
	}
?>
</body>
</html>