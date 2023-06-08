<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Owner</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include_once 'navbar.php' ?>
  
 <div class="container-fluid">
  <div class="row">
   <div class="container">
    <div class="row">
     <div class="col">
       <h1 class="mt-3">Search Available Properties</h1>
       <hr>
       <form id="propertySearchForm" action="property_listing.php" method="post">
        <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">Enter City/Town:</label>
                <select id="city" name="city" class="form-control"></select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="rooms">Enter Number Of Rooms:</label>
                <select id="rooms" name="rooms" class="form-control">
                  <option value="">-- Select Number of Rooms --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <!-- Add more room options as needed -->
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="minRent">Minimum Rent:</label>
                <input type="text" id="minRent" name="minRent" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="maxRent">Maximum Rent:</label>
                <input type="text" id="maxRent" name="maxRent" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button type="button" id="properties-select" class="btn btn-primary">Search</button>
            </div>
            <div class="col-md-6">
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
            </div>
          </div>
        <br>
      </form>
      
      </div>
     </div>
     
    </div>
    <div id="properties-results" class="container"></div>
   </div><?php include_once 'footer.php' ?>
    </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   <script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Handle form submission
        function populateCityDropdown() {
      $.ajax({
        type: 'GET',
        url: 'procCitySelection.php',
        dataType: 'text',
        success: function(response) {
          var options = response.split('\n');
          var select = $('#city');
  
          // Clear existing options
          select.empty();
  
          // Create an array to store unique options
          var uniqueOptions = [];
  
          // Append new options
          $.each(options, function(index, option) {
            if (option !== '' && !uniqueOptions.includes(option)) {
              uniqueOptions.push(option);
              select.append($('<option>').val(option).text(option));
            }
          });
        }
      });
    }
    
        populateCityDropdown();
        
    $('#properties-select').click(function() {
      
  
      // Retrieve the form input values
      var city = $('#city').val();
      var rooms = $('#rooms').val();
      var minRent = $('#minRent').val();
      var maxRent = $('#maxRent').val();
        $.ajax({
        type: 'GET',
        url: 'property_listing.php',
        data: {
          city: city,
          rooms: rooms,
          minRent: minRent,
          maxRent: maxRent
        },
        dataType: 'html',
        success: function(response) {
          // Display the property listing in the designated div
          $('#properties-results').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the property listing.');
        }
      });
    });
});
  </script>
</body>

</html>