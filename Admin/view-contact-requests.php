<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Optional: save the page the user was trying to access
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
    header("Location: login-admin.php");
    exit();
}
?>



<?php
$conn = mysqli_connect("localhost", "root", "", "formulaire_de_contacte");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = '';
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM table_de_contacte 
              WHERE first_name LIKE '%$search%' 
              OR last_name LIKE '%$search%'";
} else {
    $query = "SELECT * FROM table_de_contacte";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #181818;
            color:rgb(0, 0, 0);
        }
        .container-fluid {
            display: flex;
            justify-content: center;
        }
        .search-container {
            margin: 30px auto;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .search-input {
            width: 300px;
            padding: 10px 15px;
            font-size: 15px;
            border-radius: 30px;
            border: none;
            background-color: #2a2a2a;
            color:rgb(255, 255, 255);
            box-shadow: inset 0 0 5px rgba(255, 255, 255, 0.1);
        }
        .search-input:focus {
            outline: none;
            border: 1px solid rgb(0, 0, 0);
        }
        .search-btn {
            padding: 10px 20px;
            border-radius: 30px;
            border: none;
            background-color: #f39c12;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .search-btn:hover {
            background-color: #e67e22;
        }
        .container {
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color:rgb(0, 0, 0);
            font-weight: 500;
            margin-bottom: 20px;
        }
        .section-title {
            color:rgb(0, 0, 0);
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 15px;
        }
        .card {
            backdrop-filter: blur(4px);
            background: rgba(33, 33, 33, 0.9);
            color:rgb(0, 0, 0);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .card-header {
            background-color: #333333;
            font-size: 18px;
            padding: 20px;
            border-radius: 15px 15px 0 0;
        }
        .card-body {
            padding: 20px;
            font-size: 16px;
        }
        .card-footer {
            background-color: #333333;
            border-radius: 0 0 15px 15px;
            padding: 15px;
            text-align: right;
        }
        .card-footer button {
            border-radius: 25px;
            background-color: #f39c12;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            transition: 0.3s ease;
            color: #fff;
        }
        .card-footer button:hover {
            background-color: #e67e22;
            color: #fff;
        }
    </style>
</head>
<body>

<?php include 'navbar-structure.php'; ?>

<!-- search bar -->
<form method="GET" class="search-container">
    <input type="text" name="search" class="search-input" placeholder="Chercher quelqu'un..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit" class="search-btn"><i class="fas fa-search"></i> Chercher</button>
</form>

<!-- main title -->
<div class="text-center">
    <h1 class="main-title">Gestion des Messages de Contact</h1>
</div>

<div class="container my-4">

    <!-- pending section -->
    <div class="section">
        <h2 class="section-title">Messages en Attente</h2>
        <div class="row" id="pending-section">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4 mb-4" id="card-<?= $row['id'] ?>">
                    <div class="card h-100 d-flex flex-column">
                        <div class="card-header"><?= $row['first_name'] . ' ' . $row['last_name'] ?></div>
                        <div class="card-body flex-grow-1">
                            <p><strong>Email:</strong> <?= $row['email'] ?></p>
                            <p><strong>Phone:</strong> <?= $row['phone'] ?></p>
                            <p><strong>Message:</strong><br><?= nl2br($row['comment']) ?></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success btn-finish" data-id="<?= $row['id'] ?>">Terminé</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- answered section -->
    <div class="section">
        <h2 class="section-title">Messages Répondus</h2>
        <div class="row" id="answered-section">
        </div>
    </div>
</div>

<?php include 'footer-structure.php'; ?>

<!-- JavaScript to handle move between sections -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.body.addEventListener("click", function (e) {
            if (e.target.classList.contains("btn-finish")) {
                const id = e.target.dataset.id;
                const card = document.getElementById("card-" + id);
                document.getElementById("answered-section").appendChild(card);

                e.target.textContent = "Retour";
                e.target.classList.remove("btn-success", "btn-finish");
                e.target.classList.add("btn-warning", "btn-revert");
            } else if (e.target.classList.contains("btn-revert")) {
                const id = e.target.dataset.id;
                const card = document.getElementById("card-" + id);
                document.getElementById("pending-section").appendChild(card);

                e.target.textContent = "Terminé";
                e.target.classList.remove("btn-warning", "btn-revert");
                e.target.classList.add("btn-success", "btn-finish");
            }
        });
    });
</script>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
