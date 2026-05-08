<?php include('dbconnect.php'); ?>

<form method="POST">
    Title: <input name="title"> Author: <input name="author">
    <button name="add">Add Book</button>
</form>

<table border="1">
<?php
if(isset($_POST['add'])) {
    $t = $_POST['title']; $a = $_POST['author'];
    mysqli_query($conn, "INSERT INTO books (title, author) VALUES ('$t', '$a')");
}

$res = mysqli_query($conn, "SELECT * FROM books");
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>
        <td>".$row['title']."</td>
        <td><a href='edit.php?id=".$row['id']."'>Modify</a></td> <td><a href='delete.php?id=".$row['id']."'>Remove</a></td> </tr>";
}
?>
</table>