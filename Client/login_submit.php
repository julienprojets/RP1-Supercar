<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "form_inscription");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prevent SQL injection
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Check if user exists
// $sql = "SELECT id, password FROM users WHERE username = '$username'";
// $result = $conn->query($sql);

// ✅ Check if user exists
$sql = "SELECT id, prenom, nom, username, email, password FROM users WHERE username='$username' OR email='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if ($password === $row['password']) {  // Direct comparison (no hashing)
        // $_SESSION['user_id'] = $row['id'];
        // $_SESSION['username'] = $username;

        // ✅ Store user data in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['nom'] = $row['nom'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        
        // Redirect to previous page or default
        $redirect_page = $_SESSION['redirect_to'] ?? 'index-en.php';
        unset($_SESSION['redirect_to']);
        header("Location: $redirect_page");
        exit();
    } else {
        echo "Invalid password. <a href='loginpage-en.php'>Try again</a>";

    }
} else {
    echo "No user found with that username. <a href='loginpage-en.php'>Try again</a>";

}

$conn->close();
?>
