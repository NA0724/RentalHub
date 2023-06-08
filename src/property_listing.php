<?php
// Retrieve the search criteria from the AJAX request
$city = isset($_GET['city']) ? $_GET['city'] : '';
$rooms = isset($_GET['rooms']) ? $_GET['rooms'] : '';
$minRent = isset($_GET['minRent']) ? $_GET['minRent'] : '';
$maxRent = isset($_GET['maxRent']) ? $_GET['maxRent'] : '';

// Connect to the database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Prepare the SQL statement based on the search criteria
 $sql = "SELECT * FROM RentalProperty WHERE PropertyStatus = 'available'";
// $sql = "SELECT * FROM RentalProperty WHERE PropertyStatus = 'leased'";


if (!empty($city)) {
  $sql .= " AND City = :city";
}

if (!empty($rooms)) {
  $sql .= " AND RoomNo = :rooms";
}

if (!empty($minRent)) {
  $sql .= " AND Rent >= :minRent";
}

if (!empty($maxRent)) {
  $sql .= " AND Rent <= :maxRent";
}

// Prepare and execute the SQL statement
$stid = oci_parse($conn, $sql);

if (!empty($city)) {
  oci_bind_by_name($stid, ":city", $city);
}

if (!empty($rooms)) {
  oci_bind_by_name($stid, ":rooms", $rooms);
}

if (!empty($minRent)) {
  oci_bind_by_name($stid, ":minRent", $minRent);
}

if (!empty($maxRent)) {
  oci_bind_by_name($stid, ":maxRent", $maxRent);
}

oci_execute($stid);



echo "<br>\n";
echo "<h1>Properties Available To Rent in ". $city ."</h1>";

echo '<table class="table">';
echo "<tr>
            <th>Property Number</th>
            <th>Street</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Room Count</th>
            <th>Rent</th>
            <th>Property Status</th>
            <th>Owner Phone</th>
            <th>Action</th>
        </tr>";
while ($property_row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
  echo "<tr>";
  // var_dump($property_row);
  foreach ($property_row as $column => $value) {
    echo "<td>" . ($value !== null ? htmlentities($value, ENT_QUOTES) : "&nbsp;") . "</td>";
  }
  echo "<td><button onclick='window.location.href=\"createLease.php?rpnumber=" . $property_row['RPNUMBER'] . "\"'>Create Lease Agreement</button></td>";



  echo "</tr>";
}
echo "</table>";
echo "</div>";

oci_free_statement($stid);
oci_close($conn);
?>
