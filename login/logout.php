<?php
session_start();

// Unset the user_authenticated session variable to log the user out
unset($_SESSION['user_authenticated']);

// Redirect the user back to the login page
header('Location: ../');
exit;
