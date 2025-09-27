<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "supercar";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set UTF-8 encoding
$conn->set_charset("utf8");

// ✅ Function to Fetch Text Content
if (!function_exists('getText')) {
    function getText($section) {
        global $conn;
        $sql = "SELECT content FROM `acceuil_fr` WHERE section = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $section);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Debugging output
        echo "<pre>";
        echo "Query: " . $sql . "<br>";
        echo "Section: " . $section . "<br>";
        echo "Rows found: " . $result->num_rows . "<br>";
        if ($row = $result->fetch_assoc()) {
            print_r($row);
        }
        echo "</pre>";

        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['content'];
        } else {
            return "Texte non disponible"; // Default text if not found
        }
    }
}
?>
