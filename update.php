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
	<?php
	if ($_POST['update'] == "Update Patient"){
		if (($_POST['fname'] == '') || ($_POST['lname'] == '')) {
            echo "<span>" . "Information not added to database because not some fields were left empty. Click " . "<a href='update_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('update_menu.php');
        } else {
			if(!($stmt = $mysqli->prepare(	"UPDATE cs275_patients
											SET fname = ?, lname = ?, lid = ?
											WHERE id = ?"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!($stmt->bind_param("ssii",$_POST['fname'],$_POST['lname'],$_POST['gene'],$_POST['patient']))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				include('header.php');
				echo "<span>" . "Updated '" . $_POST['fname'] . " " . $_POST['lname'] . "' to patient." . "</span>";
			}
		}
	}
	
	if ($_POST['update'] == "Update PrimerSet"){
		if (($_POST['name'] == '')) {
			echo "<span>" . "Information not added to database because not some fields were left empty. Click " . "<a href='update_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
			include('update_menu.php');
		} else {
			if(!($stmt = $mysqli->prepare(	"UPDATE cs275_primer_pair
											SET name = ?, ABV = ?, sid = ?, bid = ?, description = ?
											WHERE id = ?"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!($stmt->bind_param("sdiisi",$_POST['name'],$_POST['abv'],$_POST['mutation'],$_POST['primer'],$_POST['description'],$_POST['Primer_set']))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				include('header.php');
				echo "<span>" . "Updated '" . $_POST['name'] . "' to Primer_set." . "</span>";
			}
		}
	}
	
	if ($_POST['update'] == "Update primer"){
		if (($_POST['name'] == '')) {
			echo "<span>" . "Information not added to database because not some fields were left empty. Click " . "<a href='update_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
			include('update_menu.php');
		} else {
			if(!($stmt = $mysqli->prepare(	"UPDATE cs275_primer
											SET name = ?, lid = ?
											WHERE id = ?"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!($stmt->bind_param("sii",$_POST['name'],$_POST['gene'],$_POST['primer']))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				include('header.php');
				echo "<span>" . "Updated '" . $_POST['name'] . "' to Primers." . "</span>";
			}
		}
	}
	
	if ($_POST['update'] == "Update mutation"){
		if (($_POST['name'] == '')) {
			echo "<span>" . "Information not added to database because not some fields were left empty. Click " . "<a href='update_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
			include('update_menu.php');
		} else {
			if(!($stmt = $mysqli->prepare(	"UPDATE cs275_mutation
											SET name = ?, notes = ?
											WHERE id = ?"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!($stmt->bind_param("ssi",$_POST['name'],$_POST['notes'],$_POST['mutation']))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				include('header.php');
                echo "<span>" . "Updated '" . $_POST['name'] . "' to Mutations." . "</span>";
			}
		}
	}
	
	if ($_POST['update'] == "Update gene"){
		 if (($_POST['name'] == '') || ($_POST['chromosome'] == '') || ($_POST['coordinates'] == '')) {
            echo "<span>" . "Information not added to database because not some fields were left empty. Click " . "<a href='update_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('update_menu.php');
        } else {
			if(!($stmt = $mysqli->prepare(	"UPDATE cs275_gene
											SET name = ?, chromosome = ?, coordinates = ?
											WHERE id = ?"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!($stmt->bind_param("sssi",$_POST['name'],$_POST['chromosome'],$_POST['coordinates'], $_POST['gene']))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				include('header.php');
                echo "<span>" . "Updated '" . $_POST['name'] . ", " . $_POST['chromosome'] . ", " . $_POST['coordinates'] . "' to Locations." . "</span>";
			}
		}
	}
	?>
</body>
</html>