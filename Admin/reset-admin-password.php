<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_users";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mode = $_POST['mode'];

    if ($mode == 'username') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $new_username = $_POST['new_username'];

        // Fetch user
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $user = $res->fetch_assoc();
            if ($password === $user['password']) {
                // Update username
                $update = $conn->prepare("UPDATE users SET username = ? WHERE email = ?");
                $update->bind_param("ss", $new_username, $email);
                if ($update->execute()) {
                    $message = "Username updated successfully!";
                } else {
                    $message = "Error updating username.";
                }
            } else {
                $message = "Incorrect password.";
            }
        } else {
            $message = "No user found with that email.";
        }

    } elseif ($mode == 'password') {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];

        $sql = "SELECT * FROM users WHERE email = ? AND username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $update = $conn->prepare("UPDATE users SET password = ? WHERE email = ? AND username = ?");
            $update->bind_param("sss", $new_password, $email, $username);
            if ($update->execute()) {
                $message = "Password updated successfully!";
            } else {
                $message = "Error updating password.";
            }
        } else {
            $message = "No matching user found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Admin Credentials</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 480px;
            background: #fff;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.6s ease-out;
        }

        h3 {
            text-align: center;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            font-size: 28px;
            margin-bottom: 30px;
            color: #4A4A4A;
        }

        .form-group label {
            font-weight: 500;
            color: #444;
        }

        .form-control {
            border-radius: 10px;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.15rem rgba(102, 126, 234, 0.25);
        }

        select.form-control {
            height: auto;
            padding: 14px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #667eea;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 500;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #5661e7;
        }

        .hidden {
            display: none;
        }

        .alert-info {
            background-color: #e9f0ff;
            border: 1px solid #b3d4fc;
            color: #334e68;
            border-radius: 8px;
            padding: 12px;
            margin-top: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Réinitialisation</h3>
    <form method="POST" id="resetForm">
        <div class="form-group">
            <label>Que souhaitez-vous changer?</label>
            <select class="form-control" name="mode" id="modeSelector" required>
                <option value="Please Select">-Veuillez choisir-</option>
                <option value="username">Mon nom d'utilisateur</option>
                <option value="password">Mon mot de passe</option>
            </select>
        </div>

        <div id="username-section" class="hidden">
            <div class="form-group">
                <label>Mot de passe actuel</label>
                <input type="password" name="password" placeholder="Entrez votre mot de passe actuel..." class="form-control">
            </div>
            <div class="form-group">
                <label>Nouveau nom d'utilisateur</label>
                <input type="text" name="new_username" placeholder="Entrez votre nouveau nom d'utilisateur..." class="form-control">
            </div>
        </div>

        <div id="password-section" class="hidden">
            <div class="form-group">
                <label>Nom d'utilisateur actuel</label>
                <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur actuel..." class="form-control">
            </div>
            <div class="form-group">
                <label>Nouveau mot de passe</label>
                <input type="password" name="new_password" placeholder="Entrez votre nouveau mot de passe..." class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-3 hidden" id="submitBtn">Confirmer</button>

        <a href="login-admin.php" style="display: block; text-align: center; margin-top: 20px; padding: 12px; font-size: 16px; color: #667eea; text-decoration: none;">Retour</a>


        <?php if (!empty($message)): ?>
            <div class="alert alert-info text-center"><?php echo $message; ?></div>
        <?php endif; ?>
    </form>
</div>

<script>
    document.getElementById("modeSelector").addEventListener("change", function () {
        const mode = this.value;
        document.getElementById("username-section").classList.add("hidden");
        document.getElementById("password-section").classList.add("hidden");

        if (mode === "username") {
            document.getElementById("username-section").classList.remove("hidden");
        } else if (mode === "password") {
            document.getElementById("password-section").classList.remove("hidden");
        }
    });
</script>

<!--script that will firstly hide the "continue" button and then show when clicked on an option-->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const modeSelector = document.getElementById("modeSelector");
    const usernameSection = document.getElementById("username-section");
    const passwordSection = document.getElementById("password-section");
    const submitBtn = document.getElementById("submitBtn");

    modeSelector.addEventListener("change", function () {
      const value = this.value;

      // hide both sections and submit button by default
      usernameSection.classList.add("hidden");
      passwordSection.classList.add("hidden");
      submitBtn.classList.add("hidden");

      if (value === "username") {
        usernameSection.classList.remove("hidden");
        submitBtn.classList.remove("hidden");
      } else if (value === "password") {
        passwordSection.classList.remove("hidden");
        submitBtn.classList.remove("hidden");
      }
    });
  });
</script>

</body>
</html>
