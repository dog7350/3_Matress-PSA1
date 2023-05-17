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
	$inputmoney = $_POST['money'];
	$inputcash = $_POST['cash'];

	$result = "UPDATE userinfo SET money=".$inputmoney.", cash=".$inputcash." WHERE id='".$inputid."'";
	$conn->query($result);

	mysqli_commit($conn);

	$stmt->close();
	$conn->close();
?>