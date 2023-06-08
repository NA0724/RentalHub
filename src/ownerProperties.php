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
       <h1 class="mt-3">Show Properties For a Owner</h1>
       <hr>
       <form id="owner-form" action="owner_property.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="ownerName">Enter Owner Name:</label>
            <input type="text" id="ownerName" name="ownerName" class="form-control" required>
          </div>
          <div class="form-group col-md-3">
            <label for="ownerPhone">Enter Owner Phone:</label>
            <input type="text" id="ownerPhone" name="ownerPhone" class="form-control" required>
          </div>
          <div class="form-group col-md-3">
            <label for="branch">Enter Branch No:</label>
            <select class="form-control" id="branch" name="branch"></select>
            <input type="hidden" id="branchNumber" name="branchNumber">
          </div>
          <div class="form-group col-md-1">
            <label class="invisible">Search</label>
            <button type="button" id="owner-select" class="btn btn-primary btn-block">Search</button>
          </div>
          <div class="form-group col-md-1">
            <label class="invisible">Cancel</label>
            <a type="button" href="ownerProperties.php" class="btn btn-secondary btn-block">Cancel</a>
          </div>
        </div>
         <br>
      </form>
      
      </div>
     </div>
     
    </div></div>
    <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-5">
          <a href="owner.php" class="btn btn-primary btn-block mt-3">Add A New Owner</a>
        </div>
        <div class="col-md-6 col-lg-5">
          <a href="property.php" class="btn btn-primary btn-block mt-3">Add A New Property</a>
        </div>
        </div>
    </div></div><br><hr>
    <div id="owner-results" class="container"></div>
   
   <?php include_once 'footer.php' ?>
    </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   <script>
    // Wait for the document to be ready
    $(document).ready(function() {
      // Function to populate the dropdown list
      function populateDropdown() {
        $.ajax({
          type: 'GET',
          url: 'procBranchSelection.php',
          dataType: 'text',
          success: function(response) {
            // console.log(response);
            // alert("Hello",response);
            // Handle the response and populate the dropdown options
            var options = response.split('\n');
            // print options;
            // After appending the options in the success callback
            console.log(options);

            var select = $('#branch');
            var select1 = $('#branchNo');
            // Clear existing options
            select.empty();
            select1.empty();

            // Append new options
            $.each(options, function(index, option) {
              if (option !== '') {
                select.append($('<option>').val(option).text(option));
                select1.append($('<option>').val(option).text(option));
              }
            });
            }
        });
    }

      // Call the function to populate the dropdown when the page loads
        populateDropdown();
      
   
        $('form').on('submit', function(e) {
            var selectedBranch = $('#branch').val();
            $('#branchNumber').val(selectedBranch);

           
    var ownerName = $('#ownerName').val();
    var ownerPhone = $('#ownerPhone').val();

    // Validate the input fields
    if (ownerName === '' || ownerPhone === '') {
      alert('Please fill in all the required fields.');
      return;
    }


            // Display the value in the console
            console.log("branchnumber".selectedBranch);

            // Submit the form
            this.submit();
        });
    });
    
    $('#owner-select').click(function() {
      var owner = $('#ownerName').val();
      var phone = $('#ownerPhone').val();
      var branch = $('#branch').val();

       // Validate the input fields
    if (ownerName === '' || ownerPhone === '') {
      alert('Please fill in all the fields.');
      return;
    }
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'owner_property.php',
        data: { 
            branch: branch,
            ownerName: owner,
            ownerPhone: phone

        },
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#owner-results').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the expiring properties.');
        }
      });
    });
  
  </script>
</body>

</html>