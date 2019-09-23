<?php

	include("connection.php");
	$user=array (//change the values below to add new users
		//username => password
		"Andrew" => "Andrew",
		"Bowen" => "Bowen",
		"HelloWorld" => "HelloWorld"
		
	);
		
	foreach($user as $usernames => $passwords)//Do not change anything here
	{
		$query = "INSERT INTO `users` (`username`, `password`,`admin`) VALUES ('".mysqli_real_escape_string($link, $usernames)."', '".md5(md5($usernames).$passwords)."','User')";
		mysqli_query($link, $query);
	}
		

?>