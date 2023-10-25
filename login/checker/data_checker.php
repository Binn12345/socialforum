<?php

session_start();

// Check if the user is authenticated
if (!isset($_SESSION['user_authenticated']) || $_SESSION['user_authenticated'] !== true) {
    // User is not authenticated; redirect to the login page
    header('Location: /..');
    exit;
}

  $user_data = $_SESSION['user_data'];
  // Now you can use $user_data to access user information
  $user_id = $user_data['id'];
  $username = $user_data['username'];