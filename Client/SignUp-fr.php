<?php
include('navbar-fr.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="Navbar.css" rel="stylesheet" type="text/css" />
    <link href="Footer.css" rel="stylesheet" type="text/css" />
    <script src="search-fr.js" type="text/javascript" defer></script>

    <style>
    body {
        background-image: url("Sign_Images/aston-porsche.jpg"); 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        overflow-x: hidden;
    }

    .search_icon {
        margin-top: -21px !important;
    }

    @media (max-width:992px) {
        .x6 {
            padding-bottom: 0;
        }
    }

    .whole-container {
        margin-top: 15vh;
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sign-up-container {
        background: #fff;
        width: 100%;
        max-width: 400px;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
        animation: slideIn 0.6s ease-in-out;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 28px;
        color: #4f5d73;
    }

    .input-field {
        margin-bottom: 20px;
        position: relative;
    }

    .input-field input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .input-field input:focus {
        border-color: #4f5d73;
    }

    .submit-btn {
        width: 100%;
        padding: 15px;
        background-color: #4f5d73;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: crimson;
    }

    @keyframes slideIn {
        0% {
            transform: translateY(-100px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .login-link {
        margin-top: 15px;
        font-size: 14px;
        color: #4f5d73;
        text-decoration: none;
    }

    .login-link:hover {
        text-decoration: underline;
    }

    </style>
</head>
<body>

<div class="whole-container">
    <div class="sign-up-container">
        <h2>Créer un Compte</h2>
        <form id="signupForm" action="signup_submit-fr.php" method="POST">
            <div class="input-field">
                <input type="text" placeholder="Prénom" name="prenom" required>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Nom" name="nom" required>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Nom D'Utilisateur" name="username" required>
            </div>
            <div class="input-field">
                <input type="email" placeholder="Adresse E-mail" name="email" required>
            </div>
            <div class="input-field">
                <input type="tel" placeholder="Numéro Telephone" name="phone">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Mot de Passe" name="password" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirmer Mot de Passe" name="confirm-password" required>
            </div>
            <input type="submit" value="S'inscrire" class="submit-btn">
        </form>               
        <a href="loginpage-fr.php" class="login-link">Vous avez déjà un compte? Connectez-vous</a>
    </div>
</div>

<br /><br /><br /><br />
<!-- Footer -->
<footer>
    <p>&copy; 2025 Supercar. Tous droits réservés.</p>
    <a href="https://www.facebook.com/" target="_blank" class="fab fa-facebook" style="margin: 0 10px;"></a>
    <a href="https://x.com/i/flow/login" target="_blank" class="fab fa-twitter" style=" margin: 0 10px;"></a>
    <a href="https://www.instagram.com/accounts/login/" target="_blank" class="fab fa-instagram" style=" margin: 0 10px;"></a>
    <a href="mailto:contact@supercarweb.com" class="fa-solid fa-envelope" style=" margin: 0 10px;"></a>
    <a href="#top" id="scrollToTop" class="fa-solid fa-arrow-up"></a>
</footer>

    <script>
        document.getElementById("scrollToTop").addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    
        // Filter Functionality
        document.querySelectorAll(".filter-btn").forEach(button => {
            button.addEventListener("click", function() {
                const filter = this.getAttribute("data-filter");
                document.querySelectorAll(".car-card").forEach(card => {
                    if (filter === "all" || card.getAttribute("data-category") === filter) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });
    </script>

    <!--Functionality inside the Account Button-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>