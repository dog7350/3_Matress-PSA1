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

	$result = mysqli_query($conn, "SELECT * FROM userinfo WHERE id='".$inputid."' AND connect='o'");
	$numrows = mysqli_num_rows($result);

	if($numrows == 0)
	{
		die("Not Connecting");
	}
	else
	{
		$query = "UPDATE userinfo SET connect='x' WHERE id=?";
		$stmt = mysqli_prepare($conn, $query);
		if($stmt == false) die("stmt error");
		$bind = mysqli_stmt_bind_param($stmt, "s", $inputid);
		if($bind == false) die("bind error");
		$exec = mysqli_stmt_execute($stmt);
		if($exec == false) die("exec error");

		die("Logout");
	}
	mysqli_commit($conn);

	$stmt->close();
	$conn->close();

?>