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
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Check password match (plaintext or hashed)
    if ($password === $row['password']) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        $redirect_page = $_SESSION['redirect_to'] ?? 'index-admin.php';
        unset($_SESSION['redirect_to']);
        header("Location: $redirect_page");
        exit();
    } else {
        echo "<script>alert('Mot de passe invalide.'); window.location.href = 'login-admin.php';</script>";

    }
} else {
    echo "<script>alert('Aucun utilisateur trouvé. Re-essayer.'); window.location.href = 'login-admin.php';</script>";
}
?>
