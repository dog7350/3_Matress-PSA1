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

	$userid = $_POST['id'];

	$result = mysqli_query($conn, "SELECT u.id, u.mmr, u.connect FROM userinfo u, (SELECT * FROM friends WHERE id='".$userid."') f WHERE f.friend=u.id");
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("No Friend");
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo($row['id']." ".$row['mmr']." ".$row['connect']."|");
		}
	}

	$conn->close();

?>