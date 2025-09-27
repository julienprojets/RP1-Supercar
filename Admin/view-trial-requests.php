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
$conn = mysqli_connect("localhost", "root", "", "test_drive");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $action = $_POST['action'];

  if ($action == 'approve') {
      mysqli_query($conn, "UPDATE testdrive_request SET status='approved' WHERE id=$id");
  } elseif ($action == 'deny') {
      mysqli_query($conn, "UPDATE testdrive_request SET status='denied' WHERE id=$id");
  } elseif ($action == 'revoir') {
      mysqli_query($conn, "UPDATE testdrive_request SET status='pending' WHERE id=$id");
  } elseif ($action == 'complete') {
      mysqli_query($conn, "UPDATE testdrive_request SET status='completed' WHERE id=$id");
  }
}

// Récupérer les données
$pending = mysqli_query($conn, "SELECT * FROM testdrive_request WHERE status IS NULL OR status = 'pending'");
$approved = mysqli_query($conn, "SELECT * FROM testdrive_request WHERE status = 'approved'");
$denied = mysqli_query($conn, "SELECT * FROM testdrive_request WHERE status = 'denied'");
$completed = mysqli_query($conn, "SELECT * FROM testdrive_request WHERE status = 'completed'"); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demandes D’Essai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">


    <style>
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .section-title {
            margin-top: 40px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            color: #333;
        }
        .request-card {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 12px;
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .request-card:hover {
            transform: scale(1.02);
        }
        .request-header {
            font-size: 1.2rem;
            font-weight: 600;
            color: #007bff;
        }
        .request-body p {
            margin: 0;
        }
        .btn-space {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <?php include 'navbar-structure.php'; ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Gestion des Demandes D’Essai</h1>

    <!-- demandes en attente -->
    <h3 class="section-title">Demandes d'essai en attente</h3>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($pending)) { ?>
            <div class="col-md-6">
                <div class="request-card">
                    <div class="request-header">
                        <?= $row['first_name'] . ' ' . $row['last_name'] ?> - <?= $row['brand'] ?> <?= $row['model'] ?>
                    </div>
                    <div class="request-body mt-2">
                        <p><strong>Courriel :</strong> <?= $row['email'] ?></p>
                        <p><strong>Téléphone :</strong> <?= $row['phone'] ?></p>
                        <p><strong>Date :</strong> <?= $row['request_date'] ?> à <?= $row['request_time'] ?></p>
                        <p><strong>Commentaires :</strong> <?= $row['comments'] ?></p>
                        <form method="POST" class="mt-3">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button name="action" value="approve" class="btn btn-success btn-space">Approuver</button>
                            <button name="action" value="deny" class="btn btn-danger">Refuser</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- demandes approuvées -->
    <h3 class="section-title">Demandes Approuvées </h3>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($approved)) { ?>
            <div class="col-md-6">
                <div class="request-card border-success">
                    <div class="request-header text-success">
                        <?= $row['first_name'] . ' ' . $row['last_name'] ?> - <?= $row['brand'] ?> <?= $row['model'] ?>
                    </div>
                    <div class="request-body mt-2">
                        <p><strong>Courriel :</strong> <?= $row['email'] ?></p>
                        <p><strong>Téléphone :</strong> <?= $row['phone'] ?></p>
                        <p><strong>Date :</strong> <?= $row['request_date'] ?> à <?= $row['request_time'] ?></p>
                        <p><strong>Commentaires :</strong> <?= $row['comments'] ?></p>
                        <form method="POST" class="mt-3 d-flex gap-2">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button name="action" value="revoir" class="btn btn-warning">Revoir</button>
                            <button name="action" value="complete" class="btn btn-primary">Essai Terminé</button> <!--  new button -->
                        </form>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- demandes refusées -->
    <h3 class="section-title">Demandes Refusées </h3>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($denied)) { ?>
            <div class="col-md-6">
                <div class="request-card border-danger">
                    <div class="request-header text-danger">
                        <?= $row['first_name'] . ' ' . $row['last_name'] ?> - <?= $row['brand'] ?> <?= $row['model'] ?>
                    </div>
                    <div class="request-body mt-2">
                        <p><strong>Courriel :</strong> <?= $row['email'] ?></p>
                        <p><strong>Téléphone :</strong> <?= $row['phone'] ?></p>
                        <p><strong>Date :</strong> <?= $row['request_date'] ?> à <?= $row['request_time'] ?></p>
                        <p><strong>Commentaires :</strong> <?= $row['comments'] ?></p>
                        <form method="POST" class="mt-3">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button name="action" value="revoir" class="btn btn-warning">Revoir</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- essais terminés -->
<h3 class="section-title">Essais Terminés</h3>
<div class="container mb-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($completed)) { ?>
            <div class="col-md-6">
                <div class="request-card border-primary">
                    <div class="request-header text-primary">
                        <?= $row['first_name'] . ' ' . $row['last_name'] ?> - <?= $row['brand'] ?> <?= $row['model'] ?>
                    </div>
                    <div class="request-body mt-2">
                        <p><strong>Courriel :</strong> <?= $row['email'] ?></p>
                        <p><strong>Téléphone :</strong> <?= $row['phone'] ?></p>
                        <p><strong>Date :</strong> <?= $row['request_date'] ?> à <?= $row['request_time'] ?></p>
                        <p><strong>Commentaires :</strong> <?= $row['comments'] ?></p>
                        <form method="POST" class="mt-3">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include 'footer-structure.php'; ?>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- js to toggle 'active' class -->
<script>
  const navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      navLinks.forEach(l => l.classList.remove('active'));
      link.classList.add('active');
    });
  });
</script>
</body>
</html>
