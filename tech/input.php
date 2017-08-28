<?php 
include 'database.inc.php';
session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $password = $username_error = $password_error = '';
		$user = $pass = $user_error = $pass_error = '';
		
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
		if (isset($_POST['user'])) {
			if(empty($_POST['user'])) {
				$user_error = 'Username is required';
			} else {
				if($_POST['user'] == test_input($_POST['user'])) {
					$user = test_input($_POST['user']);
				} else {
					$user_error = 'Use a different username';
				}
			}
		}
		if (isset($_POST['pass'])) {
			if(empty($_POST['pass'])) {
				$pass_error = 'Password is required';
			} else {
				$pass = test_input($_POST['pass']);
			}
		}

		if($username_error == '' && $password_error == '' && $user_error == '' && $pass_error == '') {
			$select_statement = $conn -> prepare('SELECT * FROM login WHERE UID = ?');
			$select_statement -> bind_param('s', $username);
			$select_statement -> execute();
			$result = $select_statement -> get_result();
			$row = $result -> fetch_assoc();
			echo $row['UID'];

			$select_statement_desk = $conn -> prepare('SELECT * FROM loginDesk WHERE UID = ?');
			$select_statement_desk -> bind_param('s', $user);
			$select_statement_desk -> execute();
			$result_desk = $select_statement_desk -> get_result();
			$row_desk = $result_desk -> fetch_assoc();
			echo $row_desk['UID'];

			$query = "SELECT UID FROM time where UID = '$user';";
			mysqli_query($conn,$query);
			$row_log = mysql_fetch_array($query);
			}
			if($row == NULL && $row_desk == NULL) {
				$mssg = 'Users not found';
				$username = '';
				$password = '';
				$user = '';
				$pass = '';
				header('Location:loginform.php');
			} else if($row == NULL) {
				$mssg = $username . ' not found';
				$username = '';
				$password = '';
				$user = $_SESSION['user'];
				header('Location:loginform.php');
			} else if($row_desk == NULL) {
				$mssg = $user . ' not found';
				$user = '';
				$pass = '';
				$username = $_SESSION['username'];
				header('Location:loginform.php');
			} else if($row_log['logged'] == '1') {
				header('Location:loginform.php');
			}
				else if(($password) == $row['PASS'] && ($pass) == $row_desk['PASS']) {
				$_SESSION['user'] = $row['UID'];
				$sql = "INSERT INTO time(UID,logged,intime,sysin) VALUES ('$user','1',now(),now());";
				mysqli_query($conn,$sql);
				$_SESSION['UID'] = $user;
                header('Location: register.php');
			} else {
				$mssg = 'Incorrect Password';
				if(($password) != $row['PASS'])
					$password = '';
				if(($pass) != $row_desk['PASS'])
					$pass = '';
				header('Location:loginform.php');
			}
			$select_statement -> close();
			$select_statement_desk -> close();
		}
	

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$conn -> close();
?>