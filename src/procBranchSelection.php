<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');


$stid = oci_parse($conn, "SELECT BRANCHNUMBER, CITY FROM Branch");

oci_execute($stid);
$branchNumbers = array();
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    $branchNumbers[] = $row['BRANCHNUMBER'];
    $city[] = $row['CITY'];
}

oci_free_statement($stid);
oci_close($conn);

// Get the selected branch from the submitted form data
$selectedBranch = isset($_POST['branch']) ? $_POST['branch'] : '';

// Prepare the response data
$response = [
     'options' => $branchNumbers,
    // 'options' => 9,
     'selected' => $selectedBranch
];
// Generate the response as a string with each branch number on a separate line
 $response = implode("\n", $branchNumbers);
// $response = implode("\n", $response);
// Set the response content type to plain text
header('Content-Type: text/plain');

// Output the response
echo $response;


?>
