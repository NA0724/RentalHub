<?php

$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');


$ownerPhone = $_POST['ownerPhone'];
$ownerName = $_POST['ownerName'];
$branchNumber = $_POST['branch'];


if (empty($_POST['ownerPhone'])) {
    // Retrieve the phone from the employee table based on the owner name
    $ownerName = $_POST['ownerName'];
    // Perform the database query to select the phone from the employee table
    $sql = "SELECT OWNERPHONE FROM Owner WHERE OwnerName = :ownerName";
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ":ownerName", $ownerName);
     oci_execute($stid);
    if ($row = oci_fetch_row($stid)) 
    {
      $ownerPhone = $row['OWNERPHONE'];
    } else 
    {
        echo "<div class='text-danger'>Owner Not Found.</div>";
    }
  } else 
  {
    // Use the provided ownerName value
    $ownerPhone = $_POST['ownerPhone'];
  }

  $branchNumber = $_POST['branch'];

  $stid = oci_parse($conn, "(SELECT * FROM RentalProperty WHERE OwnerPhone = :ownerPhone )INTERSECT 
  (SELECT * FROM RentalProperty WHERE RPNumber 
  IN (SELECT RPNumber FROM Supervise WHERE SupId IN (SELECT EmployeeId FROM
   Employee WHERE BRANCHID = :branchNumber)))");
  
  // oci_bind_by_name($stid, ":ownerName", $ownerName);
  oci_bind_by_name($stid, ":ownerPhone", $ownerPhone);
  oci_bind_by_name($stid, ":branchNumber", $branchNumber);
  oci_execute($stid);

    echo "<br>\n";
    // Display properties in a table
    echo "<h2>Properties Owned by $ownerName ($ownerPhone)</h2>";
    echo "<h4>Managed by Branch". $branchNumber ."</h4>";
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
          </tr>";
          $found=false;
    while ($propertyRow = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
$found=true;
      echo "<tr>";
      foreach ($propertyRow as $item) {
          echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
      }
      echo "</tr>";
    }
  echo "</table>";
  
  oci_free_statement($stid);
if(!$found){
  echo "<div class='text-danger'>No rental properties found for this owner.<div>";
}
  oci_close($conn);


?>

