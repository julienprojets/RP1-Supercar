<?php
$conn = mysqli_connect("localhost", "root", "", "form_inscription");
session_start();
?>

<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar z-9999 sticky-top">
    <div class="container x6">
        <!-- Brand Logo -->
        <a class="navbar-brand fw-bold" href="#">
            <img src="Nav_Images/logo.webp" alt="Logo" class="navbar-logo"> SuperCar
        </a>

        <!-- Navbar Toggler (for small screens) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index-en.php') ? 'active' : ''; ?>" href="index-en.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'voiture-en.php') ? 'active' : ''; ?>" href="voiture-en.php">Cars</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'essai-en.php') ? 'active' : ''; ?>" href="essai-en.php">Tryout</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'services-en.php') ? 'active' : ''; ?>" href="services-en.php">Services</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contact-en.php') ? 'active' : ''; ?>" href="contact-en.php">Contact</a></li>
            </ul>

            <div class="container h-10 position-relative d-flex justify-content-center">
                <div class="d-flex justify-content-center h-10">
                    <div class="search position-relative">
                        <input type="text" class="search_input form-control" id="searchCar" placeholder="Find your perfect ride..." onkeyup="showSuggestions()">
                        <button class="search_icon" type="submit" onclick="filterCars()">
                            <img src="Nav_Images/search.svg" class="sear-img">
                        </button>
                        <div id="searchSuggestions" class="search-suggestions"></div> 
                    </div>
                </div>
            </div>
            
            <?php
                // Get current page filename
                $currentPage = basename($_SERVER['PHP_SELF']);
                $queryString = $_SERVER['QUERY_STRING']; // Get the query string from the URL

                if (strpos($currentPage, '-en.php') !== false) {
                    // If on an English page, switch to French
                    $translatedPage = str_replace('-en.php', '-fr.php', $currentPage);
                    $langImage = "Nav_Images/lang-en.jpg"; 

                } elseif (strpos($currentPage, '-fr.php') !== false) {
                    // If on a French page, switch to English
                    $translatedPage = str_replace('-fr.php', '-en.php', $currentPage);
                    $langImage = "Nav_Images/lang-fr.jpg";

                } else {
                    // Default case 
                    $translatedPage = "index-fr.php";
                    $langImage = "Nav_Images/lang-fr.jpg";
                }

                // Append the query string if it exists
                if (!empty($queryString)) {
                    $translatedPage .= '?' . $queryString;
                }
            ?>

            <button class="lang-but" onclick="window.location.href='<?php echo $translatedPage; ?>'">
                <img src="<?php echo $langImage; ?>" alt="Lang">
            </button>

            <!-- User Dropdown -->
            <div class="dropdown">
                <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                👤 ' . htmlspecialchars($_SESSION['username']) . '
                              </button>
                              <ul class="dropdown-menu dropdown-menu1" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item1" href="logout-en.php">Log Out</a></li>
                              </ul>';
                    } else {
                        echo '<button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                👤 Account
                              </button>
                              <ul class="dropdown-menu dropdown-menu1" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item1" href="loginpage-en.php">Sign In</a></li>
                                <li><a class="dropdown-item1" href="SignUp-en.php">Sign Up</a></li>
                              </ul>';
                    }
                ?>
            </div>
        </div>
    </div>
</nav>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
