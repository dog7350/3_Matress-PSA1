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

	$inputid = $_POST['id'];

	$result = mysqli_query($conn, "SELECT * FROM userinfo WHERE id='".$inputid."'");
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("ID does not exist");
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			die($row['id']."/".$row['mmr']."/".$row['money']."/".$row['cash']);
		}
	}

	$conn->close();

?>
