<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
	<?php include 'head.inc.php' ?>
</head>
<body>
<p>Make a new search</p><br>
<form action="<?php echo $current_file ?>" method="POST">
	<input type="text" id="newsearch" name="search" placeholder="New Search...">
	</form>
<?php 
	include 'database.inc.php';
	include 'core.inc.php';
	if(loggedin())
	{
		$query="'aaaaa'";
		$search_error = '';
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (isset($_POST['search'])) {
				if(empty($_POST['search'])) {
					$search_error = 'No search query';
				} else {
					if($_POST['search'] == test_input($_POST['search'])) {
						$query = test_input($_POST['search']);
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
				$select_statement = $conn -> prepare("SELECT * FROM participants WHERE first_name = ? OR last_name= ?");
				$select_statement -> bind_param('ss',$query,$query);//,'s', $query,
				$select_statement -> execute();
				$result = $select_statement -> get_result();
			}
			// echo "<p>$result->num_rows</p>";
			if(($result->num_rows) > 0)
			{
				echo "<p><h3>Search Successful : $result->num_rows results found</h3><br></p>";
				while($row = $result -> fetch_assoc())
				{
					echo "<p>Participant with:<br>";
					foreach ($row as $key => $value) {
						if($key=="registration_number")
							{$val="registration number";}
						if($key=="first_name")
							{$val="first name";}
						if($key=="last_name")
							{$val="last name";}
						if($key=="delegate_card_number")
							{$val="delegate card number";}
						echo "$val as $value&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					echo "</p>";
				}
			}
			else
			{
				echo "<p>Search Failed<br></p>";
			}
			$select_statement -> close();
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

</body>
</html>