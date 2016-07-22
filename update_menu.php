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
		<li><a href="main.html">Main Page</a></li>
		<li><a href="view_menu.php">View Database Contents</a></li>
		<li><a href="add_menu.php">Add to Database</a></li>
		<li><a href="update_menu.php">Update Database</a></li>
		<li><a href="delete_menu.php">Delete Entries from Database</a></li>
	</ul>
	<p><a>*</a> Denotes required field</p>
	<div>
		<form method="post" action="update.php"> 
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
			<p><a>*</a>First Name: <input type="text" name="fname" /></p>
			<p><a>*</a>Last Name: <input type="text" name="lname" /></p>
			<p>gene: <select name="gene">
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
				</select><p class="caption">If gene does not exist in list, please add new gene.</p></p>
			</select></p>
		</fieldset>
		<input type="submit" name="update" value="Update Patient" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="update.php"> 
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
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p>ABV: <input type="text" name="abv" /></p>
			<p>mutation: <select name="mutation">
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
				</select><p class="caption">If mutation does not exist in list, please add new mutation.</p></p>
			</select></p>
			<p>primer: <select name="primer">
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
				</select><p class="caption">If primer does not exist in list, please add new primer.</p></p>
			</select></p>
			<p>Description: <input type="text" name="description" /></p>
		</fieldset>
		<input type="submit" name="update" value="Update PrimerSet" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="update.php"> 
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
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p>gene: <select name="gene">
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
				</select><p class="caption">If gene does not exist in list, please add new gene.</p></p>
			</select></p>
		</fieldset>
		<input type="submit" name="update" value="Update primer" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="update.php"> 
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
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p>Notes: <input type="text" name="notes" /></p>
		</fieldset>
		<input type="submit" name="update" value="Update mutation" />
		</form>
	</div>
	<br>
	<div>
		<form method="post" action="update.php"> 
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
			<p><a>*</a>name: <input type="text" name="name" /></p>
			<p><a>*</a>chromosome: <input type="text" name="chromosome" /></p>
			<p><a>*</a>coordinates: <input type="text" name="coordinates" /></p>
		</fieldset>
		<input type="submit" name="update" value="Update gene" />
		</form>
	</div>
</body>
</html>