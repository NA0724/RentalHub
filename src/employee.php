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
<?php include 'navbar.php'; ?>
  
 <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="mt-3">Add a New Supervisor</h1>
            <hr>
            <form id="newEmployeeForm" action="addNewEmp.php" method="post">
              <div class="form-row align-items-center">
              <div class="form-group col-md-4">
                  <label for="id">Enter Employee Id:</label>
                  <input type="text" id="id" name="id" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="empName">Enter Employee Name:</label>
                  <input type="text" id="empName" name="empName" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="phone">Enter Employee Phone:</label>
                  <input type="text" id="phone" name="phone" class="form-control">
                </div>
              </div>
              <div class="form-row align-items-center">
                <div class="form-group col-md-4">
                  <label for="street">Branch Id:</label>
                  <select class="form-control" id="branch" name="branch"></select>
                </div>
                <div class="form-group col-md-4">
                  <label for="city">Manager Id:</label>
                  <select class="form-control" id="manager" name="manager"></select>
                </div>
                <div class="form-group col-md-4">
                  <label for="date">Employment Start Date:</label>
                  <input type="date" id="date" name="date" class="form-control">
                </div>
              </div>
              <div class="form-row align-items-center">
              <div class="form-group col-3">
                <button type="button" id="newEmp-select" class="btn btn-primary btn-block">Add</button>
                 </div>
                 <div class="form-group col-3">
                <a type="button" href="manager.php" class="btn btn-secondary btn-block">Cancel</a>
                 </div></div>
              <br>
            </form>
          </div>
        </div>
        <div id="newEmp-results" class="container"></div>
      </div>
    </div>
    <?php include_once 'footer.php' ?>
  </div>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   <script>
    // Wait for the document to be ready
    $(document).ready(function() {
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
    
    $('#newEmp-select').click(function() {
      var name = $('#empName').val();
      var phone = $('#phone').val();
      var branch = $('#branch').val();
      var manager = $('#manager').val();
      var id = $('#id').val();
      var date = $('#date').val();
      var role = 'supervisor';
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'addNewEmp.php',
        data: { 
            name: name,
            phone: phone,
            branch: branch,
            manager: manager,
            date: date,
            id: id,
            designation: role

        },
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#newEmp-results').html(response);
        },
        error: function() {
          alert('An error occurred while adding a new owner.');
        }
      });
    });
});
  </script>
</body>

</html>