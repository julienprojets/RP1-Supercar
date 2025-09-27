<?php
include('navbar-fr.php');
include('admin-fr.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services</title>

    <!-- CSS -->
    <link href="Services.css" rel="stylesheet" type="text/css" />
    <link href="Navbar.css" rel="stylesheet" type="text/css" />
    <link href="Footer.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Animations -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tab Icon -->
    <link href="Service_Images/Spare/car-wash.png" rel="shortcut icon" type="image/x-icon" />

     <!-- This checks whether the device supports touch events> -->
     <script type="text/javascript">
        !(function (o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            (n.className += t + "js"),
                ("ontouchstart" in o ||
                    (o.DocumentTouch && c instanceof DocumentTouch)) &&
                (n.className += t + "touch");
        })(window, document);
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery (Required for Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script src="search-fr.js" type="text/javascript" defer></script>

    <!-- Footer Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

<!-- Video -->
<div class="position-relative top-5">
    <video autoplay muted loop playsinline class="w-100" style="height: 25vh; object-fit: cover;">
        <source src="Service_Images/service-vid-com.mp4" type="video/mp4">
    </video>

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100" style="background: linear-gradient(
        90deg,
        hsla(0, 0%, 0%, 0.3),
        hsla(0, 0%, 0%, 0.5) 50%,
        hsla(0, 88%, 45%, 0.3) 70%
      ); height: 25vh;"></div>

    <!-- Heading Over Video -->
    <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index: 10;">
        <h2 class="display-4 fw-bold"><span style="color: crimson;">Nos</span> Services</h2>
    </div>
</div>

<!-- End Video -->

<!-- Right Sticky Sidebar -->
<div class="sidebar">
    <a href="essai-fr.php"><i class="fas fa-car"></i> <span>Demande D'essai</span></a>
    <a href="contact-fr.php"><i class="fas fa-envelope"></i> <span>Contactez-Nous</span></a>
</div>
<!-- End Sidekick -->

<!-- 3 Cards at Top Owl Slider -->
<div class="container pt-5" style="z-index: 9999;">
    <h2 class="border-botto" style="z-index: 9997;">Services <span style="color: crimson; font-size:larger;">en Commun</span></h2>
    <div class="owl-carousel noverflow">
        <div class="item">
            <div class="card codo">
                <img src="<?php echo fetchImage('service_fr', 'slide1'); ?>" alt="Leasing Card" class="img">
                <h3 class="p-2"><?php echo fetchContent('service_fr', 'slide1'); ?></h3>
                <p class="text-muted"><?php echo fetchSub('service_fr', 'slide1'); ?></p>
            </div>
        </div>
        <div class="item">
            <div class="card codo">
                <img src="<?php echo fetchImage('service_fr', 'slide2'); ?>" alt="Maintenance Card" class="img">
                <h3 class="p-2"><?php echo fetchContent('service_fr', 'slide2'); ?></h3>
                <p class="text-muted"><?php echo fetchSub('service_fr', 'slide2'); ?></p>
            </div>
        </div>
        <div class="item">
            <div class="card codo">
                <img src="<?php echo fetchImage('service_fr', 'slide3'); ?>" alt="On-Road Card" class="img">
                <h3 class="p-2"><?php echo fetchContent('service_fr', 'slide3'); ?></h3>
                <p class="text-muted"><?php echo fetchSub('service_fr', 'slide3'); ?></p>
            </div>
        </div>
    </div>
</div>
<!-- End 3 Cards Owl Slider -->

<div class="container px-5 py-4 mt-3">
    <h2 class="border-botto">Servives <span style="color: crimson; font-size:larger;">Supplémentaires</span></h2>
</div>
    

<!-- Car Wash Big -->
<section class="p-3 dark-bg">
    <div class="container">
        <div class="row img-wrapper px-4">
            <div class="col-md-6 text-center text-md-start text-justify d-flex flex-column justify-content-center text-white">
                <h1 class="display-6 pt-2 fw-bold"><?php echo fetchContent('service_fr', 'section1'); ?></h1>
                <p class="pt-3 lead"><?php echo fetchSub('service_fr', 'section1'); ?></p>
            </div>
            <div class="col-md-6 d-none d-md-block d-flex align-items-center translate-bottom ">
                <img src="<?php echo fetchImage('service_fr', 'section1'); ?>" class="img-fluid img-shadow" alt="Car Wash-Big">
            </div>
        </div>
    </div>
</section>

<!-- Courtesy Car Big -->
<section class="p-3 light-bg">
    <div class="container">
        <div class="row img-wrapper px-4">
            <div class="col-md-6 d-none d-md-block d-flex align-items-center translate-bottom ">
                <img src="<?php echo fetchImage('service_fr', 'section2'); ?>" class="img-fluid img-shadow" alt="Courtesy-Car-Big">
            </div>
            <div class="col-md-6 text-center text-md-start text-md-justify d-flex flex-column justify-content-center pt-4">
                <h1 class="display-6 pt-2 fw-bold"><?php echo fetchContent('service_fr', 'section2'); ?></h1>
                <p class="pt-3 lead"><?php echo fetchSub('service_fr', 'section2'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Delivery Big -->
<section class="dark-bg p-3">
    <div class="container">
        <div class="row img-wrapper px-4">
            <div class="col-md-6 text-center text-md-start d-flex flex-column justify-content-center pt-4">
                <h1 class="display-6 pt-2 fw-bold"><?php echo fetchContent('service_fr', 'section3'); ?></h1>
                <p class="pt-3 lead"><?php echo fetchSub('service_fr', 'section3'); ?></p>
            </div>
            <div class="col-md-6 d-none d-md-block d-flex align-items-center translate-bottom ">
                <img src="<?php echo fetchImage('service_fr', 'section3'); ?>" class="img-fluid img-shadow" alt="Car-Delivery-Big">
            </div>
        </div>
    </div>
</section>

<!-- Leasing & Banking Big -->
<section class="p-3 light-bg">
    <div class="container">
        <div class="row img-wrapper px-4">
            <div class="col-md-6 d-none d-md-block d-flex align-items-center translate-bottom ">
                <img src="<?php echo fetchImage('service_fr', 'section4'); ?>" class="img-fluid img-shadow" alt="Leasing-Big">
            </div>
            <div class="col-md-6 text-center text-md-start text-md-justify d-flex flex-column justify-content-center pt-4">
                <h1 class="display-6 pt-2 fw-bold"><?php echo fetchContent('service_fr', 'section4'); ?></h1>
                <p class="pt-3 lead"> <?php echo fetchSub('service_fr', 'section4'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Maintenance Big -->
<section class="dark-bg p-3">
    <div class="container">
        <div class="row img-wrapper px-4">
            <div class="col-md-6 text-center text-md-start d-flex flex-column justify-content-center pt-4">
                <h1 class="display-6 pt-2 fw-bold"><?php echo fetchContent('service_fr', 'section5'); ?></h1>
                <p class="pt-3 lead"> <?php echo fetchSub('service_fr', 'section5'); ?></p>
            </div>
            <div class="col-md-6 d-none d-md-block d-flex align-items-center translate-bottom">
                <img src="<?php echo fetchImage('service_fr', 'section5'); ?>" class="img-fluid img-shadow" alt="Maintenance-Big">
            </div>
        </div>
    </div>
</section>

<!-- On-Road Big -->
<section class="p-3 light-bg">
    <div class="container">
        <div class="row img-wrapper px-4">
            <div class="col-md-6 d-none d-md-block d-flex align-items-center translate-bottom ">
                <img src="<?php echo fetchImage('service_fr', 'section6'); ?>" class="img-fluid img-shadow" alt="On-Road-Big">
            </div>
            <div class="col-md-6 text-center text-md-start text-md-justify d-flex flex-column justify-content-center pt-4">
                <h1 class="display-6 pt-2 fw-bold"><?php echo fetchContent('service_fr', 'section6'); ?></h1>
                <p class="pt-3 lead"> <?php echo fetchSub('service_fr', 'section6'); ?></p>            
            </div>
        </div>
    </div>
</section>
<br /><br />
<br /><br />

<!-- Footer -->
<footer>
    <p>&copy; 2025 Supercar. Tous droits réservés.</p>
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


<script src="Services.js" type="text/javascript" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>