<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Prepare the SQL statement to calculate the monthly earnings
$sql = "SELECT SUM(Rent * 0.1) AS MonthlyEarnings
        FROM RentalProperty
        WHERE PropertyStatus = 'leased'";

$stid = oci_parse($conn, $sql);

// Execute the SQL statement
oci_execute($stid);

// Fetch the monthly earnings
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

if ($row) {
    $monthlyEarnings = $row['MONTHLYEARNINGS'];
    echo $monthlyEarnings;
} else {
    echo '0';
}

// Close the Oracle connection
oci_close($conn);
?>
