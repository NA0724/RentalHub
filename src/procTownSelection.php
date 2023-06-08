<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

$stid = oci_parse($conn, "SELECT DISTINCT CITY FROM RentalProperty");

oci_execute($stid);

$town = array();
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    $town[] = $row['CITY'];
}

oci_free_statement($stid);
oci_close($conn);

// Get the selected city from the submitted form data
$selectedTown = isset($_POST['town']) ? $_POST['town'] : '';

// Prepare the response data
$response = [
    'options' => $town,
    'selected' => $selectedTown
];

// Convert the response data to JSON format
$responseJson = json_encode($response);

// Set the response content type to JSON
header('Content-Type: application/json');

// Output the JSON response
echo $responseJson;
?>
