<?php
session_start(); // Start the session at the beginning of the script

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thegallerycafe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['USER_ID'])) {
    die("You must be logged in to add items to the cart.");
}

$user_id = $_SESSION['USER_ID']; // Retrieve the logged-in user's ID

// Handle the "add to cart" request
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Prepare statement to insert or update the cart
    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)");
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    $stmt->execute();
    
    echo "Product added to cart successfully!";
}

// Fetch products
$sql = "SELECT ID, Name, Price, Image FROM productdetails";
$result = $conn->query($sql);
?>
