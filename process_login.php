<?php
session_start();
// Database connection parameters
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute() && $stmt->get_result()->num_rows === 1) {
        $_SESSION['user_authenticated'] = true;
        $var['temp'] = user_details($username, $password);
        header('Location: login/');
        exit;
    } else {
        header('Location: index.php?error=1');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

function user_details($username, $password)
{
    // Database connection parameters
    include 'dbconnection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = isset($_POST['username']) ? $_POST['username'] : $username ;
        $password = isset($_POST['password']) ? $_POST['password'] : $password ;

        $query = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                // Authentication successful
                $user_data = $result->fetch_assoc();
                // Fetch the user data as an array
                $_SESSION['user_authenticated'] = true;
                $_SESSION['user_data'] = $user_data;
                $hashedUserKey = password_hash($user_data['userkey'], PASSWORD_BCRYPT);
            

                // Redirect to the login page
                header("Location: login/?=$hashedUserKey");
                exit;
            } else {
                header('Location: index.php?error=1');
                exit;
            }
        } else {
            header('Location: index.php?error=2'); // Error in executing the statement
            exit;
        }
    } else {
        header('Location: index.php');
        exit;
    }
}

