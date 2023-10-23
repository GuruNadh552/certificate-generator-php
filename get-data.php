<?php
include('connection.php');
// Perform a SELECT query to retrieve data
$query = "SELECT * FROM plants_data";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo "Error in Fetching Data!";
}

// Fetch data and store it in an array
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Convert the data to JSON format and send the response
header("Content-Type: application/json");
echo json_encode($data);

?>