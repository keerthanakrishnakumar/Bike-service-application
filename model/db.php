<?php 
	function db_connect()
	{
		$conn = mysqli_connect("localhost", "root", "", "project_database");
		if(!$conn){
			die("Connection failed: " . mysqli_connect_error());
			exit();
		}
		return $conn;
	}

	?>