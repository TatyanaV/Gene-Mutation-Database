<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","vlaskint-db","tb0NGWMdrkGhe2mA","vlaskint-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<!--

-->
<html>
<head>
	<title>Mutation Data Base</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Mutaion Database</h1>
	<ul>
		<li><a href="main.html">Main Page</a></li>
		<li><a href="view_menu.php">View Database Contents</a></li>
		<li><a href="add_menu.php">Add to Database</a></li>
		<li><a href="update_menu.php">Update Database</a></li>
		<li><a href="delete_menu.php">Delete Entries from Database</a></li>
	</ul>
	<div>
		<form method="post" action="view.php">
		<fieldset>
			<legend>View the Database</legend>
			<select name="view">
			<option value="patient">Patients</option>
			<option value="primer_set">Primer Sets</option>
			<option value="primer">Forward Primers</option>
			<option value="primer1">Reverse Primers</option>
			<option value="mutation">Mutations</option>
			<option value="gene">Genes</option>
			<option value="best">Good Performing Primers</option>
			
			
			</select>
		</fieldset>
		<input type="submit" value="View" />
		</form>
	</div>
</body>
</html>