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

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'headyield.php'; ?> 
<body>
  
  <?php 
  include 'navbaryield.php';
  include 'yieldside.php'; 
  ?>

  <main id="main" class="main">
    
    <?php 
       if($user_data['userkey'] == '1' || $user_data['userkey'] == '3' )
       {
         include 'admin/announcementbodyyield.php';
       }else{  
         include 'admin/404bodyyield.php';
       }

    ?>
    

  </main><!-- End #main -->
                
  <?php include 'footeryield.php' ?>

  <?php include 'scriptyield.php' ?>

</body>

</html>