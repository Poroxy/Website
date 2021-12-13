<?php
session_start();

	include("connection.php");
	include("functions.php");
	check_login($con);
	$msg = "";
	

	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$subject_name = strtoupper($_POST['subject_name']);
		$subject_comment = $_POST['subject_comment'];
		if(!empty($subject_name) && !empty($subject_comment)){
		 
			//Checks if database has subject already.
			$query = "select * from subjects where subject_name = '$subject_name'"; 
			$result = mysqli_query($con, $query);
			if($result && mysqli_num_rows($result) > 0){
				$msg = $subject_name." is already used";
				
			} else {
				
			
				//save to database
				$subject_id = random_num(20);
				$query = "insert into subjects (subject_id,subject_name,subject_comment) values ('$subject_id','$subject_name','$subject_comment')";
				//echo $query;
				mysqli_query($con, $query);
				$msg = $subject_name." has been added";
			}
		}
	}	
?>

<!DOCTYPE html>
<html>
<head>
<title> Courses </title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div id="box">

		<form method="post">
		<h1>Courses</h1>
<?php
	$sql = "SELECT * FROM subjects";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
    // output data of each row
    echo "<table style='width:45%'>
	<tr>
    <th>Subject</th> 
    <th>Comments</th>
	</tr>";

		while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['subject_name']. " </td><td> " . $row['subject_comment']. "</td></tr>";
	}
		echo "</table>";
    }else {
		echo "0 results";
	}
?>
			<!---<div>Signup</div> --->
			<br>	
			<label>Subject Name</label><br>
			<input id="text" type="text" name="subject_name"><br><br>
			
			<label> Comment </label><br>
			<input id="text" type="text" name="subject_comment"><br><br>
			
			<input id="button" type="submit" value="submit"><br><br>
			
			<label> <?php echo $msg; ?> </label> <br>
			
			<a href="index.php">Back to Homepage</a>
</form>
</div>
</body>
</html>