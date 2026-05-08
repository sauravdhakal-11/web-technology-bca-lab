<?php include('dbconnect.php'); ?>
<form method="POST">
    Email: <input name="email"> 
    Pass: <input type="password" name="password">
    <button name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $res = mysqli_query($conn, "SELECT * FROM registrations WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);
    if($user && password_verify($_POST['password'], $user['password'])) {
        echo "Login Successful!";
    } else {
        echo "Invalid Login.";
    }
}
?>