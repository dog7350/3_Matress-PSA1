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
	$inputmmr = $_POST['mmr'];
	$inputmoney = $_POST['money'];

	$result = "UPDATE userinfo SET money=".$inputmoney.", mmr=".$inputmmr." WHERE id='".$inputid."'";
	$conn->query($result);

	mysqli_commit($conn);

	$stmt->close();
	$conn->close();
?>