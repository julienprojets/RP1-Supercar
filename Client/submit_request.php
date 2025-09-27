<?php
header("Content-Type: application/json"); // Ensure JSON response

$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$database = "test_drive";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Debugging: Check if request is received
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    exit();
}

// Debugging: Log all received data
error_log("Received data: " . print_r($_POST, true));

// Get form data
$last_name = $_POST['last_name'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$brand = $_POST['brand'] ?? '';
$model = $_POST['model'] ?? '';
$request_date = $_POST['request_date'] ?? '';
$request_time = $_POST['request_time'] ?? '';
$comments = $_POST['comments'] ?? '';

// Debugging: Check if data is empty
if (empty($last_name) || empty($first_name) || empty($email) || empty($phone) || empty($brand) || empty($model) || empty($request_date) || empty($request_time)) {
    echo json_encode(["status" => "error", "message" => "❌ All fields are required"]);
    exit();
}

// Insert into database
$sql = "INSERT INTO testdrive_request (last_name, first_name, email, phone, brand, model, request_date, request_time, comments) 
        VALUES ('$last_name', '$first_name', '$email', '$phone', '$brand', '$model', '$request_date', '$request_time', '$comments')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "✅ Request sent successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "❌ Database error: " . $conn->error]);
}

$conn->close();
?>
