<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="jiit website"/>
<meta name="keywords" content="HTML, CSS, php"/>
<meta name="author" content="Lathika"/>
<title>JIIT</title>
<!-- other meta stuff -->
<link href= "style.css" rel="stylesheet"/>
</head>
<body>
<?php
$current = 'register';
include("common.php");
header8();
include("menu.php");
?>
<style>
img { 
        width: 100%;
        height: auto;
    }
</style>
<hr/>
<img src="images/sregister.jpg" width="1500" height="265">
<hr/>

<h2>STUDENT REGISTER</h2>
<form id= "regform" method = "post" action = "register.php">
<fieldset>
<legend> Register Details</legend>
<p><label for="firstname">First Name:</label>
<input type="text" name="firstname" id="firstname" maxlength="20" size="20" pattern="[A-Za-z ]+" required="required" /></p>
<p><label for="lastname">Last Name:</label>
<input type="text" name="lastname" id="lastname" maxlength="20" size="20" pattern="[A-Za-z ]+" required="required" /></p>
<p><label for="dateofbirth">Date Of Birth:</label>
<input type="text" name="dateofbirth" id="dateofbirth" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{2,4}" maxlength="10" size="20" required="required"/>
</p>
<fieldset>
<legend>Gender:</legend>
<input type="radio" name="gender" id="mgender" value="M" required="required"/>
<label for="mgender">Male</label>
<input type="radio" name="gender" id="fgender" value="F" required="required"/>
<label for="fgender">Female</label>
</fieldset>
<p><label for="address">Address: </label>
<input type="text" id="address" name="address" maxlength="40" size="40" required="required"/></p>
<p><label>Phone: <input type="text" name="phone" required="required"> </label> </p>
<p><label>Email: <input type="text" name="email" required="required"> </label> </p>
<p><label>Password: <input type="password" name="pwd" required="required"> </label> </p>
<p><label>Confirm Password: <input type="password" name="cpwd" required="required"> </label> </p>
<p><input name="register" type = "submit"  value = "Register">
</fieldset>
</form>

<br/><br/><br/>
<br/>
<footer>
<hr/>
<?php
footer();
?>
</footer>
</body>
</html>

<?php

		if(isset($_POST['firstname'])&& isset($_POST['lastname'])&& isset($_POST['dateofbirth'])&& isset($_POST['gender'])&& isset($_POST['address'])&& 
		   isset($_POST['phone'])&& isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['cpwd']))
		{
			$fname = $_POST['firstname'];
			$lname = $_POST['lastname'];
			$date = $_POST['dateofbirth']; 
			$gender = $_POST['gender'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$password = $_POST['pwd'];
			$cpassword = $_POST['cpwd'];
		
			//Validate if password and confirm password matches
			if($password != $cpassword)
			{
				echo "<p>Password and confirm password must be same!</p>";
				exit();
			}
			
			//validate the email address format
			if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email))
			{
				echo "<p>email address is not valid format!</p>";
				exit();
			}	
		
			// check email id is unique
			$DBConnect = @mysqli_connect("localhost", "root", "", "jiit", 3307)
			Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

				
			$query = "SELECT * FROM student_register  where email='$email'";
			$results= mysqli_query($DBConnect, $query)or die ("<p>Unable to run the query.</p>");
			
			$num_of_rows = mysqli_num_rows($results);
			
			if($num_of_rows ==0)     // If no rows are returned, it means email is unique
			{
				//query1 for inserting the new customer information
				$query1 = "INSERT INTO student_register VALUES('$fname','$lname','$date','$gender','$address','$phone','$email','$password')";
				$RESULT=mysqli_query($DBConnect, $query1)or die("<p>Unable to execute the query.</p>". "<p>Error code " . mysqli_errno($DBConnect). ": " . mysqli_error($DBConnect) . "</p>");

				echo '<script type="text/javascript">
				window.onload = function () { alert("You have successfully registered into Student Register."); } 
				</script>';
				
			}
			
			else 
			{	echo '<script type="text/javascript">
				window.onload = function () { alert("The Email address is already existed in Student Register!"); } 
				</script>';	
			//show error message if email is not unique
			}
			mysqli_close($DBConnect);
		}
		
		
		
		
	?>