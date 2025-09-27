<?php

include('navbar-en.php');

// If user is NOT logged in, save redirect path & send them to login page
if (!isset($_SESSION['user_id'])) {
    $currentUrl = "essai-en.php";
    if (isset($_GET['make']) && isset($_GET['model'])) {
        $_SESSION['selected_make'] = $_GET['make'];
        $_SESSION['selected_model'] = $_GET['model'];
    }
$_SESSION['redirect_to'] = $currentUrl;
    header("Location: loginpage-en.php"); // Redirect to login
    exit();
}

// Get car model from URL parameter if available
// Get brand and model from URL parameters
$carBrand = isset($_GET['make']) 
    ? htmlspecialchars($_GET['make']) 
    : (isset($_SESSION['selected_make']) ? $_SESSION['selected_make'] : '');

$carModel = isset($_GET['model']) 
    ? htmlspecialchars($_GET['model']) 
    : (isset($_SESSION['selected_model']) ? $_SESSION['selected_model'] : '');

//Clearing cache-session values
unset($_SESSION['selected_make'], $_SESSION['selected_model']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Drive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="Footer.css" rel="stylesheet" type="text/css" />

    <script src="search.js" type="text/javascript" defer></script>

    <style>

        body {
            font-family: Arial, sans-serif;
            color: black;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

                       
        /* Start Navbar */
        /* Custom Navbar */
        .custom-navbar {
            background-color: #101010; /* Dark Background */
            padding: 15px 0;
            width: 100vw;
            /* overflow: hidden; */
            height: 66px;
            z-index: 1000 !important;
        }

        .navbar {
            position: sticky;
            z-index: 1000 !important;
            overflow: visible !important;
            background-color: #101010;
        }

        /* Navbar Brand */
        .navbar-brand {
            font-size: 1.5rem;
            color: white;
            display: flex;
            align-items: center;
        }

        /* Logo Styling */
        .navbar-logo {
            height: 40px;
            padding-right: 5px;
            width: auto;
            margin-right: 10px;
        }

        /* Nav Links */
        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1rem;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: crimson !important;
        }

        /* Active Link */
        .navbar-nav .nav-link.active {
            color: crimson !important;
            font-weight: bold;
        }

        /* Search Bar */
            .search{
                margin-bottom: auto;
                margin-top: auto;
                height: 30px;
                background-color: #fff;
                border-radius: 40px;
                padding: 10px;
                /* position: relative; */
            }

            .form-control {
                font-size: small !important;
                border: none !important;
            }

            .search_input{
                color: crimson;
                border: 0;
                outline: 0;
                background: none;
                width: 0;
                margin-top:-4.5px;
                caret-color:#101010;
                line-height: 5px;
                transition: width 0.4s linear;
                font-size: small;
                display:flex;
                align-items: center;
            }

            /* Remove the outline (light blue border) on focus */
            .search_input:focus {
                outline: none !important;
                border: none !important;  
                box-shadow: none !important;
            }

            .search .search_input{
                padding: 0 10px;
                width: 250px;
                caret-color:#E5E4E2;
                transition: width 0.4s linear;
            }
                
            .search:hover > .search_icon{
                background: white;
                color: #fff;
                transition: ease 0.3s;
            }

            .search_icon{
                height: 27px;
                width: 27px;
                float: right;
                margin-top: -23px;
                margin-right: -7px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                color:white;
                background-color:crimson;
                border: none !important;
                padding: 0;
            }

            .sear-img {
            height: 50%;
            width: 50%;
            }
                
            a:link{
                text-decoration:none;
            }  

            #searchCar:focus {
                width: 250px;
                transition: width 0.4s linear;
                border: none !important;
            }
            #searchCar.search_input:focus{
                border: none !important;
            }

            /* Search Suggestions */
            .search-suggestions {
                position: absolute;
                background-color: white;
                border: 1px solid #ccc;
                border-radius: 10px;
                transform: translateX(-3.5%);
                width: 100%;
                max-width: 300px;
                max-height: 200px;
                overflow-y: hidden;
                display: none;
                z-index: 1050;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
                top: 110%; 
            }

            .search-suggestions div {
                padding: 8px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .search-suggestions div:hover {
                background-color: #fac623; /* Highlight on hover */
                color: #101010;
            }
            
        /* End Search */

            .lang-but {
                border: none;
                margin-right: 5%;
                padding: 0;
                background: #101010;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .lang-but img {
                /* height: 100%;
                width: 100%; */
                height: 35px; 
                width: auto;  
                border-radius: 40px; 
                transition: transform 0.2s ease-in-out; 
            }

            .lang-but:hover img {
                transform: scale(1.0); /* Slight zoom on hover */
            }
            

            /* Buttons */
            .btn-light {
                background-color: #E5E4E2;
                color: #101010;
                border: none;
                transition: 0.3s;
            }

            .btn-light:hover {
                background-color: crimson;
                color: white;
            }

            /* General Dropdown Styling*/
            .dropdown {
                display: flex;
                align-items: center;
                position: relative;
            }

            /* Style for both Language and Account Buttons */
            .navbar .btn-light,
            .navbar .btn-outline-light {
                background-color: #101010;
                color: white;
                border: 2px solid white;
                padding: 8px 15px;
                font-size: 14px;
                border-radius: 20px;
                display: flex;
                align-items: center;
                gap: 8px;
                transition: 1.5s;
            }

            /* Hover Effects */
            .navbar .btn-light:hover,
            .navbar .btn-outline-light:hover {
                background-color: crimson;
                color: white;
                border-color: #101010;
            }

            /* Remove the focus outline on the Account button */
            .btn-outline-light:focus, 
            .btn-outline-light:active, 
            .btn-outline-light:focus-visible {
                outline: none !important;
                box-shadow: none !important;
                border-color: white !important; /* Keeps border consistent */
            }


            /* Make dropdown width adjust dynamically */
            .dropdown-menu {
                background-color: #F2F2F2;
                color: #101010 !important;
                /* border: none; */
                /* display: none; */
                margin: 0 auto;
                text-align: center;
                min-width: 90px !important;
                /* padding: 5px 8px; */
                border-radius: 10px !important; 
                width: auto; 
            }

            /* Adjust dropdown positioning */
            .dropdown-menu[data-bs-popper] {
                left: 50% !important;
                transform: translateX(-50%) !important;
            }


            /* Dropdown Items */
            .dropdown-item {
                padding: 5px 10px;
                text-align: center !important;
                font-size: 14px;
            }

            .dropdown-item ul {
                background-color: crimson;
            }

            .dropdown-menu li a{
                margin: 0 auto;
                padding: 5px;
                width: 80%;
                display: block; /* Make the item a block to fill the width */
            }

            .dropdown-menu.show .dmenu {
                display: flex;
                align-items: center;
                border: none;
            }

            .dropdown-menu.show {
                z-index: 9999 !important;
                overflow: visible !important;
            }

            .dropdown-menu.show ul{
                display: block;
                width: 40px !important;
            }

            @media (min-width: 992px) and (max-width: 1080px) {
                .custom-navbar {
                    width: 100%;
                }

                .lang-but {
                    margin: 0;
                    padding-right: 10px;
                }
            }

            /* Responsive Adjustments */
            @media (max-width: 992px) {
                .navbar-nav {
                    text-align: center;
                    padding-top: 10px;
                }

                /* Full width for dropdowns on small screens */
                .dropdown,
                .search-input,
                .lang-but {
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    padding-top: 15px;
                }

                .navbar {
                    background-color: #101010 !important; /* Dark background */
                }

                .x6 {
                    background-color: #101010;
                    /* padding-bottom: 5px; */
                }
            }

            /* Style the dropdown menu (for account) */
            .dropdown-menu1 {
                z-index: 9999 !important; 
                position: absolute !important;
                top: 100% !important;
                left: 0 !important;
                background-color: #101010 !important;
                border-radius: 10px;
                border: 0px solid crimson;
                /* padding: 5px 0; */
                list-style: none;
                /* display: none; */
            }

            .dropdown.show .dropdown-menu1 {
                display: block !important;
            }

            .dropdown-menu li a{
                margin: 0 auto;
                padding: 5px;
                width: 80%;
                display: block; /* Make the item a block to fill the width */
            }

            .dropdown-menu.show .dmenu {
                display: flex;
                align-items: center;
                border: none;
            }

            .dropdown-menu.show {
                z-index: 9999 !important;
                overflow: visible !important;
            }

            .dropdown-menu.show ul{
                display: block;
                width: 40px !important;
            }

            /* Style dropdown items */
            .dropdown-menu1 .dropdown-item1 {
                color: white;
                padding: 8px 15px;
                transition: 0.3s ease-in-out;
                text-align: center !important;
            }

            /* Hover effect for dropdown items */
            .dropdown-menu1 .dropdown-item1:hover {
                background-color: crimson;
                color: white;
                cursor: pointer;
            }

            .dropdown-item1 {
                display: block;
                width: 100% !important;
                /* padding: 10px; */
                clear: both;
                font-weight: 400;
                color: var(--bs-dropdown-link-color);
                text-align: center !important;
                text-decoration: none;
                white-space: nowrap;
                background-color: #101010;
                border: 0;
                font-size: 14px;
            }

            .dropdown-item1:hover {
                color: var(--bs-dropdown-link-hover-color);
                text-decoration: none;
                background-color: var(--bs-dropdown-link-hover-bg);
            }

            .dmenu {
                width: 100%;
                z-index: 999 !important;
            }
            /* End Buttons */

        /* End Dropdown */

        /* Responsive Navbar */
        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
                padding-top: 10px;
            }
            .dropdown, .search-input {
                width: 100%;
            }
        }
        /* End Navbar */

        .search_input {
            line-height: 0px !important;
        }

        .search_icon {
            margin-top: -21px !important;
        }

        .form-control {
            margin-top: -3px !important;
        }

        .full-page-section {
            height: 93vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url("Sign_Images/911CarreraTCabriolet.jpg") no-repeat center center/cover;
            text-align: center;
            position: relative;  
            background-attachment: fixed;
        }


        .scroll-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            opacity: 1;
            transition: opacity 0.5s ease-out;
            position: absolute;
            top: 45%; /* Move it lower */
            transform: translateY(-50%); /* Keeps it centered vertically */
            text-align: center;
            width: 100%;
        }


        .hero-section {
            background: url("images/bgessai1") no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            position: relative;
            background-attachment: scroll;
        }


        .form-section, .submit-section {
            padding: 50px;
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
        }

        textarea, input[type="text"], input[type="email"], input[type="tel"], select, input[type="date"], input[type="time"] {
            width: 100%;
            border: 2px solid black;
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 5px;
        }

        textarea {
            resize: none;
        }

        /* SideKick CSS */
        .sidebar {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: auto;
            background: rgba(26, 26, 26, 0.9);
            border-radius: 10px 0 0 10px;
            transition: width 0.3s ease;
            overflow: hidden;
            box-shadow: -2px 2px 10px rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .sidebar:hover {
            width: 200px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: white;
            padding: 15px;
            text-decoration: none;
            transition: background 0.3s ease;
            white-space: nowrap;
        }

        .sidebar a:hover {
            background: crimson;
            color: #101010;
        }

        .sidebar a i {
            font-size: 20px;
            margin-right: 15px;
        }

        .sidebar span {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar:hover span {
            opacity: 1;
        }

        /* End Sidekick */

        .form-control1 {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: var(--bs-border-radius);
            transition: border-color .15sease-in-out, box-shadow .15sease-in-out;
        }

    </style>
</head>

<body>    

<!-- Right Sticky Sidebar -->
<div class="sidebar">
    <a href="contact-en.php"><i class="fas fa-envelope"></i> <span>Contact Us</span></a>
</div>
<!-- End Sidekick -->


    <div class="full-page-section">
        <h1 class="scroll-text">Scroll down and get closer to your test drive</h1>
    </div>
    

    <div class="container form-section">
        <h2 class="text-center">YOUR TEST DRIVE HAS NEVER BEEN SO CLOSE!</h2>
    <form id="testDriveForm" action="submit_request.php" method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control1" name="last_name" placeholder="Last Name" 
                value="<?php echo isset($_SESSION['nom']) ? htmlspecialchars($_SESSION['nom']) : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control1" name="first_name" placeholder="First Name" 
                value="<?php echo isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : ''; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="email" class="form-control1" name="email" placeholder="Email" 
                value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <input type="tel" class="form-control1" name="phone" placeholder="Please enter your phone number"  
                value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="comment">Comments/Special Requests</label>
                <textarea id="comment" class="form-control1" name="comments" rows="4" placeholder="Enter your message..." style="border: 2px solid black;"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <select class="form-control1" required style="border: 2px solid black;" name="brand" id="brandSelect">
                <option selected disabled>-Please select the desired brand-</option>
                <option value="Aston Martin" <?php echo ($carBrand == 'Aston Martin') ? 'selected' : ''; ?>>Aston Martin</option>
                <option value="Maserati" <?php echo ($carBrand == 'Maserati') ? 'selected' : ''; ?>>Maserati</option>
                <option value="Porsche" <?php echo ($carBrand == 'Porsche') ? 'selected' : ''; ?>>Porsche</option>
            </select>
        </div>

        <!-- Model Dropdown -->
        <div class="mb-3">
            <select class="form-control1" required style="border: 2px solid black;" name="model" id="modelSelect" disabled>
                <option selected disabled>-Please select a model-</option>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date">Select a date</label>
                <input type="date" id="date" name="request_date" class="form-control1" required>
            </div>
            <div class="col-md-6">
                <label for="time">Select the time</label>
                <select id="time" name="request_time" class="form-control1" required style="border: 2px solid black;">
                    <option value="">-- Select the time --</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark w-50">Send</button>
        </div>
    </form>
</div>
    

<!-- Footer -->
<footer>
    <p>&copy; 2025 Supercar. All rights reserved.</p>
    <a href="https://www.facebook.com/" target="_blank" class="fab fa-facebook" style="margin: 0 10px;"></a>
    <a href="https://x.com/i/flow/login" target="_blank" class="fab fa-twitter" style=" margin: 0 10px;"></a>
    <a href="https://www.instagram.com/accounts/login/" target="_blank" class="fab fa-instagram" style=" margin: 0 10px;"></a>
    <a href="mailto:contact@supercarweb.com" class="fa-solid fa-envelope" style=" margin: 0 10px;"></a>
    <a href="#top" id="scrollToTop" class="fa-solid fa-arrow-up"></a>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById("scrollToTop").addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

<script>
    window.addEventListener("scroll", function () {
        let scrollText = document.querySelector(".scroll-text");
        let scrollPosition = window.scrollY;
        let fadeOutPoint = 200; // Adjusts the value when the text starts fading

        let opacity = Math.max(1 - scrollPosition / fadeOutPoint, 0);
        scrollText.style.opacity = opacity;
    });
</script>

<!-- JavaScript for Model Dropdown -->
<script>
    const modelsByBrand = {
        "Aston Martin": ["DB12 Volante", "DBX", "Valour", "Vanquish", "Vantage"],
        "Maserati": ["Ghibli", "GT2 Stradale", "Levante", "MC20 Cielo", "Quattroporte"],
        "Porsche": ["Cayenne GTS", "911 Turbo S", "911 GT3 RS", "Taycan", "Panamera"]
    };

    const brandSelect = document.getElementById('brandSelect');
    const modelSelect = document.getElementById('modelSelect');

    brandSelect.addEventListener('change', function () {
        const selectedBrand = this.value;
        const models = modelsByBrand[selectedBrand] || [];

        // removess previous options
        modelSelect.innerHTML = '<option selected disabled>-Please select a model-</option>';

        // populate new model options
        models.forEach(model => {
            const option = document.createElement('option');
            option.value = model;
            option.textContent = model;
            modelSelect.appendChild(option);
        });

        // enable model dropdown
        modelSelect.disabled = models.length === 0;
    });

    // select model if page reloads with POST or GET data
    window.addEventListener('DOMContentLoaded', () => {
        const preSelectedBrand = "<?php echo $carBrand ?? ''; ?>";
        const preSelectedModel = "<?php echo $carModel ?? ''; ?>";

        if (preSelectedBrand && modelsByBrand[preSelectedBrand]) {
            brandSelect.value = preSelectedBrand;
            brandSelect.dispatchEvent(new Event('change'));

            if (preSelectedModel) {
                modelSelect.value = preSelectedModel;
            }
        }
    });
</script>

<script>
document.getElementById("testDriveForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Stop form from reloading the page

    let formData = new FormData(this);

    fetch("submit_request.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response received:", data); // Debugging
        if (data.status === "success") {
            showPopup("✅ Request sent successfully!");
            document.getElementById("testDriveForm").reset(); // Clear form
        } else {
            showPopup("❌ Error: " + data.message);
        }
    })
    .catch(error => {
        console.error("Fetch error:", error);
        showPopup("⚠️ An error occurred while sending the request.");
    });
});

// Function to show a popup
function showPopup(message) {
    let popup = document.createElement("div");
    popup.innerText = message;
    popup.style.position = "fixed";
    popup.style.top = "50%";
    popup.style.left = "50%";
    popup.style.transform = "translate(-50%, -50%)";
    popup.style.padding = "15px 30px";
    popup.style.background = "rgba(0, 0, 0, 0.8)";
    popup.style.color = "white";
    popup.style.borderRadius = "10px";
    popup.style.fontSize = "16px";
    popup.style.zIndex = "9999";
    document.body.appendChild(popup);

    setTimeout(() => popup.remove(), 3000); // Remove after 3 seconds
}
</script>

</body>
</html>

<?php
$conn->close();
?>