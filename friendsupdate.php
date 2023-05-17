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

	$userid = $_POST['userid'];
	$friendid = $_POST['friendid'];
	$mod = $_POST['mod'];

	if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM userinfo WHERE id='".$friendid."'")) == 0)
	{
		die("Not exist ID");
	}

	if($mod == "insert")
	{
		$query = "INSERT INTO friends VALUES (?, ?)";
	}
	else if($mod == "delete")
	{
		$query = "DELETE FROM friends WHERE id=? AND friend=?";
	}

	$stmt = mysqli_prepare($conn, $query);
	if($stmt == false) die("stmt error");
	$bind = mysqli_stmt_bind_param($stmt, "ss", $userid, $friendid);
	if($bind == false) die("bind error");
	$exec = mysqli_stmt_execute($stmt);
	if($exec == false) die("exec error");

	if($mod == "insert")
	{
		echo("Insert Complete");
	}
	else if($mod == "delete")
	{
		echo("Delete Complete");
	}

	mysqli_commit($conn);

	$stmt->close();
	$conn->close();

?>