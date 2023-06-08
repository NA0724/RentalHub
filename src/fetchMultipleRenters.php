<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Prepare your SQL statement
$sql = "SELECT RENTERNAME 
        FROM LeaseAgreement 
        GROUP BY renterName
        HAVING COUNT(*) > 1";

$stid = oci_parse($conn, $sql);

// Execute the SQL statement
oci_execute($stid);

// Fetch the data
$renters = array();

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    // Check if the renterName index is defined in the row
    if (isset($row['RENTERNAME'])) {
        $renters[] = $row['RENTERNAME'];
    }
    foreach ($renters as $key=>$value) {
    echo '<p>' . $value . '</p>';
}
}


// Close the Oracle connection
oci_close($conn);



?>
