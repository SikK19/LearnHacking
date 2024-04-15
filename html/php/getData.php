<?php

header('Access-Control-Allow-Origin: *');

// Connect to MySQL database
$mysqli = new mysqli("mariadb", "root", "root", "hacking");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from MySQL
$result = $mysqli->query("SELECT username FROM Credentials");

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close MySQL connection
$mysqli->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
