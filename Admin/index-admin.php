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
$server = 'localhost'; 
$username = 'root'; 
$password = ''; 

$db_users = 'form_inscription'; 
$conn_users = mysqli_connect($server, $username, $password, $db_users);

$db_test_drive = 'test_drive'; 
$conn_test_drive = mysqli_connect($server, $username, $password, $db_test_drive);

$db_contact = 'formulaire_de_contacte'; 
$conn_contact = mysqli_connect($server, $username, $password, $db_contact);

if (!$conn_users || !$conn_test_drive || !$conn_contact) {
    die("Connection failed: " . mysqli_connect_error());
}

$users_query = "SELECT COUNT(*) as users FROM users"; 
$users_result = mysqli_query($conn_users, $users_query);
if (!$users_result) {
    die("Query failed: " . mysqli_error($conn_users));
}
$users = mysqli_fetch_assoc($users_result);
$total_users = $users['users'];

// count total test drives in the 'testdrive_request' table
$query_test_drives = "SELECT COUNT(*) as total_test_drives FROM testdrive_request"; 
$result_test_drives = mysqli_query($conn_test_drive, $query_test_drives);
if (!$result_test_drives) {
    die("Query failed: " . mysqli_error($conn_test_drive));
}
$row_test_drives = mysqli_fetch_assoc($result_test_drives);
$total_test_drives = $row_test_drives['total_test_drives'];

$query_contacts = "SELECT COUNT(*) as total_contacts FROM table_de_contacte"; 
$result_contacts = mysqli_query($conn_contact, $query_contacts);
if (!$result_contacts) {
    die("Query failed: " . mysqli_error($conn_contact));
}
$row_contacts = mysqli_fetch_assoc($result_contacts);
$total_contacts = $row_contacts['total_contacts'];
?>

<?php
$connection = mysqli_connect("localhost", "root", "", "supercar");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['save_note'])) {
    $note = trim($_POST['admin_note']);

    if (!empty($note)) {
        $note = mysqli_real_escape_string($connection, $note);
        $query = "INSERT INTO admin_notes (note) VALUES ('$note')";
        mysqli_query($connection, $query);
    }

    //redirect to same page after processing to prevent resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

//delete specific note option
if (isset($_POST['delete_note'])) {
    $lineToDelete = intval($_POST['note_line']);
    
    $result = mysqli_query($connection, "SELECT id FROM admin_notes ORDER BY created_at ASC");
    $notes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $notes[] = $row['id'];
    }

    if (isset($notes[$lineToDelete - 1])) {
        $noteIdToDelete = $notes[$lineToDelete - 1];
        mysqli_query($connection, "DELETE FROM admin_notes WHERE id = $noteIdToDelete");
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supercar Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">

    <style>
        body { 
            background-color:rgb(255, 255, 255); 
        }

        .container { 
            margin-top: 20px; 
        }
        .dashboard-cards { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 15px; 
            justify-content: center; 
        }

        .card { 
            transition: transform 0.3s ease-in-out; 
        }

        .card:hover { 
            transform: scale(1.05); 
        }

        .chart-container { 
            max-width: 600px; 
            margin: auto; 
        }

        .quick-actions { 
            display: flex; 
            gap: 10px; 
            justify-content: center; 
            flex-wrap: wrap; 
        }

        .activity-log { 
            max-height: 200px; 
            overflow-y: auto; 
        }

        .side-widgets { 
            display: flex; 
            flex-direction: column; 
            gap: 15px; 
        }

        .admin-notes {
            margin-top: 9px;
        }
        
        .quick-reminders {
            margin-top: 40px;
        }


        @media (max-width: 992px) {
            .login-btn { display: fixed; }
        }

        .btn-lack {
            background-color: black;
            color: white;
            font-weight: bold;
        }

        .btn-lack:hover {
            background-color: grey;
        }
    </style>
</head>
<body>

    <?php include 'navbar-structure.php'; ?>


    <div class="container text-center">
        <h2>Bienvenue au Panel Admin</h2>
        <br>
        <div class="dashboard-cards mt-4">
            <a href="view-logged-accounts.php" class="text-decoration-none">
                <div class="card bg-primary text-white p-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Clients Connectés</h5>
                        <p class="card-text" id="UserCount"><?php echo $total_users; ?></p>
                    </div>
                </div>
            </a>

            <a href="view-trial-requests.php" class="text-decoration-none">
                <div class="card bg-success text-white p-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Demandes D'essai</h5>
                        <p class="card-text" id="testDriveCount"><?php echo $total_test_drives; ?></p>
                    </div>
                </div>
            </a>

            <a href="view-contact-requests.php" class="text-decoration-none">
                <div class="card text-white p-3" style="width: 18rem; background-color: #fd7e14;">
                    <div class="card-body">
                        <h5 class="card-title">Messages de Contact</h5>
                        <p class="card-text" id="contactCount"><?php echo $total_contacts; ?></p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="container d-flex flex-wrap mt-4">
        <div class="side-widgets col-md-3">
            <div class="admin-notes">
                <h5>Vos Notes</h5>
                <form method="POST" action="">
                    <textarea name="admin_note" rows="11" cols="40" placeholder="Entrez vos notes ici..." required></textarea><br>
                    <button type="submit" name="save_note" class="btn btn-sm btn-lack mt-2">Sauvegarder</button>
                </form>
            </div>

            <div class="quick-reminders">
                <h5>Rappels</h5>
                <ul style="line-height:2.4;">
                    <li>Enlever les clients non-actifs</li>
                    <li>Vérifier les demandes d'essais</li>
                    <li>Consulter les messages en attente</li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <h3 class="text-center">Aperçu des tâches</h3>
            <div class="chart-container">
                <canvas id="adminChart"></canvas>
            </div>
        </div>
     </div>

    <!--fetches all rows from the admin_notes table, ordered by created_at-->
    <!--stores each note in an array $notes as an associative array with the id and the note-->
     <?php
        $result = mysqli_query($connection, "SELECT * FROM admin_notes ORDER BY created_at ASC");
        $notes = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $notes[] = ['id' => $row['id'], 'note' => $row['note']];
        }
    ?>

     <!--checks if there are any notes using count($notes) > 0, if yes it will show the Delete Note-->   
     <!--when clicked, it triggers the confirmDeleteNote() JavaScript function-->    
     <!--that function asks the user which line number to delete, then sets the note_line value-->    
     <div class="container mt-4">
        <h3>Notes Sauvegardées</h3>

        <div style="border: 1px solid #ccc; padding: 10px; max-height: 300px; overflow-y: auto; margin-bottom: 65px;">
            <?php foreach ($notes as $index => $note): ?>
                <p><strong><?php echo $index + 1; ?>.</strong> <?php echo htmlspecialchars($note['note']); ?></p>
            <?php endforeach; ?>
        </div>

        <?php if (count($notes) > 0): ?>
            <form method="POST" onsubmit="return confirmDeleteNote();" class="mt-3">
                <input type="hidden" name="note_line" id="note_line_input">
                <button type="submit" name="delete_note" class="btn btn-lack fw-bold text-white">Delete Note</button>
            </form>
        <?php endif; ?>
    </div>


  
    <?php include 'footer-structure.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const data = {
                labels: ['Clients Connectés', "Demandes D'Essai", 'Messages de Contact '],
                datasets: [{
                    label: 'Nombres',
                    data: [<?php echo $total_users; ?>, <?php echo $total_test_drives; ?>, <?php echo $total_contacts; ?>],
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' }
                    }
                }
            };

            var ctx = document.getElementById('adminChart').getContext('2d');
            new Chart(ctx, config);
        });
    </script>

    <!-- script that will ask the line to delete (notes)-->
    <script>
    function confirmDeleteNote() {
        const line = prompt("Enter the line number of the note you want to delete:");
        if (line === null || line.trim() === "") {
            return false; // cancelled or empty
        }

        const parsedLine = parseInt(line);
        if (isNaN(parsedLine) || parsedLine <= 0) {
            alert("Please enter a valid positive number.");
            return false;
        }

        document.getElementById("note_line_input").value = parsedLine;
        return true;
    }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>