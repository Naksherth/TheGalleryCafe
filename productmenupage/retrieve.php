<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "thegallerycafe"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$pid = $_POST['pid'];
$uid = $_POST['uid'];

// Check if the product is already in the cart for this user
$sql = "SELECT * FROM cart WHERE uid = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $uid, $pid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Insert the product into the cart
    $sql = "INSERT INTO cart (uid, product_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $uid, $pid);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'already_in_cart';
}

$stmt->close();
$conn->close();
?>
