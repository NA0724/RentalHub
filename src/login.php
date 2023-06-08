<?php
// Connect to your database
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("Location: dashboard.php");
  exit;
} else {

  $id = $name = "";
  $id_err = $name_err = $login_err="";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate the ID and Name fields
    if (empty(trim($_POST["id"]))) {
      $id_err = "Please enter your ID.";
    } else {
      $id = trim($_POST["id"]);
    }

    if (empty(trim($_POST["name"]))) {
      $name_err = "Please enter your name.";
    } else {
      $name = trim($_POST["name"]);
    }

    // Check if there are no validation errors
    if (empty($id_err) && empty($name_err)) {
      $param_id = trim($_POST["id"]);
      $param_name = trim($_POST["name"]);

      $query = oci_parse($conn, "SELECT * FROM Employee WHERE EmployeeId = :param_id AND EmpName = :param_name");
      oci_bind_by_name($query, ":param_id", $param_id);
      oci_bind_by_name($query, ":param_name", $param_name);
      oci_execute($query);

      $nrows = oci_fetch_all($query, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

      echo "nrow " . $nrows;

      if ($nrows == 1) {
        session_start();
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["name"] = $name;

        // Redirect user to dashboard page
        header("location: dashboard.php");
        exit;
      } else {
        // ID and name combination is invalid, display an error message
        $login_err = "Invalid ID or name.";
      }
    }
  }
}

oci_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-3 heading">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="text-center">StrawberryField Rental Management Inc</h5>
           </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card custom-card">
          <div class="card-body custom-card-body">
            <?php
              if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
              }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="id" name="id" placeholder="Enter Employee ID" value="<?php echo htmlspecialchars($id); ?>">
                <span class="text-danger"><?php echo $id_err; ?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" value="<?php echo htmlspecialchars($name); ?>">
                <span class="text-danger"><?php echo $name_err; ?></span>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary custom-submit-button">Login</button>
              </div>
              <div class="text-center mt-3">
                <span class="text-danger"><?php echo $login_err; ?></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-3">
      <div class="col-md-6">
        <div class="custom-footer">
          <p class="custom-footer-text">&copy; 2023 StrawberryField Rental Property Management Inc. All rights reserved.</p>
          <a href="contact.html" class="custom-footer-text">Contact Us</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
