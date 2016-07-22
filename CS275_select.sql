
-- Project: Select Data
--selection patients
SELECT U.fname, U.lname, L.name, L.chromosome, L.coordinates
FROM cs275_patients U
LEFT JOIN cs275_gene L ON L.id = U.lid
ORDER BY U.lname, U.fname ASC")))


--select a primer_set
SELECT BE.name, BE.ABV, S.name, BR.name, BR.sequence, R.name, R.sequence, BE.description
FROM cs275_primer_pair BE
LEFT JOIN cs275_mutation S ON S.id = BE.sid
LEFT JOIN cs275_primer BR ON BR.id = BE.bid 
LEFT JOIN cs275_primer_reverse R ON R.id = BE.cid 
ORDER BY BE.name ASC"


--select a primer
"SELECT BR.name, L.name, L.chromosome, L.coordinates, BR.sequence, BR.direction
FROM cs275_primer BR
LEFT JOIN cs275_gene L ON L.id = BR.lid
ORDER BY BR.name ASC"



--select a primer_reverse
"SELECT BR.name, L.name, L.chromosome, L.coordinates, BR.sequence, BR.direction
FROM cs275_primer BR
LEFT JOIN cs275_gene L ON L.id = BR.lid
ORDER BY BR.name ASC"



--mulect mutation
SELECT name, chromosome, coordinates
FROM cs275_gene
ORDER BY chromosome ASC



--selection a primer combination that worked for the patients
SELECT U.fname, U.lname, BE.name, BR.name, R.name, R.sequence, BR.sequence
FROM cs275_patients U
INNER JOIN cs275_best_combination FB ON FB.uid = U.id
INNER JOIN cs275_primer_pair BE ON BE.id = FB.bid
LEFT JOIN cs275_primer BR ON BR.id = BE.bid 
LEFT JOIN cs275_primer_reverse R ON R.id = BE.cid 
ORDER BY U.lname, U.fname ASC"




