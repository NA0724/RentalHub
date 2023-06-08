<?php
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');
// if($conn) {
//     print "<br> connection successful"; 
// }

$branch = $_POST['branch'];

// Prepare and execute SQL statement
$stid_branch = oci_parse($conn, "SELECT * FROM Branch WHERE BranchNumber = :branch");
oci_bind_by_name($stid_branch, ":branch", $branch);
oci_execute($stid_branch);

// Fetch each row in an associative array
$branch_row = oci_fetch_array($stid_branch, OCI_ASSOC+OCI_RETURN_NULLS);

echo "<h2>Branch Details</h2>";

echo "<p>" ;
echo "<div class='table-responsive'>";
echo "<table class='table table-bordered table-sm custom-table'>";
if ($branch_row) {
    foreach ($branch_row as $key => $value) {
        // Customize the label based on the attribute name
        $label = "";
        switch ($key) {
            case "BRANCHPHONE":
                $label = "Contact Number";
                break;
            case "STREET":
                $label = "Street";
                break;
            case "CITY":
                $label = "City";
                break;
            case "ZIPCODE":
                $label = "Zipcode";
                break; 
            case "BRANCHNUMBER";
                $label = "Branch Id";
                break;     
        }
        
        // Display the attribute with the custom label
        
        echo "<tr><td><strong>" . $label . "</strong></td><td>" . $value . "</td></tr>";
       
    }
    echo "</table>";
}

if ($branch_row) {
    //foreach ($branch_row as $item) {
    //    echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . " ";
    //}
    echo "<br>\n";
    // Prepare and execute SQL statement to retrieve employees in the selected branch
    $stid_employees = oci_parse($conn, "SELECT * FROM Employee WHERE BranchID = :branch");
    oci_bind_by_name($stid_employees, ":branch", $branch);
    oci_execute($stid_employees);

    // Display employees in a table
    echo "<h2>Employees in the Branch</h2>";
    echo '<table class="table">';
    echo "<tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Employee Phone</th>
            <th>Start Date</th
            ><th>Position</th>
            <th>Branch ID</th>
            <th>Manager ID</th
        </tr>";
    while ($employee_row = oci_fetch_array($stid_employees, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($employee_row as $item) {
            echo "<td>" .  htmlentities($item, ENT_QUOTES) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
    echo "<br>\n";
   
    // Retrieve rental properties available for the selected branch
    $stid_properties = oci_parse($conn, "SELECT * 
    FROM RentalProperty 
    WHERE RPNumber IN (SELECT RPNumber 
                    FROM Supervise 
                    WHERE SupId IN (SELECT EmployeeId 
                                    FROM Employee 
                                    WHERE BranchID = :branch))"
    );
    oci_bind_by_name($stid_properties, ":branch", $branch);                           
    oci_execute($stid_properties);
     // Display rental properties in a table
     // Get the number of rows in the result set
    // Fetch rows into an array
    // Fetch rows one by one and count the number of rows

    $stid_avlproperties = oci_parse($conn, "SELECT Count(*) 
    FROM RentalProperty 
    WHERE PropertyStatus='available' AND RPNumber IN (SELECT RPNumber 
                    FROM Supervise 
                    WHERE SupId IN (SELECT EmployeeId 
                                    FROM Employee 
                                    WHERE BranchID = :branch))"
    );
    oci_bind_by_name($stid_avlproperties, ":branch", $branch);                           
    oci_execute($stid_avlproperties);

    $numRows = 0;
    while ($property_row = oci_fetch_array($stid_avlproperties, OCI_ASSOC+OCI_RETURN_NULLS)) {
        $numRows++;
    // Process the fetched row as needed
    }
    
    // Reset the pointer to the beginning of the result set
    oci_execute($stid_properties);
    echo "<h2>All Rental Properties managed by this Branch</h2>";
    //echo "Number of Properties Available to Rent: ". $numRows ."<hr>";
    echo '<table class="table">';
    echo "<tr>
            <th>Property Number</th>
            <th>Street</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Room Count</th>
            <th>Rent</th>
            <th>Property Status</th>
            <th>Owner Phone</th>
        </tr>";
    while ($property_row = oci_fetch_array($stid_properties, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($property_row as $key => $value) {
            
            if($value==='available'){
                echo "<td> Available <button onclick='window.location.href=\"createLease.php?rpnumber=" . $property_row['RPNUMBER'] . "\"'>Create Lease Agreement</button></td>";

            }else{
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No such branch found.";
}
oci_free_statement($stid_branch);
oci_close($conn);
?>
