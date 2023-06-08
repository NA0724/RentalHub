// Wait for the document to be ready
/*$(document).ready(function() {
    // Get the modal element
    var modal = document.getElementById("rentersModal");
  
    // Get the button that opens the modal
    var btn = document.getElementById("fetchMultipleRenters");
  
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
  
    // When the user clicks the button, open the modal
    btn.onclick = function() {
      // Make an AJAX request to fetch the renters with multiple rentals
      $.ajax({
        type: 'GET',
        url: 'fetchMultipleRenters.php',
        dataType: 'json',
        success: function(response) {
          // Clear the modal renters list
          $('#modalRentersList').empty();
  
          // Add each renter to the modal renters list
          $.each(response, function(index, renter) {
            $('#modalRentersList').append('<p>' + renter + '</p>');
          });
  
          // Open the modal
          modal.style.display = "block";
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error: ' + status + error);
          console.log(xhr.responseText);
        }
      });
    }
  
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
  
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  });
*/

  $(document).ready(function() {
    // ...
    var span = document.getElementsByClassName("close")[0];
    $('#fetchMultipleRenters').click(function() {
      $.ajax({
        type: 'GET',
        url: 'fetchMultipleRenters.php',
        dataType: 'html',
        success: function(response) {
          
          // Update the modal content with the fetched data
          $('#modalRentersList').html(response);
          // Show the modal
          $('#rentersModal').modal('show');
        },
        error: function() {
          alert('An error occurred while fetching the frequent renters.');
        }
      });
    });
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
  
    
  
    // ...
  });
  
  