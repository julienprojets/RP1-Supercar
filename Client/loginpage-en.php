<?php
include('navbar-en.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="Navbar.css" rel="stylesheet" type="text/css" />
    <link href="Footer.css" rel="stylesheet" type="text/css" />

    <script src="search.js" type="text/javascript" defer></script>

    <style>
        body {
            background-image: url("Sign_Images/login.webp"); 
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

        .mobile-menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background: #1a1a1a;
            width: 200px;
            flex-direction: column;
            padding: 10px;
        }

        .mobile-menu a {
            color: white;
            padding: 10px;
            text-align: center;
            display: block;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .mobile-menu a:hover {
            background: #e0dd1a;
            color: black;
        }

        .whole-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px); /* Adjust based on navbar height */
            width: 100%;
            padding-top: 180px; /* Ensures space for the navbar */
            flex: 1; /* Makes sure it takes available space and pushes the footer down */
        }

        @media (max-width: 768px) {
            .menu {
                display: none;
            }
            .hamburger {
                display: block;
            }
            .mobile-menu.active {
                display: flex;
            }
        }

        .login-container {
            background: #fff;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            animation: slideIn 0.6s ease-in-out;
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

        h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #4f5d73;
        }

        .input-field input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
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

        .forgot-password {
            margin-top: 15px;
            font-size: 14px;
            color: #4f5d73;
            text-decoration: none;
        }

    </style>
</head>
<body>
    
<div class="whole-container">
    <div class="login-container">
        <h2>Please log in to your account</h2>
        <form action="login_submit.php" method="POST">
            <div class="input-field">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" value="Connect" class="submit-btn">
        </form>            
        <a href="signup-en.php" class="forgot-password">Create an Account?</a>
    </div>
</div>
<br /><br />

<!-- Footer -->
<footer>
    <p>&copy; 2025 Supercar. All rights reserved.</p>
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