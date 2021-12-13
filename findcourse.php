<?php
session_start();

	include("connection.php");
	include("functions.php");
	
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//subject name was posted
		$subject_name = strtoupper($_POST['subject_name']);
	
		if(!empty($subject_name))
		{

			//reading from the database
			$query = "select * from subjects where subject_name = '$subject_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$subject_data = mysqli_fetch_assoc($result);
					
					{

						$_SESSION['subject_id'] = $subject_data['subject_id'];
						header("Location: editcourse.php");
						die;
					}
				}
			}
			
			echo "Cannot find Subject";
		}else
		{
			echo "Cannot find Subject";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>Find a Course</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id="box">
		
		<form method="post">
			
			<h1>Find a Course</h1>
			<!---<div>Login</div>--->

			<input id="text" type="text" name="subject_name"><br><br>
			

			<input id="button" type="submit" value="Find"><br><br>

			<a href="index.php">Back to Homepage</a><br><br>
		</form>
	</div>
</body>
</html>