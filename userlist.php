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

	$result = mysqli_query($conn, "SELECT * FROM userinfo WHERE connect='o'");
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("Not Connecting");
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo($row['id']." ".$row['mmr']."|");
		}
	}

	$conn->close();

?>