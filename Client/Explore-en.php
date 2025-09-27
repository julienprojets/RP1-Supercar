<?php
include('navbar-en.php');
include('admin-en.php'); 

if (!isset($conn) || $conn->connect_error) {
    die("<div class='alert alert-danger'>Connection Error.</div>");
}

$carName = $_GET['car'] ?? '';

if ($carName === '') {
    die("<div class='alert alert-danger'>No car chosen.</div>");
}

$sql = "SELECT * FROM voiture WHERE model = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("<div class='alert alert-danger'>Error in request preparation.</div>");
}

$stmt->bind_param("s", $carName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("<div class='alert alert-danger'>Car not found !</div>");
}

$car = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore - <?= htmlspecialchars($car['model']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Navbar.css">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="Explore.css">
    <script src="search.js" defer></script>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <a href="essai-en.php"><i class="fas fa-car"></i> <span>Test Drive</span></a>
    <a href="contact-en.php"><i class="fas fa-envelope"></i> <span>Contact Us</span></a>
</div>

<!-- Car Brand Name -->
<div class="car-brand-name">
    <h1><?= htmlspecialchars($car['make']) ?> <?= htmlspecialchars($car['model']) ?></h1>
</div>

<!-- Hero Section with Carousel -->
<div class="container mt-5">
    <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach (['explore_img1', 'explore_img2', 'explore_img3'] as $index => $image): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= htmlspecialchars($car[$image]) ?>" class="d-block w-100" alt="Car Image">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- Description Section -->
<div class="container mt-4 d-flex justify-content-center">
    <div class="col-md-8">
        <ul class="nav nav-tabs justify-content-center" id="carTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="specs-tab" data-toggle="tab" href="#specs" role="tab">Specifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab">Key Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="price-tab" data-toggle="tab" href="#price" role="tab">Price</a>
            </li>
        </ul>
        <div class="tab-content mt-3 text-center" id="carTabContent">
            <!-- Overview -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <h3>Overview</h3>
                <p><?= htmlspecialchars($car['overview_en']) ?></p>
            </div>
            <!-- Specifications -->
            <div class="tab-pane fade" id="specs" role="tabpanel">
                <h3>Specifications</h3>
                <table class="table" style="background-color: #F2F2F2; line-height: 1.8;">
                    <thead>
                        <tr>
                            <th class="text-left" style="background-color: #F2F2F2;">Category</th>
                            <th class="text-left" style="background-color: #F2F2F2;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #F2F2F2;"><strong>Engine</strong></td>
                            <td style="background-color: #F2F2F2;"><strong>Type: </strong><?= htmlspecialchars($car['eng_type_en']) ?></td>
                        </tr>
                        <tr>
                            <td style="background-color: #F2F2F2;"></td>
                            <td style="background-color: #F2F2F2;"><strong>Power: </strong> <?= htmlspecialchars($car['puissance']) ?> HP</td>
                        </tr>

                        <tr>
                            <td style="background-color: #F2F2F2;"><strong>Transmission</strong></td>
                            <td style="background-color: #F2F2F2;"><strong>Type: </strong><?= htmlspecialchars($car['transmission_en']) ?></td>
                        </tr>
                        <tr>
                            <td style="background-color: #F2F2F2;"></td>
                            <td style="background-color: #F2F2F2;"><strong>Gears:</strong> <?= htmlspecialchars($car['boite_vitesse']) ?>-Speed</td>
                        </tr>

                        <tr>
                            <td style="background-color: #F2F2F2;"><strong>Performance</strong></td>
                            <td style="background-color: #F2F2F2;"><strong>Top Speed:</strong> <?= htmlspecialchars($car['max_speed']) ?> km/h</td>
                        </tr>
                        <tr>
                            <td style="background-color: #F2F2F2;"></td>
                            <td style="background-color: #F2F2F2;"><strong>0-100 km/h: </strong> <?= htmlspecialchars($car['accel']) ?> seconds</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Features -->
            <div class="tab-pane fade" id="features" role="tabpanel">
                <h3>Key Features</h3><br/>
                <p style="text-align: left; white-space: pre-wrap; line-height: 40px"><?= $car['key_en'] ?></p>
            </div>
            <!-- Price -->
            <div class="tab-pane fade" id="price" role="tabpanel">
                <h3>Price</h3>
                <p><?= htmlspecialchars($car['price']) ?></p>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
