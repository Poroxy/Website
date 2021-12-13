<?php
session_start();

	include("connection.php");
	include("functions.php");


$subject = $_SESSION["subject_id"];
//echo $subject;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       	$subject_name = $_REQUEST['subject_name'];
		$subject_comment = $_REQUEST['subject_comment'];


		//delete subject
if ($_POST['delete'] == "Delete record"){
		$query = "DELETE FROM subjects WHERE subject_id = '$subject'";
		$result = mysqli_query($con,$query);
		header("Location: findcourse.php");

//Update the user record
}else{
		$query = " UPDATE subjects SET subject_name = '$subject_name', subject_comment= '$subject_comment' WHERE subject_id='$subject' ";
}
							
$result = mysqli_query($con,$query);

} else
{
//CODE THAT REDISPLAYS THE NEW DATA
echo "x1";
$query = "select * from subjects where subject_id = '$subject' limit 1";
$result = mysqli_query($con,$query);
if ($result) {
echo "x2";
	$row = mysqli_fetch_assoc($result);
        $subject_name = $row["subject_name"];
        $subject_comment = $row["subject_comment"];
echo $subject_name;
}

else {
die("dead");
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit a Course</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id="box">
		
		<form method="post">
			
			<h1>Edit Course</h1>
			<!---<div>Login</div>--->
			
			<label> Subject Name </label><br>
			<input id="text" type="text" name="subject_name" value=<?php echo $subject_name;?> id=subject_name><br><br>
			
			<label> Subject Comment </label><br>
			<input id="text" type="text" name="subject_comment" value="<?php if (!$subject_comment == "") {echo $subject_comment;} ?>"<br><br>

			<input id="button" type="submit" value="Edit"><br><br>
			<input id="delete" name = "delete" type = "submit" value= "Delete record"><br><br>

			<a href="index.php">Back to Homepage</a><br><br>
		</form>
	</div>
</body>
</html>
