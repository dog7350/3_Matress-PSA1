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

	$query = $_POST['query'];
	$mode = $_POST['mode'];

	$result = mysqli_query($conn, $query);
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("No ID");
	}
	else
	{
		if($mode == "1")
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo($row['matchDate']."/".$row['id']."/".$row['mytank']."/".$row['enemy']."/".$row['enemytank']."/".$row['result']."|");
			}
		}
		else if($mode == "2")
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo($row['mytank']."/".$row['cnt']."|");
			}
		}
		else if($mode == "3")
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo($row['result']."/".$row['cnt']."|");
			}
		}
	}

	$conn->close();

?>