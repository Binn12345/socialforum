<?php
// Example logic: Check if a file has been modified within the last minute
$fileToCheck = 'index.php';
$lastModifiedTime = filemtime($fileToCheck);
$currentTimestamp = time();

$updated = ($currentTimestamp - $lastModifiedTime) <= 60; // Check if modified within 60 seconds

$response = array('updated' => $updated);
echo json_encode($response);
?>
