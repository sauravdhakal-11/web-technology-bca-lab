<form method="POST" enctype="multipart/form-data">
    <input type="file" name="doc">
    <button type="submit">Upload</button>
</form>

<?php
if($_FILES){
    $path = "uploads/" . $_FILES['doc']['name'];
    if(move_uploaded_file($_FILES['doc']['tmp_name'], $path)) echo "File Saved!";
}
?>