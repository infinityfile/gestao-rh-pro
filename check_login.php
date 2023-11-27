<?php
if (session_status() === PHP_SESSION_NONE) {
    // If session is not active, start the session
    session_start();
}

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>