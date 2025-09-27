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
 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Build table name correctly: page_lang (e.g. service_en)
        $table = $_POST['page'] . '_' . $_POST['lang'];
    $stmt = $conn->prepare("UPDATE " . $table . " SET content=?, image=? WHERE id=?");
    $stmt->bind_param("ssi", $_POST['content'], $_POST['image'], $_POST['id']);
    $stmt->execute();
}
 
// Fetch data by page and language
$pages = ['acceuil', 'service', 'contact'];
 
foreach ($pages as $page) {
    ${$page . '_en'} = $conn->query("SELECT * FROM " . $page . "_en");
    ${$page . '_fr'} = $conn->query("SELECT * FROM " . $page . "_fr");
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion du Contenu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
  </style>
  <script>
    function populateTextModal(id, section, content, image, lang, page) {
      document.getElementById('text-id').value   = id;
      document.getElementById('text-page').value = page;
      document.getElementById('text-lang').value = lang;
      document.getElementById('text-section').value = section;
      document.getElementById('text-content').value = content;
      document.getElementById('text-image').value = image;
      document.getElementById('text-preview-image').src = image;
    }
  </script>
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center" style="color: crimson;">Gestion du Contenu</h2>
 
  <?php foreach ($pages as $page): ?>
    <h4 class="mt-4 text-capitalize">Page <?= $page ?></h4>
    <div class="row">
      <?php foreach (['en','fr'] as $lang): ?>
        <div class="col-md-6">
          <h5><?= strtoupper($lang) ?></h5>
          <table class="table table-dark table-striped">
            <thead>
              <tr><th>Section</th><th>Aperçu</th><th>Image</th><th>Action</th></tr>
            </thead>
            <tbody>
              <?php $result = ${$page . '_' . $lang}; while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['section']) ?></td>
                  <td><?= htmlspecialchars(substr($row['content'], 0, 60)) ?>...</td>
                  <td>    <?php if (!empty($row['image'])): ?>
                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="" style="height:40px;">
                          <?php endif; ?>
                  </td>
                  <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#textModal"
                      onclick='populateTextModal(<?= $row['id'] ?>, "<?= $row['section'] ?>", <?= json_encode($row['content']) ?>, <?= json_encode($row['image']) ?>, "<?= $lang ?>", "<?= $page ?>")'>Modifier</button>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
 
<!-- Modal -->
<div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="textModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="textModalLabel">Modifier Section</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="text-id">
          <input type="hidden" name="lang" id="text-lang">
          <input type="hidden" name="page" id="text-page">
 
          <div class="row">
            <div class="col-md-6">
              <div class="mb-2">
                <label>Section</label>
                <input type="text" class="form-control" id="text-section" disabled>
              </div>
              <div class="mb-2">
                <label>Contenu</label>
                <textarea name="content" id="text-content" rows="6" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-2">
                <label>Image URL</label>
                <input type="text" name="image" id="text-image" class="form-control">
                <img id="text-preview-image" src="" class="mt-2 img-fluid" style="max-height: 200px; margin: 0 auto; display: block;">
              </div>
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
 
<?php include 'footer-structure.php'; ?>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>