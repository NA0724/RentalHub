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


$('#newProperty-select').click(function() {
    var rpNumber = $('#rpNumber').val();
    var street = $('#street').val();
    var city = $('#city').val();
    var zip = $('#zipcode').val();
    var rooms = $('#rooms').val();
    var rent = $('#rent').val();
    var ownerName = $('#ownerName').val();
    var ownerPhone = $('#ownerPhone').val();
   
    // Make an AJAX request to add the new property
    $.ajax({
      type: 'POST',
      url: 'addProperty.php',
      data: { 
        rpNumber: rpNumber,
        street: street,
        city: city,
        zipcode: zip,
        rooms: rooms,
        rent: rent,
        ownerName: ownerName,
        ownerPhone: ownerPhone
       },
      dataType: 'html',
      success: function(response) {
        // Display the response in the designated div
        $('#newProperty-results').html(response);
      },
      error: function() {
        alert('An error occurred while adding the new property.');
      }
    });
  });

  function populateDropdown() {
    $.ajax({
      type: 'GET',
      url: 'procBranchSelection.php',
      dataType: 'text',
      success: function(response) {
       
        var options = response.split('\n');
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
  // Make an AJAX request to fetch the expiring properties
  $.ajax({
    type: 'POST',
    url: 'owner_property.php',
    data: { 
        branch: branch,
        ownerName: owner,
        ownerphone: phone

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

  $('#renter-select').click(function() {
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

    $('#newEmp-select').click(function() {
        var name = $('#empName').val();
        var phone = $('#phone').val();
        var branch = $('#branch').val();
        var manager = $('#manager').val();
        var id = $('#id').val();
        var date = $('#date').val();
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
              id: id
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
















});