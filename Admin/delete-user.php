<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "form_inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM users WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "success";  
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
