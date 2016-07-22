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
	<?php
	if($_POST['view'] == "patient"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>PATIENTS</td></tr>";
		echo "<tr><td class='head'>First Name</td><td class='head'>Last Name</td><td class='head'>Name of the Gene</td><td class='head'>Chromosome</td><td class='head'>Genomic Coordinates</td></tr>";

		if(!($stmt = $mysqli->prepare(	"SELECT U.fname, U.lname, L.name, L.chromosome, L.coordinates
										FROM cs275_patients U
										LEFT JOIN cs275_gene L ON L.id = U.lid
										ORDER BY U.lname, U.fname ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($fname, $lname, $name, $chromosome, $coordinates)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $fname . "</td>";
			echo "<td>" . $lname . "</td>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $chromosome . "</td>";
			echo "<td>" . $coordinates . "</td>";
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	
	
	if($_POST['view'] == "primer_set"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>Primer Set</td></tr>";
		echo "<tr><td class='head'>Name</td><td class='head'>Melting T</td><td class='head'>Mutation</td><td class='head'>F Primer</td><td class='head'>F Sequence</td><td class='head'>R Primer</td><td class='head'>R Sequence</td><td class='head'>Description</td></tr>";
		
		if(!($stmt = $mysqli->prepare(	"SELECT BE.name, BE.ABV, S.name, BR.name, BR.sequence, R.name, R.sequence, BE.description
										FROM cs275_primer_pair BE
										LEFT JOIN cs275_mutation S ON S.id = BE.sid
										LEFT JOIN cs275_primer BR ON BR.id = BE.bid 
										LEFT JOIN cs275_primer_reverse R ON R.id = BE.cid 
										ORDER BY BE.name ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($name, $abv, $mutation, $primer, $sequence, $primer1, $sequence1, $description)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $abv . "*C</td>";
			echo "<td>" . $mutation . "</td>";
			echo "<td>" . $primer . "</td>";
			echo "<td>" . $sequence . "</td>";
			echo "<td>" . $primer1 . "</td>";
			echo "<td>" . $sequence1 . "</td>";
			echo "<td>" . $description . "</td>";
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	
	if($_POST['view'] == "primer"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>List of Forward Primers for Each Gene</td></tr>";
		echo "<tr><td class='head'>Name</td><td class='head'>name of the gene</td><td class='head'>chromosome gene</td><td class='head'>Genomic Coordinates</td><td class='head'>Sequence</td><td class='head'>R/F</td></tr>";
		
		if(!($stmt = $mysqli->prepare(	"SELECT BR.name, L.name, L.chromosome, L.coordinates, BR.sequence, BR.direction
										FROM cs275_primer BR
										LEFT JOIN cs275_gene L ON L.id = BR.lid
										ORDER BY BR.name ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($primer, $name, $chromosome, $coordinates, $sequence, $direction)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $primer . "</td>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $chromosome . "</td>";
			echo "<td>" . $coordinates . "</td>";
			echo "<td>" . $sequence . "</td>";
			echo "<td>" . $direction . "</td>";
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	
	if($_POST['view'] == "primer1"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>List of Reverse Primers for Each Gene</td></tr>";
		echo "<tr><td class='head'>Name</td><td class='head'>name of the gene</td><td class='head'>chromosome gene</td><td class='head'>Genomic Coordinates</td><td class='head'>Sequence</td><td class='head'>R/F</td></tr>";
		
		if(!($stmt = $mysqli->prepare(	"SELECT BR.name, L.name, L.chromosome, L.coordinates, BR.sequence, BR.direction
										FROM cs275_primer_reverse BR
										LEFT JOIN cs275_gene L ON L.id = BR.lid
										ORDER BY BR.name ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($primer, $name, $chromosome, $coordinates, $sequence, $direction)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $primer . "</td>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $chromosome . "</td>";
			echo "<td>" . $coordinates . "</td>";
			echo "<td>" . $sequence . "</td>";
			echo "<td>" . $direction . "</td>";
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	
	
	if($_POST['view'] == "mutation"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>Mutations</td></tr>";
		echo "<tr><td class='head'>Name</td><td class='head'>Notes</td></tr>";
		
		if(!($stmt = $mysqli->prepare(	"SELECT name, notes
										FROM cs275_mutation
										ORDER BY name ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($mutation, $notes)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $mutation . "</td>";
			echo "<td>" . $notes . "</td>";
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	if($_POST['view'] == "gene"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>Genes in the DataBase</td></tr>";
		echo "<tr><td class='head'>Name of the Gene</td><td class='head'>Chromosome</td><td class='head'>Coordinates</td></tr>";

		if(!($stmt = $mysqli->prepare(	"SELECT name, chromosome, coordinates
										FROM cs275_gene
										ORDER BY chromosome ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($name, $chromosome, $coordinates)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $chromosome . "</td>";
			echo "<td>" . $coordinates . "</td>";
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	if($_POST['view'] == "best"){
		echo "<div>";
		echo "<table>";
		echo "<tr><td class='table'>Primer_Sets that Worked for Patients</td></tr>";
		echo "<tr><td class='head'>First Name</td><td class='head'>Last Name</td><td class='head'>Primer Set</td><td class='head'>F Primer</td><td class='head'>Sequence</td> <td class='head'> R Primer</td><td class='head'>Sequence</td></tr>";

		if(!($stmt = $mysqli->prepare(	"SELECT U.fname, U.lname, BE.name, BR.name, R.name, R.sequence, BR.sequence
										FROM cs275_patients U
										INNER JOIN cs275_best_combination FB ON FB.uid = U.id
										INNER JOIN cs275_primer_pair BE ON BE.id = FB.bid
										LEFT JOIN cs275_primer BR ON BR.id = BE.bid 
										LEFT JOIN cs275_primer_reverse R ON R.id = BE.cid 
										ORDER BY U.lname, U.fname ASC"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->bind_result($fname, $lname, $primer_set, $primer, $rname, $rsequence, $brsequence)){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		while($stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $fname . "</td>";
			echo "<td>" . $lname . "</td>";
			echo "<td>" . $primer_set . "</td>";
			echo "<td>" . $primer . "</td>";
			echo "<td>" . $brsequence . "</td>";
			echo "<td>" . $rname . "</td>";
			echo "<td>" . $rsequence. "</td>";
			
			echo "</tr>";
		}
		$stmt->close();
		
		echo "</table>";
		echo "</div>";
	}
	?>
</body>
</html>