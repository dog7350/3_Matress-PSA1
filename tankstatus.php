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

	$tno = $_POST['tno'];

	$result = mysqli_query($conn, "SELECT * FROM tank WHERE tno='".$tno."'");
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("Tank does not exist");
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			die($row['tname']."/".$row['ttype']."/".$row['bname']."/".$row['bcont']."/".$row['tatk']."/".$row['tdef']."/".$row['tspeed']."/".$row['money']."/".$row['cash']);
		}
	}

	$stmt->close();
	$conn->close();
?>