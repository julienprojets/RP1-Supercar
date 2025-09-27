<?php
include('navbar-en.php');
include('admin-en.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supercar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="Navbar.css" rel="stylesheet" type="text/css" />
    <link href="Footer.css" rel="stylesheet" type="text/css" />
    <link href="Explore.css" rel="stylesheet" type="text/css" />

    <script src="search.js" type="text/javascript" defer></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: white;
        }

        section {
            padding: 80px 0;
            color: white !important;
            text-align: center;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .hero {
            /* background: url('images/bgtest1') no-repeat center center/cover; */
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }
        .btn-custom {
            background-color: crimson;
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            transition: 0.3s;
            font-size: 1.2rem;
        }
        .btn-custom:hover {
            background-color: white;
            color: black;
            transform: scale(1.1);
        }

        .about-container {
            display: flex;
            align-items: center;
            text-align: left;
            max-width: 80%;
        }

        .about-img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        #about {
            background-color: black;
            padding: 80px 0;
        }

        .gallery {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .gallery img {
            width: 30%;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 87, 51, 0.8);
            transition: transform 0.3s;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        .service-gallery {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .service-item {
            text-align: center;
            width: 30%;
        }
        .service-item img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            transition: transform 0.3s;
        }
        .service-item img:hover {
            transform: scale(1.1);
        }
        .service-label {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }
        .car-item {
            text-align: center;
            width: 30%;
        }
        .car-item img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }
        .car-item img:hover {
            transform: scale(1.1);
        }
        .car-label {
            color: black;
            padding: 8px 15px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }

    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero" style="background: url('<?php echo fetchImage('acceuil_en', 'hero_title'); ?>') no-repeat center center/cover;">
        <h1><?php echo fetchContent('acceuil_en', 'hero_title'); ?></h1>
        <p><?php echo fetchContent('acceuil_en', 'hero_subtitle'); ?></p>
        <a href="#about" class="btn btn-custom">Explore</a>
    </section>

    <!-- About Us Section -->
    <section id="about">
    <div class="container about-container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <img src="<?php echo fetchImage('acceuil_en', 'about_us'); ?>" alt="Supercar Image" class="about-img">
            </div>
            <div class="col-md-7 text-justify">
                <h2><b>About Us</b></h2>
                <p><?php echo fetchContent('acceuil_en', 'about_us'); ?></p>
            </div>
        </div>
    </div>
</section>

    <!-- Voitures Section -->
    <section id="voitures" style="background-color: white; color: black; padding: 80px 0; text-align: center;">
    <h2 style="color: black;"><b>Our Cars</b></h2>
    <p style="color: black;">Discover our exclusive collection of luxury vehicles</p>
    <div class="gallery">
        <div class="car-item">
            <img src="<?php echo fetchImage('acceuil_en', 'car1'); ?>" alt="Porsche Taycan Turbo S">
            <div class="car-label"><?php echo fetchContent('acceuil_en', 'car1'); ?></div>
        </div>
        <div class="car-item">
            <img src="<?php echo fetchImage('acceuil_en', 'car2'); ?>" alt="Maserati MC20 Cielo">
            <div class="car-label"><?php echo fetchContent('acceuil_en', 'car2'); ?></div>
        </div>
        <div class="car-item">
            <img src="<?php echo fetchImage('acceuil_en', 'car3'); ?>" alt="Aston Martin Vanquish">
            <div class="car-label"><?php echo fetchContent('acceuil_en', 'car3'); ?></div>
        </div>
    </div><br />
    <a href="voiture-en.php" class="btn btn-dark">See More</a>
    <a href="essai-en.php" class="btn btn-dark">Book a Test Drive Now</a>
    </section>
</section>

<!-- Test Drive Section -->
    
    <!-- Services Section -->
    <section id="services">
        <h2><b>Our Services</b></h2>
        <p>Discover our exclusive services for premium support</p>
        <div class="service-gallery">
            <div class="service-item">
                <img src="<?php echo fetchImage('acceuil_en', 'service1'); ?>" alt="Detailing">
                <div class="service-label"><?php echo fetchContent('acceuil_en', 'service1'); ?></div>
            </div>
            <div class="service-item">
                <img src="<?php echo fetchImage('acceuil_en', 'service2'); ?>" alt="Maintenance">
                <div class="service-label"><?php echo fetchContent('acceuil_en', 'service2'); ?></div>
            </div>
            <div class="service-item">
                <img src="<?php echo fetchImage('acceuil_en', 'service3'); ?>" alt="Delivery">
                <div class="service-label"><?php echo fetchContent('acceuil_en', 'service3'); ?></div>
            </div>
        </div><br />
        <a href="Services-en.php" class="btn btn-dark">See All Services</a>
    </section>

<hr>
    <!-- Contact Section -->
    <section id="contact" style="background: url('images/contact-bg.jpg') no-repeat center center/cover; padding: 80px 0; text-align: center;">
        <h2><b>Contact Us</b></h2>
        <p>Need more information or want to talk to our team? Contact us now.</p>
        <a href="contact-en.php" class="btn btn-dark">Contact Us</a>
    </section>


    <!-- Right Sticky Sidebar -->
    <div class="sidebar">
            <a href="essai-en.php"><i class="fas fa-car"></i> <span>Test Drive</span></a>
            <a href="contact-en.php"><i class="fas fa-envelope"></i> <span>Contact Us</span></a>
        </div>
    <!-- End Sidekick -->

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
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
 
</body>
</html>