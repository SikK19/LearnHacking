<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $text = sanitize_input($_POST['text']);

    // File to write to
    $filePath = "texts.txt";

    // Open the file and append the data
    $fileHandle = fopen($filePath, "a") or die("Unable to open file!");
    fwrite($fileHandle, $text);
    fclose($fileHandle);

    echo "Data saved.";
}

// A simple function to sanitize input data
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
