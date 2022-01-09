<?php 

// session killer for sessions where user voluntarily log out
// terminates the session and redirects the user back to the login page

session_start();
session_destroy();

echo "<script>alert('You have been successfully logged out.'); window.location.href='login.php';</script>";


?>