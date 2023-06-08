<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Create Lease</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> </head>
	<link rel="stylesheet" href="style.css">
<body>
<?php include_once 'navbar.php' ?>
	  
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<h1 class="mt-3">Lease Agreement Form</h1>
				<hr>
				<form action="generate_lease.php" method="POST" target="_blank">
					<div class="row">
						<div class="form-group col" id="propertyDetails"></div>
						<input type="hidden" id="propertyId" name="propertyId"> </div>
					<div class="row">
						<div class="form-group col-6">
							<label for="renterName">Renter Name:</label>
							<br>
							<input class="form-control" type="text" id="renterName" name="renterName"> 
                        </div>
						<div class="form-group col-6">
							<label for="gender">Gender:</label>
							<br>
							<select class="form-control" id="gender" name="gender">
								<option value="Female">Female</option>
								<option value="Male">Male</option>
								<option value="NA">I do not want to disclose</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label for="renterHomePhone">Renter Home Phone:</label>
							<br>
							<input class="form-control" type="text" id="renterHomePhone" name="renterHomePhone">
							<br> </div>
						<div class="form-group col-6">
							<label for="renterWorkPhone">Renter Work Phone:</label>
							<br>
							<input class="form-control" type="text" id="renterWorkPhone" name="renterWorkPhone">
							<br> </div>
					</div>
                    <div><strong>The duration between start date and end date should be 6 months to 12 months.</strong></div><br>
					<div class="row">
						<div class="form-group col-6">
							<label for="startDate">Start Date:</label>
							<br>
							<input class="form-control" type="date" id="startDate" name="startDate"> </div>
						<div class="form-group col-6">
							<label for="endDate">End Date:</label>
							<br>
							<input class="form-control" type="date" id="endDate" name="endDate">
							<br> </div>
					</div>
					<input type="submit" class="btn btn-primary" name="generateLease" value="Generate Lease Agreement"> 
                    <a type="submit" class="btn btn-secondary" href="searchProperties.php" >Cancel</a>

					</div>
                </form>
					
			</div>
			<?php include_once 'footer.php' ?>
		</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
		$(document).ready(function() {
			var urlParams = new URLSearchParams(window.location.search);
			var propertyId = urlParams.get('rpnumber');
			// Set the hidden field's value to the propertyId
			$('#propertyId').val(propertyId);
			console.log("AJAX request completed.");
			$.ajax({
				url: 'property_details.php',
				data: {
					propertyId: propertyId
				},
				type: 'get',
				dataType: 'json',
				success: function(property) {
					var propertyDetails = `
            <tr>
        <td><strong>Property ID </strong></td>
        <td>: ${property.RPNUMBER}</td>
    </tr>
    <tr>
        <td><strong>Address </strong></td>
        <td>: ${property.STREET}, ${property.CITY}, ${property.ZIPCODE}</td>
    </tr>
    <tr>
        <td><strong>Rooms </strong></td>
        <td>: ${property.ROOMNO}</td>
    </tr>
    <tr>
        <td><strong>Status </strong></td>
        <td>: ${property.PROPERTYSTATUS}</td>
    </tr>
    <tr>
        <td><strong>Owner Phone </strong></td>
        <td>: ${property.OWNERPHONE}</td>
    </tr>
    <tr>
        <td><strong>Owner Name </strong></td>
        <td>: ${property.OWNERNAME}</td>
    </tr>
    <tr>
        <td><strong>Rent </strong></td>
        <td>: $ ${property.RENT} <br>(Note: If lease agreement is for 6 months, the rent will be 10% more than the displayed rent amount.)</td>
    </tr>
    
    `;
					$('#propertyDetails').html(propertyDetails);
					console.log(property);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log('Error:', textStatus, errorThrown);
				},
				complete: function() {
					console.log("AJAX request completed.");
				}
			});
		});
		</script>
</body>

</html>