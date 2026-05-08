<?php
$filename = "example.txt";

// 1. WRITE OPERATION (Overwrites existing content)
$file = fopen($filename, "w") or die("Unable to open file for writing!");
$txt = "This is the initial text.\n";
fwrite($file, $txt);
fclose($file);
echo "File written successfully.<br>";

// 2. APPEND OPERATION (Adds content to the end)
$file = fopen($filename, "a") or die("Unable to open file for appending!");
$txt = "This text is appended to the existing content.\n";
fwrite($file, $txt);
fclose($file);
echo "Data appended successfully.<br>";

// 3. READ OPERATION (Reads and displays content)
if (file_exists($filename)) {
    $file = fopen($filename, "r") or die("Unable to open file for reading!");
    // Read the file until the end (EOF)
    while(!feof($file)) {
        echo fgets($file) . "<br>"; // Reads line by line
    }
    fclose($file);
} else {
    echo "Error: The file does not exist.";
}
?>
