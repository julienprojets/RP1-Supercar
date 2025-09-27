<?php 

$host = "localhost";
$login = "root";    
$pass = "";           
$dbname = "formulaire_de_contacte";  


$bdd = mysqli_connect($host, $login, $pass, $dbname);

    mysqli_set_charset($bdd,"utf8");

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $comment = $_POST["comment"];

    $ajouter = "INSERT INTO table_de_contacte (first_name, last_name, email, phone, comment) 
                VALUES ('$first_name', '$last_name', '$email', '$phone', '$comment')";

if (mysqli_query($bdd, $ajouter)) {
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let messageBox = document.createElement('div');
            messageBox.innerText = '✅ Your message has been sent!';
            messageBox.style.position = 'fixed';
            messageBox.style.top = '50%';
            messageBox.style.left = '50%';
            messageBox.style.transform = 'translate(-50%, -50%)';
            messageBox.style.padding = '15px 30px';
            messageBox.style.background = 'rgba(0, 0, 0, 0.8)';
            messageBox.style.color = 'white';
            messageBox.style.borderRadius = '10px';
            messageBox.style.fontSize = '16px';
            messageBox.style.zIndex = '9999';
            document.body.appendChild(messageBox);

            setTimeout(function() {
                window.location.href = 'index-en.php';
            }, 3000);
        });
    </script>";
} else {
    echo "Erreur: " . mysqli_error($bdd);
}

    mysqli_close($bdd);
?>

