
-- Project: Insert Data

-- insert patient
INSERT INTO cs275_patient (fname, lname, lid)
VALUES([fname], [lname], (
	SELECT id FROM cs275_gene
	WHERE name = [name] AND chromosome = [chromosome] AND coordinates = [coordinates]))
ON DUPLICATE KEY UPDATE fname = VALUES(fname), 
						lname = VALUES(lname), 
						lid = VALUES(lid);

-- insert primer_pair
INSERT INTO cs275_primer_pair (name, ABV, sid, bid, cid description)
VALUES([name], [ABV],
	(SELECT id FROM cs275_mutation WHERE name = [name]),
	(SELECT id FROM cs275_primer WHERE name = [name]), [description])
ON DUPLICATE KEY UPDATE name = VALUES(name), 
ABV = VALUES(ABV), 
sid = VALUES(sid), 
bid = VALUES(bid), 
cid = VALUES(cid),
description = VALUES(description);
						
-- insert primer
INSERT INTO cs275_primer (name, lid, sequence, direction)
VALUES([name],(
	SELECT id FROM cs275_gene
	WHERE  name= [name] AND chromosome = [chromosome] AND coordinates = [coordinates]))
ON DUPLICATE KEY UPDATE name = VALUES(name),
						lid = VALUES(lid);

-- insert primer reverse
INSERT INTO cs275_primer_reverse (name, lid, sequence, direction)
VALUES([name],(
	SELECT id FROM cs275_gene
	WHERE  name= [name] AND chromosome = [chromosome] AND coordinates = [coordinates]))
ON DUPLICATE KEY UPDATE name = VALUES(name),
						lid = VALUES(lid);

-- insert mutation
INSERT INTO cs275_mutation (name, notes)
VALUES ([name], [notes]) 
ON DUPLICATE KEY UPDATE name = VALUES(name),
						notes = VALUES(notes); 

-- insert gene						
INSERT INTO cs275_gene(name, chromosome, coordinates) 
VALUES ([name],[chromosome],[coordinates]) 
ON DUPLICATE KEY UPDATE name = VALUES(name), 
						chromosome = VALUES(chromosome), 
						coordinates = VALUES(coordinates)
						
-- insert favorite primer_set
INSERT INTO cs275_best_combination(uid, bid)
VALUES(
	(SELECT id FROM cs275_users WHERE fname = [fname] AND lname = [lname]),
	(SELECT id FROM cs275_primer_pair WHERE name = [name]))
ON DUPLICATE KEY UPDATE uid = VALUES(uid), 
						bid = VALUES(bid), cid = VALUES(cid);;

