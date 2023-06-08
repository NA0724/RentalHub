<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("Location: login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>
<?php include 'navbar.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="container">
          <div class="row">
            <div class="col">
              <hr>
              <h4>Welcome to the dashboard, <?php echo htmlspecialchars($_SESSION["name"]);?></h4>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
              <a href="branch.php" class="btn btn-primary btn-block mt-3">Show Branch Details</a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <a href="manager.php" class="btn btn-primary btn-block mt-3">Show Manager Details</a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <a href="ownerProperties.php" class="btn btn-primary btn-block mt-3">Show All Rental Properties For A Owner</a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <a href="searchProperties.php" class="btn btn-primary btn-block mt-3">Search Properties</a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <!--<a href="renter.html" class="btn btn-primary btn-block mt-3">Show Frequent Renters</a>-->
              <button class="btn btn-primary btn-block mt-3" id="fetchMultipleRenters">Show Frequent Renters</button>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <a href="expiringLease.php" class="btn btn-primary btn-block mt-3">Show Expiring Lease Agreements</a>
            </div>
          </div>
          <hr>
        </div>

        <div class="container">
          <div class="row">
            <div class="col">
              <h5 class="mt-3">Search Lease Agreements For A Renter</h5>
              <hr>
              <form id="leaseForm" action="showLeaseAgreement.php" method="post">
                <div class="form-row align-items-center">
                  <div class="col-md-4 mb-2 mb-md-0">
                    <label for="renterName">Enter Renter's Name:</label>
                    <input type="text" id="renterName" name="renterName" class="form-control">
                  </div>
                  <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <strong>OR</strong>
                  </div>
                  <div class="col-md-4 mb-2 mb-md-0">
                    <label for="renterPhone">Enter Renter's Phone:</label>
                    <input type="text" id="renterHomePhone" name="renterHomePhone" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label for=""></label>
                    <input type="submit" value="Search"class="btn btn-primary btn-block">
                  </div>
                </div>
              <hr>
              <br>
              </form>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col">
              <div id="averageRentSection">
              <h5>Calculate Average Rent</h5>
              <form id="averageRentForm" action="averageRent.php" method="post" class="mb-5">
                <div class="form-row align-items-center">
                  <div class="col-md-1">
                    <label for="town">Town:</label>
                  </div>
                  <div class="col-md-6 mb-2 mb-md-0">
                    <select id="town" name="town" class="form-control"></select>
                  </div>
                  <div class="col-md-5">
                    <button type="submit" class="btn btn-primary btn-block">Calculate</button>
                  </div>
                </div>
              </form>
            </div>
              <div class="col" id="averageRentResult"></div>
              <hr>
          </div>
          </div>
        </div>

        

        <div class="container">
          <div class="row">
            <div class="col">
              <h5 class="mt-3">Show Monthly Income</h5>
              <div class="d-flex align-items-center">
                <button class="btn btn-primary" id="calculateEarningsButton">Monthly Income</button>
                &nbsp;&nbsp;
                <div class="col" id="earnings"></div>
              </div>
              <hr>
            </div>
          </div>
        </div>

        <div class="container"></div>
      </div>
    </div>
    <?php include_once 'footer.php' ?>
  </div>
  <!--<div id="rentersModal" class="container">
    <div class="content">
      <h3>Renters with Multiple Rentals</h3>
      <div id="modalRentersList"></div>
    </div>
  </div>-->

  <div class="modal fade" id="rentersModal" tabindex="-1" role="dialog" aria-labelledby="rentersModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentersModalLabel">Renters with Multiple Rentals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalRentersList"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  

    </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="fetchMultipleRenters.js"></script>
  <script>
    $(document).ready(function() {
      function populateTownDropdown() {
        $.ajax({
          type: 'GET',
          url: 'procTownSelection.php',
          dataType: 'json',
          success: function(response) {
            var options = response.options;
            var selected = response.selected;
            var select = $('#town');

            // Clear existing options
            select.empty();

            // Append new options
            $.each(options, function(index, option) {
              if (option !== '') {
                select.append($('<option>').val(option).text(option));
              }
            });

            // Set the selected value if available
            if (selected) {
              select.val(selected);
            }
          }
        });
      }

      populateTownDropdown();

      $('#calculateEarningsButton').click(function() {
        $.ajax({
          type: 'GET',
          url: 'calculateEarnings.php',
          dataType: 'html',
          success: function(response) {
            $('#earnings').html(' $' + response);
          },
          error: function() {
            alert('An error occurred while calculating the earnings.');
          }
        });
      });

      $('#averageRentForm').submit(function(e) {
        e.preventDefault();

        // Retrieve the selected town
        var town = $('#town').val();

        // Make an AJAX request to calculate the average rent
        $.ajax({
          type: 'POST',
          url: 'averageRent.php',
          data: {
            town: town
          },
          dataType: 'text',
          success: function(response) {
            // Display the average rent on the page
            $('#averageRentResult').text('Average Rent for ' + town + ': $' + response);
          },
          error: function() {
            alert('An error occurred while calculating the average rent.');
          }
        });
      });
    });
  </script>

</body>

</html>
