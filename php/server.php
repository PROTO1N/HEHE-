<?php
session_start(); // Start the session
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobportal');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// else{echo"yay";}

?>
