<?php
include 
session_start();
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "thegallerycafe"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if form data is sent
if (isset($_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['product_quantity'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    // Check if product is already in the cart
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        echo 'Product already added to cart';
    } else {
        // Insert product into cart
        $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
        if ($insert_product) {
            echo 'Product added to cart successfully';
        } else {
            echo 'Failed to add product to cart';
        }
    }
} else {
    echo 'Invalid request';
}

mysqli_close($conn);
?>
