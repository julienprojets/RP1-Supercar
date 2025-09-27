<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "form_inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];

// Prepare the SQL query to update the user
$sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $username, $email, $id); // "ssi" means string, string, integer

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'User updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error updating user']);
}

$stmt->close();
$conn->close();
?>
