<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Super Secret Website</title>
 <link rel="stylesheet" href="test.css">
</head>
<body>
<style>
body {
  background-image: url('UniversityPhoto.jpg');
  background-size: cover;
}

</style>

<div class="header">
            <h1>University Account and Courses</h1>
        </div>
        <nav>
            <a href="myaccount.php">My Account</a>
            <a href="courses.php">Add Courses</a>
			<a href="findcourse.php">Find Course</a>
            <a href="logout.php">Logout</a>
			
          </nav>
	
	<br>
	Welcome, <?php echo $user_data['user_name']; ?>
	<br>
	<table style="width:100%">
  <tr>
    <th><h1>Welcome!</h1></th>
    
  </tr>
  
  <tr>
    <td>Welcome to the website. This website has been designed to allow a user to modify their account they have created
	and input new courses! You can find more about these two features by looking at the other paragraphs on this page!
	You can log out of this website anytime by using the logout button on the
	navigation bar.</td>
  </tr>
 
</table>
	<div class="row">
  <div class="column">
    <h1>About: My account</h1>
    <p> The my account page is there so it can be used to manipulate your data that you've
	inputted during the sign-up process. Not only it has the ability to allow you to edit
	your data but also display what you have currently got. If you remove the data inside
	(for example) First Name and leave it blank, it will delete the data from the database.
	To update your data, you will need to enter whatever you want updating then hitting update!
	</p>
  </div>
  
  <div class="column">
    <h1>About: Courses</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
	Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, r
	isus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
  </div>
  
  
</div>
	<br>
	
	<br>
	
</body>
</html>