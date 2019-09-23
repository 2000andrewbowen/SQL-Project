<?php
	session_start();
	print $_SESSION['user'];
	include("connection.php");
	date_default_timezone_set(America/Chicago);
	if($_POST['save'] == "Save")
	{
		if (!$_POST['firstName']) $error.="<br />Please enter a first name";
		
		if (!$_POST['lastName']) $error.="<br />Please enter a last name";
		
		if (!$_POST['grade']) $error.="<br />Please enter a grade";
		
		if (!$_POST['inlineRadio1']) $error.="<br />Please answer Question 1";
		
		if (!$_POST['inlineRadio2']) $error.="<br />Please answer Question 2";
		
		if (!$_POST['inlineRadio3']) $error.="<br />Please answer Question 3";
		
		if (!$_POST['inlineRadio4']) $error.="<br />Please answer Question 4";
		
		if (!$_POST['inlineRadio5']) $error.="<br />Please answer Question 5";
		
		if (!$error)
		{
			$total = intval($_POST['inlineRadio5']) + intval($_POST['inlineRadio4']) + intval($_POST['inlineRadio3']) + intval($_POST['inlineRadio2']) + intval($_POST['inlineRadio1']); 
			$query = "INSERT INTO `submitedData`(`firstName`, `lastName`, `grade`, `score1`, `score2`, `score3`, `score4`, `score5`,`total`,`submitBy`) VALUES ('".mysqli_real_escape_string($link, $_POST['firstName'])."','".mysqli_real_escape_string($link, $_POST['lastName'])."',$_POST[grade],$_POST[inlineRadio1],$_POST[inlineRadio2],$_POST[inlineRadio3],$_POST[inlineRadio4],$_POST[inlineRadio5],$total,'$_SESSION[user]')";
			mysqli_query($link, $query);
			header("Location:mainpage.php");
		}
	}
?>