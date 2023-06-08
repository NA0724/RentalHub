<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

$stid = oci_parse($conn, "SELECT CITY FROM RentalProperty WHERE PropertyStatus = 'available'");

oci_execute($stid);

$city = array();
//echo  oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    $city[] = $row['CITY'];
}

oci_free_statement($stid);
oci_close($conn);

// Get the selected branch from the submitted form data
$selectedCity = isset($_POST['city']) ? $_POST['city'] : '';

// Prepare the response data
$response = [
     'options' => $city,
    // 'options' => 9,
     'selected' => $selectedCity
];
// Generate the response as a string with each branch number on a separate line
 $response = implode("\n", $city);
// $response = implode("\n", $response);
// Set the response content type to plain text
header('Content-Type: text/plain');

// Output the response
echo $response;
?>
