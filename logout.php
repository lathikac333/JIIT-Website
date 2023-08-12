<?php
//assign the existing session
session_start();

//check if the user name is set in session variable
if(isset($_SESSION['user']))
{
	
	//unset the session associated with user
	unset($_SESSION['user']);
	unset($_SESSION['userid']);	
	header("Location:login.php?email=$emailpwd"); 
}

else
{
	echo 'NOT LOGGED IN';
	
}

?>