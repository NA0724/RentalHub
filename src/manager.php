<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Manager</title>
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
        <h1 class="mt-3">Select Manager</h1>
        <hr>
        <form id="manager-form" action="showManager.php" method="post">
          <select class="form-control" id="manager" name="manager">
            <!-- Options are filled by the procBranchSelection.php script -->
          </select>
          <!-- Add a hidden input field to store the branch number -->
          <input type="hidden" id="branchNumber" name="branchNumber">
          <br>
          
            <button type="button" id="manager-select" class="btn btn-primary">Submit</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
         
            <a href="employee.php" class="btn btn-primary">Add New Supervisor</a>
          <br>
        </form>
      </div>
      </div>
     </div>
     </div>
    <div id="manager-results" class="container"></div>
   </div>
   <?php include_once 'footer.php' ?>
    </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   <script>
    
    // Function to populate the manager dropdown based on the selected branch
    function populateManagerDropdown() {
     $.ajax({
       type: 'GET',
       url: 'procManagerSelection.php',
       dataType: 'text',
     //   data: { branch: branch },
       success: function(response) {
         var options = response.split('\n');
         var select = $('#manager');

         // Clear existing options
         select.empty();

         // Append new options
         $.each(options, function(index, option) {
           if (option !== '') {
             select.append($('<option>').val(option).text(option));
           }
         });
       }
     });
   }
   populateManagerDropdown();
   // Event listener for the branch dropdown change
 //   $('#branch').on('change', function() {
 //     var selectedBranch = $(this).val();

 //     // Call the function to populate the manager dropdown with the selected branch
 //     populateManagerDropdown(selectedBranch);
 //   });

   // Call the function to populate the manager dropdown when the page loads
 //   var selectedBranch = $('#branch').val();
 //   populateManagerDropdown(selectedBranch);

 // });

    $('#manager-select').click(function() {
      var selectedmanager = $('#manager').val();
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'showManager.php',
        data: { manager: selectedmanager },
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#manager-results').html(response);
        },
        error: function() {
          alert('An error occurred while fetching the expiring properties.');
        }
      });
    });
  
  </script>
</body>

</html>