<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<div class="navbar-custom">
    <div class="navbar-brand">Supercar</div>

    <div class="navbar-center">
        <a href="index-admin.php">Accueil</a>
        <a href="content-admin.php">Contenu</a>
        <a href="view-logged-accounts.php">Clients</a>
        <a href="voiture-admin.php">Voitures</a>
        <a href="view-trial-requests.php">Demande D'essai</a>
        <a href="view-contact-requests.php">Contacts</a>
    </div>

    <div class="navbar-right">
        <?php if (isset($_SESSION['username'])): ?>
            <span class="text-white mr-2"><?= htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout-admin.php" class="text-white">Déconnexion</a>
        <?php else: ?>
            <a href="login-admin.php" class="text-white">Connexion</a>
        <?php endif; ?>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>