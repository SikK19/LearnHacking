<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $postData = json_decode(file_get_contents('php://input'), true);

    $mysqli = new mysqli("mysql_db", "root", "root", "master");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    function validate_only_numbers($input) {
        $pattern = "/^[0-9]+$/";
        
        if (preg_match($pattern, $input)) {
            return true;
        } else {
            return false;
        }
    }

    /*if(isset($_POST['Favnumber'])){
        if(!validate_only_numbers($_POST['Favnumber'])){
            echo nl2br("Must enter a number into 'Favorite Number' field!");
        }
    }
    return;*/

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $createTable = $mysqli->query("CREATE TABLE IF NOT EXISTS Credentials (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100),
        passw VARCHAR(100),
        favnumber INT
    );");

    $stmt = $mysqli->prepare("INSERT INTO Credentials (`username`, `passw`, `favnumber`) VALUES (?, ?, ?)");

    if(isset($_POST['Username'])){
        $username = $_POST['Username'];
    } else {
        $username = 'a';    
    }

    if(isset($_POST['Password'])){
        $password = $_POST['Password'];
    } else {
        $password = 'a';    
    }

    if(isset($_POST['Favnumber'])){
        $favnumber = $_POST['Favnumber'];
    } else {
        $favnumber = 1;    
    }


    $stmt->bind_param("sss", $username, $password, $favnumber);

    try {
        $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $mysqli->close();

    // Return a response
    http_response_code(200); // Set the response code to 200 (OK)
    echo json_encode(['status' => 'success', 'message' => 'Data processed successfully']);
} else {
    // Return an error response if the request method is not POST
    http_response_code(405); // Set the response code to 405 (Method Not Allowed)
    echo json_encode(['status' => 'error', 'message' => 'Only POST requests are allowed']);
}
?>
