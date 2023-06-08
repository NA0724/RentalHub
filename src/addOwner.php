<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the data from the form
$ownerName = $_POST['ownerName'];
$ownerPhone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];
$zipcode = $_POST['zip'];
if(!$ownerPhone && !$ownerName){
    echo "<div class='text-danger'>Error inserting new owner.</div>";
}else{
// Prepare your SQL statement
$sql = "INSERT INTO Owner (OwnerName, OwnerPhone, Street, City, ZipCode)
        VALUES (:ownerName, :ownerPhone, :street, :city, :zipcode)";

$stid = oci_parse($conn, $sql);

// Bind the data
oci_bind_by_name($stid, ":ownerName", $ownerName);
oci_bind_by_name($stid, ":ownerPhone", $ownerPhone);
oci_bind_by_name($stid, ":street", $street);
oci_bind_by_name($stid, ":city", $city);
oci_bind_by_name($stid, ":zipcode", $zipcode);

// Execute the SQL statement
$result = oci_execute($stid);

// Check if the insertion was successful
if ($result) {
    // Display a success message or perform any other action
    echo "<div class='text-success'>New owner added successfully!<div>";
} else {
    // Display an error message or perform any other action
    echo "<div class='text-danger'>Error inserting new owner.</div>";
}}

// Close the Oracle connection
oci_close($conn);
?>
