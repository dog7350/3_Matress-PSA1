<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$server = "localhost";
	$dbid = "maetress";
	$dbpw = "maetress";
	$dbname = "maetress";

	$conn = new mysqli($server, $dbid, $dbpw, $dbname);

	if($conn->connect_error)
	{
		die("Connect Failed");
	}

	$ino = $_POST['ino'];

	$result = mysqli_query($conn, "SELECT * FROM item WHERE ino='".$ino."'");
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("item does not exist");
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			die($row['title']."/".$row['content']."/".$row['money']);
		}
	}

	$stmt->close();
	$conn->close();
?>