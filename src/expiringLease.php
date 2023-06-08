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
            <div class="col d-flex flex-column align-items-center">
              <hr>
              <h2>Lease Agreements Expiring Soon</h2>
              <br>
                
                <?php
                  // Connect to your database
                  $conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

                  // Prepare the SQL statement to fetch the expiring properties
                  $sql = "SELECT RPNUMBER, RPCITY, RPSTREET, RPZIPCODE,STARTDATE,ENDDATE
                            FROM LeaseAgreement
                              WHERE EndDate - SYSDATE <= 60 AND SYSDATE < EndDate";

                  $stid = oci_parse($conn, $sql);
                  // Execute the SQL statement
                  oci_execute($stid);

                  // Fetch the expiring properties
                  echo '<table class="table">';
                  echo "<tr>
            <th>Property Number</th>
            <th>City</th>
            <th>Street</th>
            <th>Zip Code</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>";
          $found=false;
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
      $found=true;
        echo "<tr>";
        foreach ($row as  $column => $value) {
            echo "<td>" . ($value !== null ? htmlentities($value, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";

    if(!$found){
      echo "<div class='text-danger'>No expiring soon lease agreements found.<div>";
    }
    

oci_free_statement($stid);
// Close the Oracle connection
oci_close($conn);

// Return the expiring properties as a JSON response

?>

              </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.php' ?>
  </div>
  
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  

</body>

</html>
