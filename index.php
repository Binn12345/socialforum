<?php
session_start();

// Check if the user is already authenticated
if (isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated'] === true) {
    // User is already logged in; redirect to another page
    header('Location: login/'); // Change "dashboard.php" to the desired page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'headscript.php'; ?>
</head>

<body>

  <main>
  <?php include 'loginyield.php'; ?>
  </main><!-- End #main -->

  <?php include 'jsscript.php'; ?>


  <?php 
  
    if(empty(get_defined_vars()['_SESSION'])){
      include 'login/index.php'; 
    }

  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  // function checkForUpdates() {
  //   $.ajax({
  //     url: 'check_updates.php',
  //     type: 'GET',
  //     dataType: 'json',
  //     success: function (data) {
  //       if (data.updated) {
  //         console.log("Server Response: Updates detected.");
  //         location.reload();
  //       } else {
  //         console.log("Server Response: No updates detected.");
  //       }
  //     },
  //   });
  // }

  // // Poll for updates every 5 seconds (adjust the interval as needed)
  // setInterval(checkForUpdates, 3000);
</script>
  
</body>
  

</html>