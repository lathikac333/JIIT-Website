
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
$current = 'login';
include("common.php");
header8();
include("menu.php");
?>
<hr/>
<img src="images/cregister.jpg">
<hr/>

<h2>STUDENT LOGIN REQUIRED FOR COURSE REGISTRATION</h2>
	<form id = "Loginform" method = "post" action = "login.php">
	    <fieldset>
		<legend>Login Details</legend>
        <p><label>Email:    <input type="text" name="email"/> </label></p>
 	    <p><label>Password: <input type="password" name="pwdlogin" /> </label></p>
		<input type = "submit"   value = "login"/>
		</fieldset>
	</form>
	<br/>
<h3>IF YOU ARE NOT REGISTERED? <a href="register.php"> <input type = "submit"  value = "register"/></a> </h3>
<br/><br/><br/>
<br/><br/><br/>
<br/><br/><br/>
<footer>
<hr/>
<?php
footer();
?>
</footer>
</body>
</html>

<?php
	
session_start();
	if (isset($_POST["email"]) && isset($_POST["pwdlogin"]))
	{
		$email = $_POST['email'];
		$loginpwd = $_POST['pwdlogin'];
	

		if((!empty($email)) && (!empty($loginpwd))) // check if email and password are not empty
		{
		//Authenticate the customer using customer Email and password from customer table
		$DBConnect = @mysqli_connect("localhost", "root", "", "jiit")
			Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";

		$SQLstring="select email from student_register where email='$email' and Password = '$loginpwd'"; 
		
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
			 or die ("<p>Unable to run the query.</p>");

			 
			 
		$row = mysqli_fetch_row($queryResult);
		
		if(count($row) > 0 )  //check if login is successful, if $row has value > 0, it means the customer record exists 
			{
			$emailpwd = $row[0];
			
				$_SESSION['user']=$_POST['email'];
			$_SESSION['userid']=$_POST['pwdlogin'];
			
			header("Location:courseregistration.php?email=$emailpwd");  //redirect to booking page		

			}
			else // the block will run if authentication fails
			{
				echo '<script type="text/javascript">
				window.onload = function () { alert("Email or password you entered is incorrect!!!"); } 
				</script>';
				
			}
			
		

			mysqli_close($DBConnect);

		}
	else //Error message if the  Email and password are empty
		{
			echo '<script type="text/javascript">
				window.onload = function () { alert("Email or Password should not be empty!"); } 
				</script>';
				
		}

	}

?>
