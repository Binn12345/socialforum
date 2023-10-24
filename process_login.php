<?php
session_start();
// Database connection parameters
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'nativeconn';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// var_dump($conn);die;

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
    $host = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'nativeconn';

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                // Authentication successful
                $user_data = $result->fetch_assoc();
                $_SESSION['user_authenticated'] = true;
                $_SESSION['user_data'] = $user_data;
                $hashedUserKey = password_hash($user_data['userkey'], PASSWORD_BCRYPT);
                // Fetch the user data as an associative array
                // var_dump($user_data);die;

                // echo '<pre>', print_r($user_data, true) ?: 'undefined index', '</pre>';die;

                // You can now use $user_data to access user information
                // Example: $user_id = $user_data['id'];

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

