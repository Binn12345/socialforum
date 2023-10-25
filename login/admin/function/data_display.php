<?php

    include '../dbconnection.php';

    // Query to retrieve data
    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    // Check if there are results
    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $data = [];
    }

    // Close the database connection
    $conn->close();