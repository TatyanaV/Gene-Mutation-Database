
-- table of genes
DROP TABLE IF EXISTS cs275_gene;
CREATE TABLE cs275_gene(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	chromosome VARCHAR(255) NOT NULL,
	coordinates VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY (name, chromosome, coordinates)
) ENGINE=InnoDB;

-- table of patients
DROP TABLE IF EXISTS cs275_patients;
CREATE TABLE cs275_patients(
	id INT NOT NULL AUTO_INCREMENT,
	fname VARCHAR(255) NOT NULL,
	lname VARCHAR(255) NOT NULL,
	lid INT(11),
	PRIMARY KEY (id),
	UNIQUE KEY (fname, lname, lid),
	FOREIGN KEY (lid) REFERENCES cs275_gene(id) ON DELETE SET NULL
) ENGINE=InnoDB;


-- table of mutations
DROP TABLE IF EXISTS cs275_mutation;
CREATE TABLE cs275_mutation(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	notes TEXT,
	PRIMARY KEY (id),
	UNIQUE KEY (name)
) ENGINE=InnoDB;

-- table of primers
DROP TABLE IF EXISTS cs275_primer;
CREATE TABLE cs275_primer(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	lid INT(11),
	PRIMARY KEY (id),
	UNIQUE KEY (name),
	sequence VARCHAR(id);
	direction VARCHAR(id);
	FOREIGN KEY (lid) REFERENCES cs275_gene(id) ON DELETE SET NULL
) ENGINE=InnoDB;


--reverse primer
DROP TABLE IF EXISTS cs275_primer_reverse;
CREATE TABLE cs275_primer_reverse(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	lid INT(11),
	sequence VARCHAR(id);
	direction VARCHAR(id);
	PRIMARY KEY (id),
	UNIQUE KEY (name),
	FOREIGN KEY (lid) REFERENCES cs275_gene(id) ON DELETE SET NULL
) ENGINE=InnoDB;



--premir pair
DROP TABLE IF EXISTS cs275_primer_pair;
CREATE TABLE cs275_primer_pair(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	ABV DECIMAL(3,1),
	sid INT(11),
	bid INT(11),
cid INT(11),
	description TEXT,
	PRIMARY KEY (id),
	UNIQUE KEY (name),
	FOREIGN KEY (sid) REFERENCES cs275_mutation(id) ON DELETE SET NULL,
	FOREIGN KEY (bid) REFERENCES cs275_primer(id) ON DELETE SET NULL
	FOREIGN KEY (cid) REFERENCES cs275_primer_reverse(id) ON DELETE SET NULL
) ENGINE=InnoDB;



-- table for selection primers that worked the best for the patients
DROP TABLE IF EXISTS cs275_best_combination;
CREATE TABLE cs275_best_combination(
	uid INT(11),
	bid INT(11),
	PRIMARY KEY (uid, bid),
	FOREIGN KEY (uid) REFERENCES cs275_patients(id) ON DELETE CASCADE,
	FOREIGN KEY (bid) REFERENCES cs275_primer_pair(id) ON DELETE CASCADE
	FOREIGN KEY (cid) REFERENCES cs275_primer_pair(id) ON DELETE CASCADE
) ENGINE=InnoDB;