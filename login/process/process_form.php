<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data from the AJAX request
    //  echo '<pre>', var_dump($_POST, true) ?: 'undefined index', '</pre>';
    $role        = $_POST['userrole'];
    $newusername = $_POST['addusername'];
    $newPassword = $_POST['newpassword']; // Use a unique name for the New Password input field
    $confirmPassword = $_POST['confirmpassword']; // Use a unique name for the Confirm Password input field
    // echo '<pre>', var_dump($username,$newPassword,$confirmPassword, true) ?: 'undefined index', '</pre>';
    // Perform validation, e.g., checking if passwords match and meet criteria
    if ($newPassword !== $confirmPassword || strlen($newPassword) < 8) {
        echo json_encode(array('status' => 'error'));
        // echo "Password validation failed. Make sure passwords match and are at least 8 characters long.";
    } else {
        // Insert the data into the user_accounts table (make sure to set up your database connection)
        include '../../dbconnection.php';

        // Sanitize data before insertion (for better security, use prepared statements)
        $newusername = $conn->real_escape_string($newusername);
        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT); // Hash the password for security

        // Insert the data into the table
        $sql = "INSERT INTO users (username, password, idkey , userkey) VALUES ('$newusername', '$newPassword','1' , '$role')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('status' => 'success'));
            // echo "User account created successfully.";
        } else {
                 // Return a JSON response indicating failure
            echo json_encode(array('status' => 'error'));
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else {
    // Handle invalid requests or provide an error message
    echo "Invalid request";
}
?>