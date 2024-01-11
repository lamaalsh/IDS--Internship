<?php
session_start();

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Redirect the user to the login page if not logged in
if (!isLoggedIn()) {
    header('Location: reg2.php'); // Replace 'login.php' with your actual login page URL
    exit();
}
?>
