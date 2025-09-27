<?php
include('navbar-en.php');
include('admin-en.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link href="Navbar.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="search-en.js" type="text/javascript" defer></script>

<style>
body {
    background-image: url("Contact_Images/718CaymanGT4RS.jpg"); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    overflow-x: hidden;
}

        /* Contact Container */
        .contact-container {
            background: rgb(0, 0, 0);
            padding: 30px;
            max-width: 1000px;
            width: 100%;
            box-shadow: 0 0 10px rgba(255, 243, 243, 0.1);
            margin: 40px auto; 
            color: white;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Form */
        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #000000;
            color: white;
        }

        .form-group .half {
            width: 48%;
        }

        .form-group .full {
            width: 100%;
        }

        button {
            background-color: #a06e13;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #462f06;
        }

        /* Contact Section */
        .contact-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        /* Contact Info */
        .contact-info {
            width: 100%;
            background: linear-gradient(145deg, #1e1e1e, #333);
            color: white;
            padding: 30px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 500px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-info:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.3);
        }

        .contact-info p {
            font-size: 16px;
            margin: 10px 0;
            text-align: center;
        }

        .contact-info i {
            margin-right: 15px;
            font-size: 20px;
            color: #3498db;
            transition: color 0.3s ease;
        }

        .contact-info i:hover {
            color: #e74c3c;
        }

        /* Map */
        .map-container {
            flex: 1.3;
            height: 450px;
            margin: 0;
            margin-top: 20px;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Sidebar */
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


        .button-container-envoyer {
            text-align: center; 
            margin-top: 20px; 
        }

        .contactez-nous {
            text-align: center; 

        }

        /* Start Footer */
        footer {
            background-color: #f2f2f2;
            color: #101010;
            text-align: center;
            padding: 45px;
            width: 100%;
        }

        footer a {
            display: inline-block;
            text-decoration: none;
            color: #101010;
            margin: 10px;
            padding: 10px;
            border-radius: 50%;
        }

        footer a:hover {
            border: 1px solid rgb(207, 212, 178);
            color: crimson;
        }

    /* End Footer */
</style>

</head>
<body>

<div class="contact-container">
    
    <div class="contactez-nous">
        <h2>CONTACT US</h2>
    </div>
    <form id="contactForm" action="formulairedecontacte-en.php" method="POST">
        <div class="form-group">
            <div class="half">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="Please enter your first name here..." 
                value="<?php echo isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : ''; ?>" required>
            </div>
            <div class="half">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Please enter your last name here..." 
                value="<?php echo isset($_SESSION['nom']) ? htmlspecialchars($_SESSION['nom']) : ''; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="half">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="email@example.com" 
                value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
            </div>
            <div class="half">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="+230..."   
                value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <div class="full">
                <label for="comment">Comments/Special Requests</label>
                <textarea id="comment" name="comment" rows="4" placeholder="Enter your message..." required></textarea>
            </div>
        </div>
        <div class="button-container-envoyer">
            <button type="submit">Submit</button>
        </div>
    </form>
    
</div>

<div class="contact-section">
    <div class="contact-container1">
        <div class="contact-section">
          <div class="contact-info">
                <h3><i class="fas fa-envelope"></i>Email</h3>
                <p><?php echo fetchContent('contact_en', 'email'); ?></p>
                <br /><br />
                <h3><i class="fas fa-phone-alt"></i>Phone</h3>
                <p><?php echo fetchContent('contact_en', 'phone'); ?></p>
                <br /><br />
                <h3 style="margin-bottom: 0.01rem;"><i class="fas fa-clock"></i>Opening Hours</h3>
                <p style="text-align: center; white-space: pre-line; line-height: 2.5; margin-top: 0.1rem;">
                    <?= htmlspecialchars(fetchContent('contact_en', 'horaire')); ?>
                </p>






            </div>
        </div>
    </div>
    <div class="map-container" >
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4645.667053691394!2d57.52271718639771!3d-20.224278999131418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5a6c7c6444ab%3A0xb5ca96958672dd36!2sCarClub%20Ltd!5e1!3m2!1sen!2smu!4v1739261116655!5m2!1sen!2smu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<!-- Right Sticky Sidebar -->
<div class="sidebar">
    <a href="essai-en.php"><i class="fas fa-car"></i> <span>Request Trial</span></a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Stop form from reloading the page

    let formData = new FormData(this);

    fetch("formulairedecontacte-en.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response received:", data); // Debugging
        if (data.status === "success") {
            showPopup("✅ Request sent successfully!");
            document.getElementById("contactForm").reset(); // Clear form
        } else {
            showPopup("❌ Error: " + data.message);

            .catch(error => {
            console.error("Fetch error:", error);
            showPopup("✅ Request sent successfully!");
            }); 
        }
    })
   
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