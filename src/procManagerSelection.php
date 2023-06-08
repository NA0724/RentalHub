<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

$stid = oci_parse($conn, "SELECT EMPNAME FROM Employee WHERE JobDesignation = 'manager'");

oci_execute($stid);
// echo $stid;
// Fetch each row in an associative array
// $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
// var_dump($row);
$managerName = array();
//echo  oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    // print $row['BRANCHNUMBER']; 
    //  echo $row['EMPNAME'];
    // $branchNumber = htmlentities($row['BRANCHNUMBER']);
    // echo '<option value="' . $branchNumber . '">' . $branchNumber . '</option>';
    $managerName[] = $row['EMPNAME'];
    // $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
}

oci_free_statement($stid);
oci_close($conn);

// Get the selected branch from the submitted form data
$selectedManager = isset($_POST['manager']) ? $_POST['manager'] : '';

// Prepare the response data
$response = [
     'options' => $managerName,
    // 'options' => 9,
     'selected' => $selectedManager
];
// Generate the response as a string with each branch number on a separate line
 $response = implode("\n", $managerName);
// $response = implode("\n", $response);
// Set the response content type to plain text
header('Content-Type: text/plain');

// Output the response
echo $response;
?>
