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
	$inputpw = $_POST['pw'];

	$result = mysqli_query($conn, "SELECT * FROM userinfo WHERE id='".$inputid."'");
	$numrows = mysqli_num_rows($result);

	$conresult = mysqli_query($conn, "SELECT * FROM userinfo WHERE id='".$inputid."' AND connect='x'");
	$connumrows = mysqli_num_rows($conresult);

	if($numrows == 0)
	{
		die("ID does not exist");
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			if($inputpw == $row['pw'])
			{
				if($connumrows == 0)
				{
					die("Already connecting");
				}
				else
				{
					$query = "UPDATE userinfo SET connect='o' WHERE id=?";
					$stmt = mysqli_prepare($conn, $query);
					if($stmt == false) die("stmt error");
					$bind = mysqli_stmt_bind_param($stmt, "s", $inputid);
					if($bind == false) die("bind error");
					$exec = mysqli_stmt_execute($stmt);
					if($exec == false) die("exec error");

					//echo("'" . $row['id']."'\n");
					die($row['id']."/".$row['mmr']."/".$row['money']."/".$row['cash']);
				}
			}
			else
				die("PW does not Match");
		}
	}
	mysqli_commit($conn);

	$stmt->close();
	$conn->close();

?>
