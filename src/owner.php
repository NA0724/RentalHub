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
            <h1 class="mt-3">Add a New Owner</h1>
            <hr>
            <form id="newOwnerForm" action="addOwner.php" method="post">
              <div class="form-row align-items-center">
                <div class="form-group col-md-6">
                  <label for="ownerName">Enter Owner's Name:</label>
                  <input type="text" id="ownerName" name="ownerName" class="form-control">
                </div>
                <div class="form-group col-md-6">
                <label for="gender">Gender:</label>
							<br>
							<select class="form-control" id="gender" name="gender">
                            <option value="Female">Select Gender</option>
								<option value="Female">Female</option>
								<option value="Male">Male</option>
								<option value="NA">I do not want to disclose</option>
							</select>
                </div>
              </div>
              <div class="form-row align-items-center">
              <div class="form-group col-md-6">
                  <label for="phone">Enter Owner's Phone:</label>
                  <input type="text" id="phone" name="phone" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="street">Street:</label>
                  <input type="text" id="street" name="street" class="form-control">
                </div>
              </div>
              <div class="form-row align-items-center">
              <div class="form-group col-md-6">
                  <label for="city">City:</label>
                  <input type="text" id="city" name="city" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="zipcode">Zip Code:</label>
                  <input type="text" id="zipcode" name="zipcode" class="form-control">
                </div>
              </div>
              <br>
              <div class="form-row align-items-center">
              <div class="form-group col-3">
                <button type="button" id="ownerAdd-select" class="btn btn-primary btn-block">Add</button>
                 </div>
                 <div class="form-group col-3">
                 <a type="button" href="ownerProperties.php" class="btn btn-secondary btn-block">Cancel</a>
                 </div>
              </div>
              <br>
            </form>
          </div>
        </div>
        <div id="ownerAdd-results" class="container"></div>
      </div>
    </div>
    <?php include_once 'footer.php' ?>
  </div>
 
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   <script>
    // Wait for the document to be ready
    $(document).ready(function() {
      
    
    $('#ownerAdd-select').click(function() {
      var name = $('#ownerName').val();
      var phone = $('#phone').val();
      var street = $('#street').val();
      var city = $('#city').val();
      var zip = $('#zipcode').val();
      // Make an AJAX request to fetch the expiring properties
      $.ajax({
        type: 'POST',
        url: 'addOwner.php',
        data: { 
            ownerName: name,
            phone: phone,
            street: street,
            city: city,
            zip: zip
        },
        dataType: 'html',
        success: function(response) {
          // Display the expiring properties in the designated div
          $('#ownerAdd-results').html(response);
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