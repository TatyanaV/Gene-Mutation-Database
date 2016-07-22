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
	<title>Mutation Database</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Mutation Database</h1>
	<ul>
		<li><a href="main.html">Main Page</a></li>
		<li><a href="view_menu.php">View Database Contents</a></li>
		<li><a href="add_menu.php">Add to Database</a></li>
		<li><a href="update_menu.php">Update Database</a></li>
		<li><a href="delete_menu.php">Delete Entries from Database</a></li>
	</ul>
    <p><a>*</a> Denotes required field</p>
	<div>
		<form name="addUser" method="post" action="add.php">
		<fieldset>
			<legend>patient</legend>
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
				</select><p class="caption">If gene does not exist in list, please add new gene below.</p></p>
		</fieldset>
		<input type="submit" name="add" value="Add patient"/>
		</form>
	</div>
	<br>
	
	<div>
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>Primer Set</legend>
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p>Melting Temperature: <input type="text" name="abv" /></p>
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
				</select><p class="caption">If mutation does not exist in list, please add new mutation below.</p></p>
			
			<p>Forward Primer: <select name="primer">
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
				</select><p class="caption">If primer does not exist in list, please add new primer below.</p></p>
			<p>Description: <input type="text" name="description" /></p>
			
				<p>Reverse Primer: <select name="primer1">
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
				</select><p class="caption">If primer does not exist in list, please add new primer below.</p></p>
			<p>Description: <input type="text" name="description" /></p>
			
		</fieldset>
		<input type="submit" name="add" value="Add Primer Set" />
		</form>
	</div>
	<br>
	<div>
	
	
	
	
	
	
	
	
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>Forward Primer</legend>
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p><a>*</a>Sequence: <input type="text" name="sequence" /></p>
			<p><a>*</a>Direction(INDICATE AS FORWARD): <input type="text" name="direction" /></p>
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
				</select><p class="caption">If gene does not exist in list, please add new gene below.</p></p>
		</fieldset>
		<input type="submit" name="add" value="Add Primer" />
		</form>
	</div>
	
	
	
		<div>
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>Reverse Primer</legend>
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p><a>*</a>Sequence: <input type="text" name="sequence" /></p>
			<p><a>*</a>Direction(INDICATE AS REVERSE): <input type="text" name="direction" /></p>
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
				</select><p class="caption">If gene does not exist in list, please add new gene below.</p></p>
		</fieldset>
		<input type="submit" name="add" value="Add Primer2" />
		</form>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<br>
	<div>
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>mutation</legend>
			<p><a>*</a>Name: <input type="text" name="name" /></p>
			<p>Notes: <input type="text" name="notes" /></p>
		</fieldset>
		<input type="submit" name="add" value="Add mutation" />
		</form>
	</div>
	<br>
	
	
	
	<div>
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>gene</legend>
			<p><a>*</a>name: <input type="text" name="name" /></p>
			<p><a>*</a>chromosome: <input type="text" name="chromosome" /></p>
			<p><a>*</a>coordinates: <input type="text" name="coordinates" /></p>
		</fieldset>
		<input type="submit" name="add" value="Add gene" />
		</form>
	</div>
	<br>
	
	
	
	
		
	
	
	
	
	
	
	
	<div>
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>Primer Sets that Worked for Patients</legend>
			<p>patient: <select name="name">
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
					echo '<option value=" '. $id . ' "> ' . $fname . ' ' . $lname .  '</option>\n';
				}
				$stmt->close();
				?>
				</select><p class="caption">If patient does not exist in list, please add new patient above.</p></p>
			<p>Best Primer Combination: <select name="primer_set">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT BE.id, BE.name, S.name, BR.name
												FROM cs275_primer_pair BE
												LEFT JOIN cs275_mutation S ON S.id = BE.sid
												LEFT JOIN cs275_primer BR ON BR.id = BE.bid 
												ORDER BY BE.name ASC"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($id, $primer_set, $mutation, $primer)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $id . ' "> ' . $primer_set. ' (' . $mutation . ') - ' . $primer . '</option>\n';
				}
				$stmt->close();
				?>
				</select><p class="caption">If primer_set does not exist in list, please add new primer_set above.</p></p>
		</fieldset>
		<input type="submit" name="add" value="Add Best Primers" />
		</form>
	</div>
</body>
<script>
    function checkNull() {
        var check = document.forms["addUser"]["fname"].value;
        if (check == null || check == "") {
            alert("First name must be filled out");
            return false;
    }
</script>
</html>