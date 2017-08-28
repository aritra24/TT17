<?php
	session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];
	
	function loggedin() {
		if(isset($_SESSION['user']) && !empty($_SESSION['user']))
			return true;
		 else 
			return false;
	}
?>