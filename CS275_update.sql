
I HAVE NOT FINISHED THE UPDATE SECTION OF THE PROGRAM 
AT THIS POINT ONLY CERTAIN VARIABLES CAN BE UPDATED


-- Project: Update Data

-- patients
SELECT id, fname, lname
FROM cs275_patients
ORDER BY lname ASC

--genes
SELECT id, name, chromosome, coordinates
FROM cs275_gene
ORDER BY chromosome ASC

--primer pair
SELECT id, name
FROM cs275_primer_pair
ORDER BY name ASC

--select primer

SELECT id, name, sequence, direction
FROM cs275_primer
ORDER BY name ASC


-- reverse primer
SELECT id, name, sequence, direction
FROM cs275_primer
ORDER BY name ASC


--select mutation
SELECT id, name
FROM cs275_mutation
ORDER BY name ASC


