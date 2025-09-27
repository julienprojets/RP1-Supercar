<?php
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "admin_users";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare and execute SQL
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($user['email'] === $email && $user['password'] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        echo "success";
    } else {
        echo "invalid_credentials"; 
    }
} else {
    echo "user_not_found";
}

$stmt->close();
$conn->close();
?>




<?php
// session_start();

// // Example after verifying credentials (replace with actual DB check)
// if (!isset($_SESSION['loggedin'])) {
//     // Check if the user is already logged in
//     $_SESSION['loggedin'] = true;
//     $_SESSION['username'] = $username; // Optional: store more info
//     echo "success";

//     // Redirect the user to the page they were trying to access
//     if (isset($_SESSION['redirect_to'])) {
//         $redirectUrl = $_SESSION['redirect_to'];
//         unset($_SESSION['redirect_to']); // Clear redirect URL after using it
//         header("Location: $redirectUrl");
//     } else {
//         // If no redirect URL, send them to the dashboard or default page
//         header("Location: index-admin.php");
//     }
//     exit();
// }
?>