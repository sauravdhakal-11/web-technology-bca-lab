<?php
// Session
session_start();
$_SESSION['id'] = 101; // Store
echo "Session ID: " . $_SESSION['id']; // Retrieve
// session_destroy(); // Use to delete

// Cookie
setcookie("user_pref", "Dark Mode", time() + 3600); // Store
if(isset($_COOKIE['user_pref'])) echo "Cookie: " . $_COOKIE['user_pref']; // Retrieve
 setcookie("user_pref", "", time() - 3600); // Use to delete
?>