<?php
	$servername = 'localhost';
	$dbusername = 'root';
	$dbpassword = '';
	$dbname = 'try';

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	if($conn -> connect_errno) {
		echo 'Sorry. Failed to connect';
	}

	$sql = "INSERT INTO tyr(time) VALUES (now());";	
	if($conn -> query($sql) === TRUE) {
		echo 'UPDATED';
	} else {
		echo $conn -> error;
	}
	$conn -> close();
?>