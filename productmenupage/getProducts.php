<?php
header('Content-Type: application/json');

// Check if ID is provided
if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'No product ID provided']);
    exit();
}

$productId = intval($_GET['id']);

// Database connection
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your username
$password = "";            // Replace with your password
$dbname = "thegallerycafe"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details
$sql = "SELECT name, price FROM productdetails WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

$product = $result->fetch_assoc();



// Fetch products
$sql = "SELECT id, name, image FROM productdetails";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Close connection
$conn->close();

// Output results as JSON
echo json_encode($products);
?>
