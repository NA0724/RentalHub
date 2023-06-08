<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Branch</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include_once 'navbar.php' ?>
  
 <div class="container-fluid">
  <div class="row">
   <div class="container">
    <div class="row">
     <div class="col d-flex flex-column align-items-center">
      <div class="col-md-6">
       <h1 class="mt-3">Select Branch Id</h1>
       <hr>
       <form id="branch-form" action="showBranch.php" method="post">
        <select class="form-control" id="branch" name="branch">
        </select>
        <input type="hidden" id="branchNumber" name="branchNumber">
    
        <br>
        <button type="button" id="branch-select" class="btn btn-primary">Submit</button>
        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        <br>
      </form>
      </div>
      </div>
      </div>
     
    </div>
    <div id="branch-results" class="custom-container"></div>
   </div>
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

            // Set the selected value if available
            // var selectedValue = response.selected;
            // if (selectedValue) {
            //   select.val(selectedValue);
            // }
            }
        });
    }

      // Call the function to populate the dropdown when the page loads
        populateDropdown();
      
   
        $('form').on('submit', function(e) {
            var selectedBranch = $('#branch').val();
            $('#branchNumber').val(selectedBranch);
            // Display the value in the console
            console.log("branchnumber".selectedBranch);

            // Submit the form
            this.submit();
        });
    });
    
    $('#branch-select').click(function() {
      var selectedBranch = $('#branch').val();
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'showBranch.php',
        data: { branch: selectedBranch },
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#branch-results').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the expiring properties.');
        }
      });
    });
  
  </script>
</body>

</html>