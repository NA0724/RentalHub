<?php
// Retrieve the propertyId from the query parameter
$propertyId = $_GET['propertyId'];

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');
$stid = oci_parse($conn, "SELECT RP.RPNumber, RP.Street, RP.City, RP.ZipCode, RP.RoomNo, RP.Rent, RP.PropertyStatus, O.OwnerPhone, O.OwnerName FROM RentalProperty RP LEFT JOIN Owner O ON RP.OwnerPhone = O.OwnerPhone WHERE RP.RPNumber=:propertyId");
oci_bind_by_name($stid, ":propertyId", $propertyId);
oci_execute($stid);
// var_dump($property);
$property = oci_fetch_assoc($stid);
echo json_encode($property);


oci_close($conn);
?>
