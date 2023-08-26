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
<style>
img { 
        width: 100%;
        height: auto;
    }
</style>
<hr/>
<img src="images/cregister.jpg" width="1500" height="265">
<hr/>
 <form method = "get" action = "logout.php">
<p class="logout"><input type="submit"  value="Logout"/></p>
</form>

<h2>Course Registration </h2>

  <?php
  
		//checking the submitted form data 
		 if (isset($_GET['email']) && isset($_GET['cname']) && isset($_GET['major']) && isset($_GET['term']) && isset($_GET['intake']))
		 {
			
			$email = trim($_GET['email']);
			$cname = $_GET['cname'];
			$major = $_GET['major'];
			$studyoption = $_GET['term'];
			$intake = $_GET['intake'];
			
			//check if the customer input all data 
			if ((!empty($email)) && (!empty($cname)) && (!empty($major)) && (!empty($studyoption)) && (!empty($intake)))
			{
					
				$DBConnect = @mysqli_connect("localhost", "root", "", "jiit", 3307)
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
					
				$query = "SELECT * FROM course_registration  where username='$email'";
			$results= mysqli_query($DBConnect, $query)or die ("<p>Unable to run the query.</p>");
			
			$num_of_rows = mysqli_num_rows($results);
			
			if($num_of_rows ==0)     // If no rows are returned, it means email is unique
			{	
					
					$SQLstring = "insert into course_registration(UserName,CourseName,Major,StudyOption,Intake) 
					values('$email','$cname','$major','$studyoption','$intake')";

					$queryResult = @mysqli_query($DBConnect, $SQLstring)
						Or die ("<p>Unable to insert in the course registration table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
					
					// To generate booking reference number
					$SQLstring = "select RegistrationNo from course_registration where RegistrationNo = (select max(RegistrationNo) from course_registration)";
					
					$queryResult = @mysqli_query($DBConnect, $SQLstring)
						Or die ("<p>Unable to insert in the course registration table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
					
					$row = mysqli_fetch_array($queryResult);

					mysqli_close($DBConnect);
				
				echo '<script type="text/javascript">
				window.onload = function () { alert("You have successfully registered into Course Registration. Your registration number is displayed on Course Registration page."); } 
				</script>';
				//Show the success message using $row data
				$msg = "***Your course registration number is <b>{$row['RegistrationNo']}</b>. We will contact you via phone call. Thank you!***"; 
				echo $msg;
						
			}
				//show error message if email is not unique
				else 
			{		
				
				echo '<script type="text/javascript">
				window.onload = function () { alert("The Email address is already existed in Course Registration!"); } 
				</script>';	
			}
			
			}

		}


?> 

 <form method = "get" action = "courseregistration.php">
  <fieldset>
 <legend>Course Registration Details</legend>
<p><label for="cname">Course Name: </label>
<select name="cname" id="cname" required="required">
<option value=""></option>
<option value="Bachelor of IT">Bachelor of IT</option>
</select></p>
<p><label for="major">IT Major: </label>
<select name="major" id="major" required="required">
<option value=""></option>
<option value="Software Development">Software Development</option>
<option value="Network Technology">Network Technology</option>
<option value="System Analysis">System Analysis</option>
<option value="Multimedia Development">Multimedia Development</option>
</select></p>
<p><label for="term">Study Option: </label>
<select name="term" id="term" required="required">
<option value=""></option>
<option value="Full Time">Full Time</option>
<option value="Part Time">Part Time</option>
</select></p>
<p><label for="intake">Intake: </label>
<select name="intake" id="intake" required="required">
<option value=""></option>
<option value="March">March</option>
<option value="September">September</option>
</select></p>
<input type="hidden" name="email" value=" <?php echo trim($_GET['email']); ?> "/>
<input type = "submit"  value = "Course register"/>
<input type="reset" value="Reset" />
</fieldset>
 </form>

<br/><br/></br>
<footer>
<hr/>
<?php
footer();
?>
</footer>
</body>
</html>


