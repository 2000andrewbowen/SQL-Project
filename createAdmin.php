<?php

	include("connection.php");
	$userAdmin=array(//change the values below to add new admin users
	//username => password
		"test" => "test",
		"asdf" => "asdf",
		"hello" => "hello"
	
	);

	foreach($userAdmin as $usernames => $passwords)//Do not change anything here
	{
		$query = "INSERT INTO `users` (`username`, `password`,`admin`) VALUES ('".mysqli_real_escape_string($link, $usernames)."', '".md5(md5($usernames).$passwords)."', 'Admin')";
		mysqli_query($link, $query);
	}
<?