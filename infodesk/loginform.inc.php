<?php 
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
			} else if($row == NULL) {
				$mssg = $username . ' not found';
				$username = '';
				$password = '';
			} else if($row_desk == NULL) {
				$mssg = $username_desk . ' not found';
				$username_desk = '';
				$password_desk = '';
			} else if(md5($password) == $row['PASS'] && md5($password_desk) == $row_desk['PASS']) {
				$_SESSION['user'] = $row_desk['UID'];
				header('Location: home.php');
			} else {
				$mssg = 'Incorrect Password';
				if(md5($password) != $row['PASS'])
					$password = '';
				if(md5($password_desk) != $row_desk['PASS'])
					$password_desk = '';
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
<div class="heading">Login</div>
<form action="<?php echo $current_file ?>" method="POST">
	<div class="mssg formele <?php if(!empty($mssg)) echo 'errorcolor' ?>">&nbsp;<?php if(isset($mssg)) echo $mssg; ?></div>
	
	<div class="formele sub-head">User</div>
	<div class="formele <?php if(!empty($username_error)) echo 'errorcolor' ?>">
		<input type="text" maxlength=40 name="username" placeholder="Enter username" autofocus="autofocus" value="<?php if(isset($username)) echo $username; ?>" />
		<div class="error">&nbsp;<?php if(isset($username_error)) echo $username_error; ?></div>
	</div>
	<div class="formele <?php if(!empty($password_error)) echo 'errorcolor' ?>">
		<input type="password" maxlength=40 name="password" placeholder="Enter password" value="<?php if(isset($password)) echo $password; ?>" />
		<div class="error">&nbsp;<?php if(isset($password_error)) echo $password_error; ?></div>
	</div>
	<div class="formele sub-head">Infodesk user</div>
	<div class="formele <?php if(!empty($username_desk_error)) echo 'errorcolor' ?>">
		<input type="text" maxlength=40 name="username_desk" placeholder="Enter username" value="<?php if(isset($username_desk)) echo $username_desk; ?>" />
		<div class="error">&nbsp;<?php if(isset($username_desk_error)) echo $username_desk_error; ?></div>
	</div>
	<div class="formele <?php if(!empty($password_desk_error)) echo 'errorcolor' ?>">
		<input type="password" maxlength=40 name="password_desk" placeholder="Enter password" value="<?php if(isset($password_desk)) echo $password_desk; ?>" />
		<div class="error">&nbsp;<?php if(isset($password_desk_error)) echo $password_desk_error; ?></div>
	</div>

	<div class="formele"><input type="submit" value="Login" /></div>
</form>
