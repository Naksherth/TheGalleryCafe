<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thegallerycafe";

$conn = new mysqli($servername, $username, $password, $dbname);

try {
    if ($conn->connect_error) {
        die("Not connected: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Message: " . $e->getMessage();
}
if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDetails = $_POST['productDetails'];
    $productType = $_POST['productType'];
    $productCuisine = $_POST['productCuisine'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;

    $sql = "INSERT INTO productdetails (Name, Details, Price, Type, Cusine, Image)
            VALUES ('$productName', '$productDetails', $productPrice, '$productType', '$productCuisine', '$file_name')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>