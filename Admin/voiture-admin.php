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
$host = "localhost"; $username = "root"; $password = ""; $dbname = "supercar";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>
 
<?php
include('navbar-structure.php');
 
if (!isset($conn) || $conn->connect_error) {
    die("<div class='alert alert-danger'>Database Connection Error.</div>");
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $stmt = $conn->prepare("UPDATE voiture SET make=?, type=?, price=?, image=?, explore_img1=?, explore_img2=?, explore_img3=?, overview_fr=?, overview_en=?, eng_type_fr=?, eng_type_en=?, puissance=?, transmission_fr=?, transmission_en=?, boite_vitesse=?, key_fr=?, key_en=?, max_speed=?, accel=? WHERE model=?");
        $stmt->bind_param("sssssssssssississids", $_POST['make'], $_POST['type'], $_POST['price'], $_POST['image'], $_POST['explore_img1'], $_POST['explore_img2'], $_POST['explore_img3'], $_POST['overview_fr'], $_POST['overview_en'], $_POST['eng_type_fr'], $_POST['eng_type_en'], $_POST['puissance'], $_POST['transmission_fr'], $_POST['transmission_en'], $_POST['boite_vitesse'], $_POST['key_fr'], $_POST['key_en'], $_POST['max_speed'], $_POST['accel'], $_POST['model']);
        $stmt->execute();
    } elseif (isset($_POST['delete'])) {
        $stmt = $conn->prepare("DELETE FROM voiture WHERE model=?");
        $stmt->bind_param("s", $_POST['model']);
        $stmt->execute();
    }
}
 
$result = $conn->query("SELECT * FROM voiture");
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Voitures</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
 
    <style>
        body { background-color: #101010; color: #E5E4E2; }
        .table { background-color: #222; }
        .btn-crimson { background-color: crimson; color: white; }
        .btn-crimson:hover { background-color: #9a0000; }
        .btn-gold { background-color: #fac623; color: black; }
        .btn-gold:hover { background-color: #cda401; }
        .modal-content { background: #222; color: #E5E4E2; }
        .is-invalid {
          border-color: crimson;
          background-color: rgba(220, 20, 60, 0.1);
        }
    </style>
 
    <script>
        function populateModal(car) {
            document.getElementById('modal-model').value = car.model;
            document.getElementById('modal-model-display').value = car.model;
            document.getElementById('modal-make').value = car.make;
            document.getElementById('modal-type').value = car.type;
            document.getElementById('modal-price').value = car.price;
            document.getElementById('modal-image').value = car.image;
            document.getElementById('modal-preview-image').src = car.image;
            document.getElementById('modal-preview-image').alt = car.model + " image";
            document.getElementById('image-path-text').textContent = car.image;
            document.getElementById('modal-explore_img1').value = car.explore_img1;
            document.getElementById('modal-explore_img2').value = car.explore_img2;
            document.getElementById('modal-explore_img3').value = car.explore_img3;
            document.getElementById('modal-overview_fr').value = car.overview_fr;
            document.getElementById('modal-overview_en').value = car.overview_en;
            document.getElementById('modal-eng_type_fr').value = car.eng_type_fr;
            document.getElementById('modal-eng_type_en').value = car.eng_type_en;
            document.getElementById('modal-puissance').value = car.puissance;
            document.getElementById('modal-transmission_fr').value = car.transmission_fr;
            document.getElementById('modal-transmission_en').value = car.transmission_en;
            document.getElementById('modal-boite_vitesse').value = car.boite_vitesse;
            document.getElementById('modal-max_speed').value = car.max_speed;
            document.getElementById('modal-accel').value = car.accel;
            document.getElementById('modal-key-fr').value = car.key_fr;
            document.getElementById('modal-key-en').value = car.key_en;
 
            document.getElementById('carouselImage1').src = car.explore_img1;
            document.getElementById('carouselImage2').src = car.explore_img2;
            document.getElementById('carouselImage3').src = car.explore_img3;
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center" style="color: crimson;">Gestion des Voitures</h2>
    <table class="table table-dark table-striped mt-5 text-center align-middle fs-6">
        <thead>
            <tr class="fs-5">
                <th>Constructeur</th>
                <th>Modèle</th>
                <th>Carosserie</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($car = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($car['make']) ?></td>
                <td><?= htmlspecialchars($car['model']) ?></td>
                <td><?= htmlspecialchars($car['type']) ?></td>
                <td><img src="<?= htmlspecialchars($car['image']) ?>" alt="" style="height:75px;"></td>
                <td><?= htmlspecialchars($car['price']) ?></td>
                <td>
                    <button
                        type="button"
                        class="btn btn-warning btn-sm fs-5"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        onclick='populateModal(<?= json_encode($car, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>
                        Modif
                    </button>
                    <form method="post" class="d-inline">
                        <input type="hidden" name="model" value="<?= htmlspecialchars($car['model']) ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
 
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modifier Voiture</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <input type="hidden" id="modal-model" name="model">
          <div class="row">
            <!-- LEFT COLUMN -->
            <div class="col-md-5">
              <div class="mb-3">
                <label>Photo Actuelle</label><br>
                <img id="modal-preview-image" src="" alt="Car Image" class="img-fluid mb-2" style="max-height: 200px; border: 1px solid #555; margin: 0 auto; display: block;">
                <small id="image-path-text" style="color: gray;"></small>
                <input type="text" id="modal-image" name="image" class="form-control mt-2" placeholder="Image URL">
              </div>
 
              <div id="exploreCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img id="carouselImage1" src="" class="d-block w-100" alt="Explore Image 1" style="max-height: 300px;">
                  </div>
                  <div class="carousel-item">
                    <img id="carouselImage2" src="" class="d-block w-100" alt="Explore Image 2" style="max-height: 300px;">
                  </div>
                  <div class="carousel-item">
                    <img id="carouselImage3" src="" class="d-block w-100" alt="Explore Image 3" style="max-height: 300px;">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#exploreCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#exploreCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Suivant</span>
                </button>
              </div>
 
              <div class="mb-2">
                <label>Source de Image 1</label>
                <input type="text" id="modal-explore_img1" name="explore_img1" class="form-control">
              </div>
              <div class="mb-2">
                <label>Source de Image 2</label>
                <input type="text" id="modal-explore_img2" name="explore_img2" class="form-control">
              </div>
              <div class="mb-2">
                <label>Source de Image 3</label>
                <input type="text" id="modal-explore_img3" name="explore_img3" class="form-control">
              </div>
            </div>
 
            <!-- RIGHT COLUMN -->
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Constructeur</label>
                    <input type="text" id="modal-make" name="make" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Modèle</label>
                    <input type="text" id="modal-model-display" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Carosserie</label>
                    <input type="text" id="modal-type" name="type" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Prix</label>
                    <input type="text" id="modal-price" name="price" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-2">
                <label>Aperçu-FR</label>
                <textarea id="modal-overview_fr" name="overview_fr" class="form-control" rows="4"></textarea>
              </div>
              <div class="mb-2">
                <label>Overview-EN</label>
                <textarea id="modal-overview_en" name="overview_en" class="form-control" rows="4"></textarea>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Moteur-FR</label>
                    <input type="text" id="modal-eng_type_fr" name="eng_type_fr" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Engine-EN</label>
                    <input type="text" id="modal-eng_type_en" name="eng_type_en" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-2">
                <label>Transmission-FR</label>
                <input type="text" id="modal-transmission_fr" name="transmission_fr" class="form-control">
              </div>
              <div class="mb-2">
                <label>Transmission-EN</label>
                <input type="text" id="modal-transmission_en" name="transmission_en" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Puissance</label>
                    <input type="text" id="modal-puissance" name="puissance" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Boîte de vitesses</label>
                    <input type="text" id="modal-boite_vitesse" name="boite_vitesse" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>Vitesse Max</label>
                    <input type="text" id="modal-max_speed" name="max_speed" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label>0-100 km/h (s)</label>
                    <input type="text" id="modal-accel" name="accel" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
 
          <div class="row">
            <div class="col-md-6">
              <div class="mb-2">
                <label>Specifications-FR</label>
                <textarea id="modal-key-fr" name="key_fr" class="form-control" rows="5"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-2">
                <label>Specifications-EN</label>
                <textarea id="modal-key-en" name="key_en" class="form-control" rows="5"></textarea>
              </div>
            </div>
          </div>
 
          <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-gold">Sauvegarder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('#editModal form');
 
    form.addEventListener('submit', function (e) {
        const requiredFields = [
            { id: 'modal-make', name: 'Make' },
            { id: 'modal-type', name: 'Type' },
            { id: 'modal-price', name: 'Price' },
            { id: 'modal-image', name: 'Main Image' },
            { id: 'modal-model', name: 'Model (hidden)' }
        ];
 
        let hasError = false;
        let messages = [];
 
        requiredFields.forEach(field => {
            const input = document.getElementById(field.id);
            if (!input.value.trim()) {
                hasError = true;
                messages.push(`❌ ${field.name} is required.`);
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });
 
        if (hasError) {
            e.preventDefault();
            alert("Please fix the following:\n\n" + messages.join("\n"));
        }
    });
});
</script>
 
<?php include 'footer-structure.php'; ?>
 
</body>
</html>