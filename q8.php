<?php 
include('dbconnect.php'); 
session_start(); // Must be at the top

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Fetch the user by email
    $res = mysqli_query($conn, "SELECT * FROM registrations WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);

    // 2. Verify password
    if($user && password_verify($password, $user['password'])) {
        // 3. Set session variables
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id']; // Optional: store ID for later use
        
        // 4. Redirect to dashboard
        header("Location: formhandling.php");
        exit(); // Always exit after a header redirect
    } else {
        $error = "Invalid Email or Password.";
    }
}
?>

<!-- HTML Form -->
<form method="POST">
    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    Email: <input name="email" type="email" required> 
    Pass: <input type="password" name="password" required>
    <button name="login">Login</button>
</form>
