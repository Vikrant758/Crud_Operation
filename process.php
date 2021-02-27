<?php
session_start();

$mysqli = new mysqli('localhost','root','Vrushali@28','crud') or die(mysql_error($mysqli));

$name = '';
$location = '';
$update = false;

if (isset($_POST['save'])){
	$name = $_POST['name'];
	$location = $_POST['location'];

	$mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "Success";

	header("location: index.php");
}


if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE from data where id = $id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "Danger";
	header("location: index.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * from data WHERE id = $id") or die($mysqli->error());
	if ($result->num_rows) {
		$row = $result->fetch_array();
		$name = $row['name'];
		$location = $row['location'];
	}
}


?>