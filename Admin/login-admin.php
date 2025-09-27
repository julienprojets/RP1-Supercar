<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- bane fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            transform: translateY(50px);
            animation: fadeIn 1s forwards;
        }

        h2 {
            text-align: center;
            font-size: 36px;
            color: #4A4A4A;
            font-weight: 500;
            margin-bottom: 30px;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 2px solid #ddd;
            margin-bottom: 20px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(103, 126, 234, 0.5);
        }

        .btn-login {
            width: 100%;
            background: #667eea;
            color: #fff;
            padding: 14px;
            border-radius: 8px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #4a67d3;
        }

        .forgot-password {
            display: block;
            text-align: center;
            font-size: 14px;
            color: #667eea;
            text-decoration: none;
            margin-top: 15px;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #4a67d3;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /*responsiveness*/
        @media (max-width: 768px) {
            .login-container {
                padding: 30px;
                width: 90%;
            }
            h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Bienvenue!</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="nom d'utilisateur" required>
                <input type="email" name="email" class="form-control" placeholder="courriel" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="mot de passe" required>
            </div>
            <button type="submit" class="btn-login">Connexion</button>
        </form>
        
        <a href="reset-admin-password.php" class="forgot-password">Mot de passe oublié?</a>
    </div>

    <!-- js et jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    

</body>
</html>
