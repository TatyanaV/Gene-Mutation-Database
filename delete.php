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
	<?php
	if ($_POST['delete'] == "Delete patient"){
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_patients
										WHERE id = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['patient']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from patient.";
		}
	}
	if ($_POST['delete'] == "Delete Primer_set"){
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_primer_pair
										WHERE id = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['Primer_set']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from primer sets.";
		}
	}
	
	
	if ($_POST['delete'] == "Delete primer"){
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_primer
										WHERE id = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['primer']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from forward primers.";
		}
	}
	
		if ($_POST['delete'] == "Delete primer1"){
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_primer_reverse
										WHERE id = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['primer']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from reverse primers.";
		}
	}
	
	
	
	
	if ($_POST['delete'] == "Delete mutation"){
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_mutation
										WHERE id = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['mutation']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from Mutations.";
		}
	}
	if ($_POST['delete'] == "Delete gene"){
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_gene
										WHERE id = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['gene']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from genes.";
		}
	}
	if ($_POST['delete'] == "Delete Favorite"){
		$keys = $_POST['favorite'];
		$keys = explode(',', $keys);
		
		if(!($stmt = $mysqli->prepare(	"DELETE FROM cs275_best_combination
										WHERE uid = ? AND bid = ?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("ii",$keys[0],$keys[1]))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} else {
			echo "Deleted from Favorite.";
		}
	}
	?>
</body>
</html>