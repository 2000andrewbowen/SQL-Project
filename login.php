<?php

		
		session_start();
		
		if ($_GET["logout"]==1 AND $_SESSION['id']) { session_destroy();
		
			$message="You have been logged out. Have a nice day!";
		
		}
		else if($_GET["logout"]==2 AND $_SESSION['id'])
		{
			session_destroy();
			$message="Please Sign In.";
		}
		
		include("connection.php");
		
 
	if ($_POST['submit'] == "Login") {	
	
		$query = "SELECT * FROM `users` WHERE username='".mysqli_real_escape_string($link, $_POST['loginusername'])."'AND 
		password='" .md5(md5($_POST['loginusername']) .$_POST['loginpassword']). "'LIMIT 1";

		$result = mysqli_query($link, $query);
		
		$row = mysqli_fetch_array($result);
		
		if($row){
		
			$_SESSION['id']=$row['id'];
			
			$_SESSION['user']=$row['username'];
			
			$_SESSION['Admin']=$row['admin'];
			
			if($_SESSION['Admin']=="Admin")
			{
				header("Location:admin.php");
			}
			else if($_SESSION['Admin']=="User")
			{
				header("Location:mainpage.php");
			}
		
		
    
		} else {
		
			$error = "We could not find a user with that email and password. Please try again.";
			
			
		
		}
	
	} 	


	if ($_POST['submit'] == "Sign In") {	
	
		$query = "SELECT * FROM users WHERE username='".mysqli_real_escape_string($link, $_POST['username'])."'AND 
		password='" .md5(md5($_POST['username']) .$_POST['password']). "'LIMIT 1";

		$result = mysqli_query($link, $query);
		
		$row = mysqli_fetch_array($result);
		
		if($row){
		
			$_SESSION['id']=$row['id'];
			
			$_SESSION['user']=$row['username'];
			
			$_SESSION['Admin']=$row['admin'];
			
			if($_SESSION['Admin']=="Admin")
			{
				header("Location:admin.php");
			}
			else if ($_SESSION['Admin']=="User")
			{
				header("Location:mainpage.php");
			}
		} else {
		
			$error = "We could not find a user with that email and password. Please try again.";
		
		}
	
	}
	
	
?>