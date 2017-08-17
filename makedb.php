<?php 
	$servername = 'localhost';
	$dbusername = 'root';
	$dbpassword = 'root';
	$dbname = 'tut17';
	$tablename = 'login';
	$tablename_desk = 'loginDesk';

	$conn = new mysqli($servername, $dbusername, $dbpassword);
	if($conn -> connect_error) {
		die('Connection failed: ' . $conn -> connect_error . '<br />');
	} else {
		echo 'Connected to mysql<br />';
	}

	$sql = 'CREATE DATABASE ' . $dbname;
	if($conn -> query($sql) === TRUE) {
		echo 'Databese created <br />';
	} else {
		echo 'Error creating database: <br />' . $conn -> error . '<br />';
	}

	$sql = 'USE ' . $dbname;
	if($conn -> query($sql) === TRUE) {
		echo 'Used database ' . $dbname . '<br />';
	}

	$sql = 'CREATE TABLE ' . $tablename . ' ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, UID VARCHAR(40) NOT NULL, PASS VARCHAR(40) NOT NULL);';
	if($conn -> query($sql) === TRUE) {
		echo 'Table ' . $tablename . ' created<br />';
	} else {
		echo 'Error creating table: ' . $conn -> error . '<br />';
	}
	$sql = 'CREATE TABLE ' . $tablename_desk . ' ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, UID VARCHAR(40) NOT NULL, PASS VARCHAR(40) NOT NULL);';
	if($conn -> query($sql) === TRUE) {
		echo 'Table ' . $tablename_desk . ' created<br />';
	} else {
		echo 'Error creating table: ' . $conn -> error . '<br />';
	}
	$conn -> close();
?>