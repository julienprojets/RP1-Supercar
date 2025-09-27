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

// Function to fetch content dynamically
function fetchContent($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT content FROM $table WHERE section = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['content'];
    } else {
        return "Texte non disponible"; // Default text if not found
    }
}

// Function to fetch image dynamically
function fetchImage($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT image FROM $table WHERE section = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['image'];
    } else {
        return "Image non disponible"; // Default text if not found
    }
}

// Function to fetch subtext dynamically
function fetchSub($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT sub FROM $table WHERE section = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['sub'];
    } else {
        return "Texte non disponible"; // Default text if not found
    }
}

// Function to fetch Car_Make dynamically
function fetchMake($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT make FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['make'];
    } else {
        return "Marque non disponible"; // Default text if not found
    }
}

// Function to fetch Car_Model dynamically
function fetchModel($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT model FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['model'];
    } else {
        return "Modèle non disponible"; // Default text if not found
    }
}

// Function to fetch Car_Type dynamically
function fetchType($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT type FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['type'];
    } else {
        return "Type non disponible"; // Default text if not found
    }
}

// Function to fetch Car_Price dynamically
function fetchPrice($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT price FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['price'];
    } else {
        return "Prix non disponible"; // Default text if not found
    }
}

// Function to fetch Explore Image1 dynamically
function fetchExploreImage1($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT explore_img1 FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['explore_img1'];
    } else {
        return "Image non disponible"; // Default text if not found
    }
}
// Function to fetch Explore Image2 dynamically
function fetchExploreImage2($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT explore_img2 FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['explore_img2'];
    } else {
        return "Image non disponible"; // Default text if not found
    }
}
// Function to fetch Explore Image3 dynamically
function fetchExploreImage3($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT explore_img3 FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['explore_img3'];
    } else {
        return "Image non disponible"; // Default text if not found
    }
}
// Function to fetch Overview-fr dynamically
function fetchOverviewFr($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT overview_fr FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['overview_fr'];
    } else {
        return "Texte non disponible"; // Default text if not found
    }
}
// Function to fetch Specs-fr dynamically
function fetchSpecsFr($table, $section) {
    global $conn;
    
    // Ensure table name is safe (avoid SQL injection)
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);
    
    $sql = "SELECT specs_fr FROM $table WHERE car_num = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['specs_fr'];
    } else {
        return "Spécifications non disponible"; // Default text if not found
    }
}
?>
