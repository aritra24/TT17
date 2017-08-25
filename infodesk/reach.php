<?php 
	include 'database.inc.php';
	include 'core.inc.php';
	if(loggedin())
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$query ='a';
			$search_error = 'Nothing yet';
			if (isset($_POST['search'])) {
				if(empty($_POST['search'])) {
					$search_error = 'No search query';
				} else {
					if($_POST['search'] == test_input($_POST['search'])) {
						$query = test_input($_POST['query']);
						$search_error='';
					 }
					 else
					 {
					 	$search_error='Invalid input';
					 }
				}

			}
			if($search_error=='')
			{
				$select_statement = $conn -> prepare('SELECT * FROM participants WHERE first_name = ?');
				$select_statement -> bind_param('s',$query);//,'s', $query, OR last_name= ?
				$select_statement -> execute();
				$result = $select_statement -> get_result();
				$row = $result -> fetch_assoc();
			}
			if(!empty($row))
			{
				foreach ($row as $value) {
					echo "participant ID-$value['delegate_card_number'] : $value['first_name'] $value['last_name'] found<br>";
				}
			}
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