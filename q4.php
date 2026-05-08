<?php include('dbconnect.php'); ?>
<form method="POST">
    Name: <input name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Pass: <input type="password" name="password" required><br>
    <button name="register">Register</button>
</form>

<?php
if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO registrations (name, email, password) VALUES ('$name', '$email', '$pass')";
    if(mysqli_query($conn, $sql)) echo "Data Stored!";
}
?>