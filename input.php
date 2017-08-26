<?php 
include 'database.inc.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $password = $username_error = $password_error = '';
		$username_desk = $password_desk = $username_desk_error = $password_desk_error = '';
		
		if (isset($_POST['username'])) {
			if(empty($_POST['username'])) {
				$username_error = 'Username is required';
			} else {
				if($_POST['username'] == test_input($_POST['username'])) {
					$username = test_input($_POST['username']);
				} else {
					$username_error = 'Use a different username';
				}
			}
		}
		if (isset($_POST['password'])) {
			if(empty($_POST['password'])) {
				$password_error = 'Password is required';
			} else {
				$password = test_input($_POST['password']);
			}
		}
		if (isset($_POST['username_desk'])) {
			if(empty($_POST['username_desk'])) {
				$username_desk_error = 'Username is required';
			} else {
				if($_POST['username_desk'] == test_input($_POST['username_desk'])) {
					$username_desk = test_input($_POST['username_desk']);
				} else {
					$username_desk_error = 'Use a different username';
				}
			}
		}
		if (isset($_POST['password_desk'])) {
			if(empty($_POST['password_desk'])) {
				$password_desk_error = 'Password is required';
			} else {
				$password_desk = test_input($_POST['password_desk']);
			}
		}
             
		if($username_error == '' && $password_error == '' && $username_desk_error == '' && $password_desk_error == '') {
			$select_statement = $conn -> prepare('SELECT * FROM login WHERE UID = ?');
			$select_statement -> bind_param('s', $username);
			$select_statement -> execute();
			$result = $select_statement -> get_result();
			$row = $result -> fetch_assoc();

			$select_statement_desk = $conn -> prepare('SELECT * FROM loginDesk WHERE UID = ?');
			$select_statement_desk -> bind_param('s', $username_desk);
			$select_statement_desk -> execute();
			$result_desk = $select_statement_desk -> get_result();
			$row_desk = $result_desk -> fetch_assoc();

			if($row == NULL && $row_desk == NULL) {
				$mssg = 'Users not found';
				$username = '';
				$password = '';
				$username_desk = '';
				$password_desk = '';
				//header('Location:loginform.php');
			} else if($row == NULL) {
				$mssg = $username . ' not found';
				$username = '';
				$password = '';
				$username_desk=$_SESSION['username_desk'];
				//header('Location:loginform.php');
			} else if($row_desk == NULL) {
				$mssg = $username_desk . ' not found';
				$username_desk = '';
				$password_desk = '';
				$username = $_SESSION['username'];
				//header('Location:loginform.php');
			} else if(($password) == $row['PASS'] && ($password_desk) == $row_desk['PASS']) {
				$_SESSION['user'] = $row['UID'];
				$sql = "INSERT INTO info_login(UID,login,intime) VALUES ('$username_desk','1',now());";
				header('Location:register.html');
			} else {
				$mssg = 'Incorrect Password';
				if(($password) != $row['PASS'])
					$password = '';
				if(($password_desk) != $row_desk['PASS'])
					$password_desk = '';
				header('Location:loginform.php');
			}
			$select_statement -> close();
			$select_statement_desk -> close();
		}
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$conn -> close();
?>