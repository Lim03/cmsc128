<?php 

// session killer for sessions where user was logged out due to inactivity.
// terminates the session and redirects the user back to the login page

session_start();
session_destroy();

echo "<script>alert('You have been log out due to inactivity. Log in again to go back.'); window.location.href='login.php';</script>";

?>