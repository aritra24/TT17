<?php 
	$servername = 'localhost';
	$dbusername = 'root';
	$dbpassword = '';
	$dbname = 'tut17';
	$tablename = 'login';
	$tablename_desk = 'loginDesk';
	$table = 'info';
	$table1 = 'time';

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

	$sql = 'CREATE TABLE ' . $table . ' ( DC INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, FN VARCHAR(20) NOT NULL, LN VARCHAR(20) NOT NULL,EMAIL VARCHAR(30) NOT NULL, REGNO VARCHAR(9) NOT NULL, PHNO VARCHAR(10) NOT NULL, CT VARCHAR(8) NOT NULL);';
	if($conn -> query($sql) === TRUE) {
		echo 'Table ' . $table . ' created<br />';
	} else {
		echo 'Error creating table: ' . $conn -> error . '<br />';
	}

	$sql = 'CREATE TABLE ' . $table1 . ' ( UID VARCHAR(20) NOT NULL,logged INT, intime TIMESTAMP(4),outtime TIMESTAMP(4),sysin TIMESTAMP(4));';
	if($conn -> query($sql) === TRUE) {
		echo 'Table ' . $table . ' created<br />';
	} else {
		echo 'Error creating table: ' . $conn -> error . '<br />';
	}

	$conn -> close();
?>