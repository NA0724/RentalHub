<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include_once 'navbar.php' ?>

  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="col">
              <hr>
              <h2>Lease Agreements For The Renter</h2>
              <br>
              
                



<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

// Get the data from the form
$renterHomePhone = $_POST['renterHomePhone'];
$renterName = $_POST['renterName'];

// Prepare your SQL statement
$sql = "SELECT * FROM LeaseAgreement WHERE renterHomePhone = :renterHomePhone OR renterName = :renterName";

$stid = oci_parse($conn, $sql);

// Bind the data
oci_bind_by_name($stid, ":renterHomePhone", $renterHomePhone);
oci_bind_by_name($stid, ":renterName", $renterName);

// Execute the SQL statement
oci_execute($stid);
// Variable to track if at least one lease agreement is found
$leaseFound = false;

// Fetch the data
// Fetch the data

echo '<table class="table">';
    echo "<tr>
            <th>Property Number</th>
            <th>Street</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Renter Name</th>
            <th>Home Phone</th>
            <th>Work Phone</th>
            <th>Rent</th>
            <th>Deposit</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $leaseFound = true;
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td>" . ($value !== null ? htmlentities($value, ENT_QUOTES) : "&nbsp;") . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

if (!$leaseFound) {
    echo "<div class='text-danger'>No lease agreement found.<div>";
}


// Close the Oracle connection
oci_close($conn);
?>

            

        </div>
      </div>
    </div>
    <?php include_once 'footer.php' ?>
  </div>
  
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 

</body>

</html>
