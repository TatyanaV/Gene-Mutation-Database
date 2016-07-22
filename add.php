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
	if ($_POST['add'] == "Add patient"){

        if (($_POST['fname'] == '') || ($_POST['lname'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_menu.php');
        } else {

            if(!($stmt = $mysqli->prepare(	"INSERT INTO cs275_patients(fname, lname, lid)
                                            VALUES (?,?,?)
                                            ON DUPLICATE KEY UPDATE fname = VALUES(fname), lname = VALUES(lname), lid = VALUES(lid)"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("ssi",$_POST['fname'],$_POST['lname'],$_POST['gene']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                include('header.php');
                echo "<span>" . "Added '" . $_POST['fname'] . " " . $_POST['lname'] . "' to patient." . "</span>";
            }
        }
	}

	if ($_POST['add'] == "Add Primer Set"){

        if (($_POST['name'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_menu.php');
        } else {

            if(!($stmt = $mysqli->prepare("INSERT INTO cs275_primer_pair(name, ABV, sid, bid, cid, description)
                                            VALUES (?,?,?,?,?,?)
                                            ON DUPLICATE KEY UPDATE name = VALUES(name), ABV = VALUES(ABV), sid = VALUES(sid), bid = VALUES(bid),  cid = VALUES(cid), description = VALUES(description)"))){
                echo "Prepare failed WE ARE HERE: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("sdiiis",$_POST['name'],$_POST['abv'],$_POST['mutation'],$_POST['primer'],$_POST['primer1'],$_POST['description']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                include('header.php');
                echo "<span>" . "Added '" . $_POST['name'] . "' to Primer Set." . "</span>";
            }
        }
	}

	if ($_POST['add'] == "Add Primer"){

        if (($_POST['name'] == '') || ($_POST['sequence'] == '') || ($_POST['direction'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_menu.php');
        } else {

            if(!($stmt = $mysqli->prepare(	"INSERT INTO cs275_primer(name, sequence, direction, lid)
                                            VALUES (?,?,?,?)
                                            ON DUPLICATE KEY UPDATE name = VALUES(name), lid = VALUES(lid)"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("sssi",$_POST['name'],$_POST['sequence'],$_POST['direction'],$_POST['gene']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                include('header.php');
                echo "<span>" . "Added '" . $_POST['name'] . "' to PREIMER." . "</span>";
            }
        }
	}

	
		if ($_POST['add'] == "Add Primer2"){

        if (($_POST['name'] == '') || ($_POST['sequence'] == '') || ($_POST['direction'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_menu.php');
        } else {

            if(!($stmt = $mysqli->prepare(	"INSERT INTO cs275_primer_reverse(name, sequence, direction, lid)
                                            VALUES (?,?,?,?)
                                            ON DUPLICATE KEY UPDATE name = VALUES(name), lid = VALUES(lid)"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("sssi",$_POST['name'],$_POST['sequence'],$_POST['direction'],$_POST['gene']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                include('header.php');
                echo "<span>" . "Added '" . $_POST['name'] . "' to PREIMER." . "</span>";
            }
        }
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	if ($_POST['add'] == "Add mutation"){

        if (($_POST['name'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_menu.php');
        } else {

            if(!($stmt = $mysqli->prepare(	"INSERT INTO cs275_mutation(name, notes)
                                            VALUES (?,?)
                                            ON DUPLICATE KEY UPDATE name = VALUES(name), notes = VALUES(notes)"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("ss",$_POST['name'],$_POST['notes']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                include('header.php');
                echo "<span>" . "Added '" . $_POST['name'] . "' to Mutation." . "</span>";
            }
        }
	}

	if ($_POST['add'] == "Add gene"){

        if (($_POST['name'] == '') || ($_POST['chromosome'] == '') || ($_POST['coordinates'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_menu.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_menu.php');
        } else {

            if(!($stmt = $mysqli->prepare(	"INSERT INTO cs275_gene(name, chromosome, coordinates)
                                            VALUES (?,?,?)
                                            ON DUPLICATE KEY UPDATE name = VALUES(name), chromosome = VALUES(chromosome), coordinates = VALUES(coordinates)"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("sss",$_POST['name'],$_POST['chromosome'],$_POST['coordinates']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                include('header.php');
                echo "<span>" . "Added '" . $_POST['name'] . ", " . $_POST['chromosome'] . ", " . $_POST['coordinates'] . "' to Locations." . "</span>";
            }
        }
	}

	if ($_POST['add'] == "Add Best Primers"){
        if(!($stmt = $mysqli->prepare(	"INSERT INTO cs275_best_combination(uid, bid)
                                        VALUES (?,?)
                                        ON DUPLICATE KEY UPDATE uid = VALUES(uid), bid = VALUES(bid)"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!($stmt->bind_param("ii",$_POST['name'],$_POST['primer_set']))){
            echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
            echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
        } else {
            include('header.php');
            echo "<span>" . "Primer Set is Added." . "</span>";
        }
	}
	?>
</body>
</html>