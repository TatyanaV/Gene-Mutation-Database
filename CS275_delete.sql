
-- Project: Delete Data

-- delete patients
DELETE FROM cs275_patients
WHERE id = [patients id];

-- delete primer sets
DELETE FROM cs275_primer_pair
WHERE id = [];

-- delete primer
DELETE FROM cs275_primer
WHERE id = [primer id];

-- delete primer
DELETE FROM cs275_primer_reverse
WHERE id = [primer_reverse id];

-- delete mutation
DELETE FROM cs275_mutation
WHERE id = [mutation id];

-- delete gene
DELETE FROM cs275_gene
WHERE id = [location gene];

-- delete good primers
DELETE FROM cs275_best_combination
WHERE uid = [patient id] AND bid = [primer_pair id];