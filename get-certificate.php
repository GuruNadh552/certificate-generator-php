<?php
include('connection.php');

$phone = $_POST['phone'];

// Perform a SELECT query to retrieve data based on the phone number
$query = "SELECT * FROM plants_data WHERE phone = '$phone'";
$result = mysqli_query($connection, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $query2 = "SELECT * FROM certificates WHERE phone = '$phone'";
        $result2 = mysqli_query($connection, $query2);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            // Initialize an array to store the rows
            while ($row = mysqli_fetch_assoc($result2)) {
                // Add each row to the array
                $data[] = $row;
            }
            echo $data[0]['downloadLink'];
        }else  
            echo "Data not Verified Yet!";
    } else {
        // No data matching the provided phone number was found
        echo "No data found";
    }
} else {
    // Error in the query
    echo "Query error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
