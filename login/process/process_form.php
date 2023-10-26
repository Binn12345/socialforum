<?php

    include '../../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data from the AJAX request
    $role = $_POST['userrole'];
    $newusername = $_POST['addusername'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    // Perform validation, e.g., checking if passwords match and meet criteria
    if ($newPassword !== $confirmPassword || strlen($newPassword) < 8) {
        echo json_encode(array('status' => 'error'));
    } else {
        // Include the database connection file
      

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Generate a unique idkey using PHP's UUID function
        $idkey = uniqid();

        // Prepare the SQL statement
        $sql = "INSERT INTO users (idkey, username, password, userkey) VALUES (?, ?, ?, ?)";
        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssss", $idkey, $newusername, $newPassword, $role);
            // Execute the statement
            $result = $stmt->execute();

            // Check for errors
            if ($result) {
                $response = [
                    'status' => 'success',
                    'message' => 'Record inserted successfully.'
                ];
               
                echo json_encode($response);
            } else {
                
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // Handle invalid requests or provide an error message
    echo "Invalid request";
}
?>
