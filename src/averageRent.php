<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the town from the form submission
$town = $_POST['town'];

// Prepare the SQL statement to calculate the average rent
$sql = "SELECT AVG(Rent) AS AverageRent
FROM RentalProperty
WHERE City = :town";

$stid = oci_parse($conn, $sql);

// Bind the town parameter
oci_bind_by_name($stid, ":town", $town);

// Execute the SQL statement
oci_execute($stid);

// Fetch the average rent
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

if ($row) {
    $averageRent = $row['AVERAGERENT'];
    echo " $averageRent";
} else {
    echo "No properties found in $town.";
}

// Close the Oracle connection
oci_close($conn);
?>
