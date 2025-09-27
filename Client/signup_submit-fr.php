<?php
session_start();
$conn = new mysqli("localhost", "root", "", "form_inscription");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// vefirie si les mdp sont similaires
if ($password !== $confirm_password) {
    die("Error: Les mots de passe ne correspondent pas.<a href='signup-fr.php'>Veuillez réessayer</a>");
}

$sql = "INSERT INTO users (prenom, nom, username, email, phone, password) VALUES ('$prenom', '$nom', '$username', '$email', '$phone', '$password')";
if ($conn->query($sql) === TRUE) {

       // ✅ Store user session (auto-login after signup)
       $_SESSION['user_id'] = $conn->insert_id;  // Get the last inserted user ID
       $_SESSION['prenom'] = $prenom;
       $_SESSION['nom'] = $nom;
       $_SESSION['username'] = $username;
       $_SESSION['email'] = $email;
       $_SESSION['phone'] = $phone;

    header("Location: essai-fr.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
