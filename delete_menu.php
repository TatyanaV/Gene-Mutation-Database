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
	<title>Mutation DataBase</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Mutation DataBase</h1>
	<ul>
	<ul>
		<li><a href="main.html">Main Page</a></li>
		<li><a href="view_menu.php">View Database Contents</a></li>
		<li><a href="add_menu.php">Add to Database</a></li>
		<li><a href="update_menu.php">Update Database</a></li>
		<li><a href="delete_menu.php">Delete Entries from Database</a></li>
	</ul>
	</ul>
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>patient</legend>
			<select name="patient">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT id, fname, lname
												FROM cs275_patients
												ORDER BY lname ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $fname, $lname)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $fname . ' ' . $lname . '</option>\n';
				}
				$stmt->close();
				?>
			</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete patient" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>Primer_set</legend>
			<select name="Primer_set">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT id, name
												FROM cs275_primer_pair
												ORDER BY name ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $name)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
				}
				$stmt->close();
				?>
			</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete Primer_set" />
		</form>
	</div>
	<br>
	
	
	
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>primer</legend>
			<select name="primer">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT id, name
												FROM cs275_primer
												ORDER BY name ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $name)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
				}
				$stmt->close();
				?>
			</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete primer" />
		</form>
	</div>
	
		<br>
	
	
	
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>primer</legend>
			<select name="primer">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT id, name
												FROM cs275_primer_reverse
												ORDER BY name ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $name)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
				}
				$stmt->close();
				?>
			</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete primer1" />
		</form>
	</div>
	
	
	
	<br>
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>mutation</legend>
			<select name="mutation">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT id, name
												FROM cs275_mutation
												ORDER BY name ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $name)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
				}
				$stmt->close();
				?>
				</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete mutation" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>gene</legend>
			<select name="gene">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT id, name, chromosome, coordinates
												FROM cs275_gene
												ORDER BY chromosome ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $name, $chromosome, $coordinates)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . ', ' . $chromosome . ', ' . $coordinates . '</option>\n';
				}
				$stmt->close();
				?>
			</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete gene" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="delete.php"> 
		<fieldset>
			<legend>Delete Primer_set</legend>
			<select name="favorite">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT FB.uid, FB.bid, U.fname, U.lname, BE.name, BR.name
												FROM cs275_patients U
												INNER JOIN cs275_best_combination FB ON FB.uid = U.id
												INNER JOIN cs275_primer_pair BE ON BE.id = FB.bid
												LEFT JOIN cs275_primer BR ON BR.id = BE.bid 
												ORDER BY U.lname ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($uid, $bid, $fname, $lname, $Primer_set, $primer)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $uid . ',' . $bid . ' "> ' . $fname . ' ' . $lname . ' - '. $Primer_set . ' (' . $primer . ')' . '</option>\n';
				}
				$stmt->close();
				?>
			</select>
		</fieldset>
		<input type="submit" name="delete" value="Delete Favorite Beers" />
		</form>
	</div>
</body>
</html>