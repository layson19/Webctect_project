<?php
// Assuming you have a database connection established
// Replace the connection details with your actual database credentials
$connection = pg_connect("host=localhost dbname=mydb user=postgres password=postgres");

// Check if the connection was successful
if (!$connection) {
    echo "Failed to connect to the database.";
    exit;
}

// Fetch data from the database
$query = "SELECT * FROM gamer";
$result = pg_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data as an associative array
    $row = pg_fetch_assoc($result);
    $gmr_name = $row['gmr_name'];
    $gmr_favorgame = $row['gmr_favorgame'];

    // Create an array with the fetched data
    $data = [
        'Name' => $gmr_name,
        'Favorite Game' => $gmr_favorgame
    ];

    // Convert data to JSON
    $jsonData = json_encode($data);

    // Send the JSON response
    header('Content-Type: application/json');
    echo $jsonData;
} else {
    // Handle query error
    echo "Error executing query: " . pg_last_error($connection);
}

// Close the database connection
pg_close($connection);
?>
