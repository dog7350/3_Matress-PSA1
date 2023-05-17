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
	$inputmyt = $_POST['mytank'];
	$inputenemy = $_POST['enemy'];
	$inputenet = $_POST['enemytank'];
	$inputresult = $_POST['result'];

	$insert = "INSERT INTO matchhistory VALUES (now(), '".$inputid."', '".$inputmyt."', '".$inputenemy."', '".$inputenet."', '".$inputresult."')";
	$result = mysqli_query($conn, $insert);

	mysqli_commit($conn);

	$stmt->close();
	$conn->close();
?>