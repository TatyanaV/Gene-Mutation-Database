<br>
<div>
<form method="post" action="update.php">
<fieldset>
<legend>Gene</legend>
<select name="gene">
<?php
if(!($stmt = $mysqli->prepare( "SELECT id, name, chromosome, coordinates
FROM cs275_gene
ORDER BY state ASC"))){
echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->bind_result($id, $name, $chromosome, $coordinates)){
echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
}
while($stmt->fetch()){
echo '<option value=" '. $id . ' "> ' . $name . ', ' . $chromosome . ', ' . $coordinates . '</option>\n';
}
$stmt->close();
?>
</select>
<p><a>*</a>Name: <input type="text" name="name" /></p>
<p><a>*</a>Chromosome: <input type="text" name="chromosome" /></p>
<p><a>*</a>Coordinates: <input type="text" name="coordinates" /></p>
</fieldset>
<input type="submit" name="update" value="Update Gene" />
</form>
</div>	
	
	
	
	
	
	
	
	<div>
	
	
		<form method="post" action="add.php"> 
		<fieldset>
			<legend>Primer</legend>
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
				</select><p class="caption">If gene does not exist in list, please add new gene below.</p></p>
		</fieldset>
		<input type="submit" name="add" value="Add Primer" />
		</form>
	</div>	
	

	
	
	
	
	
	
	
	

<br>
<div>
<form method="post" action="update.php">
<fieldset>
<legend>Primerr</legend>
<select name="primer">
<?php
if(!($stmt = $mysqli->prepare( "SELECT id, name
FROM cs275_primer
ORDER BY name ASC"))){
echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->bind_result($id, $name)){
echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
}
while($stmt->fetch()){
echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
}
$stmt->close();
?>
</select>
<p><a>*</a>Name: <input type="text" name="name" /></p>
<p>Gene: <select name="gene">
<?php
if(!($stmt = $mysqli->prepare( "SELECT id, name, chromosome, coordinates
FROM cs275_gene
ORDER BY state ASC"))){
echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->bind_result($id, $name, $chromosome, $coordinates)){
echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
}
while($stmt->fetch()){
echo '<option value=" '. $id . ' "> ' . $name. ', ' . $chromosome . ', ' . $coordinates . '</option>\n';
}
$stmt->close();
?>
</select><p class="caption">If primer does not exist in list, please add new primer.</p></p>
</select></p>
</fieldset>
<input type="submit" name="update" value="Update Primer"/>
</form>
</div>















