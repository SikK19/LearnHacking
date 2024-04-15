<?php

header('Access-Control-Allow-Origin: *');

// Connect to MySQL database
$mysqli = new mysqli("mariadb", "root", "root", "hacking");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['Tablename'])) {
    $tableName = $_POST['Tablename'];
} else {
    $tableName = "test";
}

$query = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    passw VARCHAR(100)
);";

// Create Table
if ($mysqli->query($query) === TRUE) {
    echo "Table '$tableName' created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

die();
