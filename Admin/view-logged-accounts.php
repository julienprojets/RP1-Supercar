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
$servername = "localhost";
$username = "root";  
$password = "";     
$dbname = "form_inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

// Query to get duplicate accounts based on username and email
$duplicate_sql = "SELECT COUNT(*) AS duplicate_count FROM users u1 
                  WHERE EXISTS (
                      SELECT 1 FROM users u2 
                      WHERE u1.username = u2.username 
                      AND u1.email = u2.email 
                      AND u1.id != u2.id
                  )";

$duplicate_result = $conn->query($duplicate_sql);
$duplicate_count = 0;
if ($duplicate_result && $row = $duplicate_result->fetch_assoc()) {
    $duplicate_count = $row['duplicate_count'];
}

// Handle Edit action
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $update_sql = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Connectés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 20px;
        }
        h2 {
            color: #343a40;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            font-size: 36px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 50px;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f1f1f1;

        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .btn-danger-custom {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger-custom:hover {
            background-color: #c82333;
        }
        .modal-content {
            border-radius: 12px;
        }
        .modal-header {
            background-color: #343a40;
            color: #fff;
        }
        .modal-body {
            background-color: #f1f1f1;
        }
        .modal-footer {
            background-color: #f8f9fa;
        }
        .modal-footer button {
            border-radius: 5px;
        }
        .stat-card {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .stat-card .stat-title {
            font-size: 18px;
            color: #343a40;
        }
        .stat-card .stat-value {
            font-size: 30px;
            color: #007bff;
        }
        .section-title {
            color: #343a40;
            font-size: 28px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-light">

    <?php include 'navbar-structure.php'; ?>

    <div class="container">
        <div class="card">
            <h2 class="text-center">Gérer les comptes utilisateurs</h2>
            <p class="text-center text-muted">Bienvenue au panel d'administration. À partir d'ici, vous pouvez gérer tous les utilisateurs enregistrés sur la plateforme. Consultez leurs données, modifiez les informations et supprimez des utilisateurs si nécessaire.</p>
        </div>

        <!-- statistics ssection -->
        <div class="row">
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="stat-title">Nombre D'Utilisateurs</div>
                    <div class="stat-value"><?php echo $result->num_rows; ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="stat-title">Comptes Actifs</div>
                    <div class="stat-value"><?php echo $result->num_rows; ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="stat-title">Comptes dupliqués</div>
                    <div class="stat-value"><?php echo $duplicate_count; ?></div> 
                </div>
            </div>
        </div>

    <div class="container mt-4">
        <h2 class="text-center text-primary">Comptes Utilisateurs</h2>
        
        <!-- user table -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom D'utilisateur</th>
                        <th>Courriel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" 
                                    data-id="<?= $row['id'] ?>" 
                                    data-username="<?= htmlspecialchars($row['username']) ?>"
                                    data-email="<?= htmlspecialchars($row['email']) ?>">
                                    Edit
                                </button>

                                <!-- delete button -->
                                <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $row['id'] ?>">Delete</button>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>
    <!-- tips section -->
    <div class="card">
            <h3 class="text-center section-title">Conseils aux administrateurs</h3>
            <ul>
                <li><strong>Rester organisé:</strong> Gardez vos données d'utilisateur exactes pour assurer une gestion et des opérations sans problème.</li>
                <li><strong>Mises à jour régulières:</strong> Mettre régulièrement à jour les informations relatives aux utilisateurs et désactiver les comptes qui ne sont plus actifs.</li>
                <li><strong>Sécurité:</strong> Veiller à ce que les informations sensibles des utilisateurs soient stockées et protégées en toute sécurité.</li>
                <li><strong>Sauvegarde des données:</strong> Faites toujours des sauvegardes de données pour éviter la perte d'informations importantes.</li>
            </ul>
        </div>

    </div>
    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editUserId">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control" id="editUsername">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" id="editEmail">
                        </div>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer-structure.php'; ?>

    <script>
    // open edit modal
    $('.edit-btn').click(function() {
        $('#editUserId').val($(this).data('id'));
        $('#editUsername').val($(this).data('username'));
        $('#editEmail').val($(this).data('email'));  
        $('#editModal').modal('show');
    });

    // Handle Edit Submission
    $('#editForm').submit(function(e) {
        e.preventDefault();
        let userId = $('#editUserId').val();
        let username = $('#editUsername').val();
        let email = $('#editEmail').val();  

        $.post("update-user.php", { id: userId, username: username, email: email }, function(response) {
            location.reload(); // reload the page after update
        });
    });
    </script>
    
    <!--handle delete accounts-->
    <script>
    $(document).ready(function() {
        $(".delete-btn").click(function() {
            var userId = $(this).data("id");
            
            if (confirm("Are you sure you want to delete this user?")) {
                $.ajax({
                    url: "delete-user.php",
                    type: "POST",
                    data: { id: userId },
                    success: function(response) {
                        if (response === "success") {
                            alert("User deleted successfully!");
                            location.reload(); // refresh page to update table
                        } else {
                            alert("Error deleting user: " + response);
                        }
                    }
                });
            }
        });
    });
    </script>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php $conn->close(); ?>
