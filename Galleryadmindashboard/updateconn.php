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

$productName = $productPrice = $productDetails = $productType = $productCuisine = $file_name = "";

if (isset($_POST['retrieve'])) {
    $productID = $_POST['productID'];

    // Retrieve product details
    $sql = "SELECT * FROM productdetails WHERE id = $productID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = $row['Name'];
        $productPrice = $row['Price'];
        $productDetails = $row['Details'];
        $productType = $row['Type'];
        $productCuisine = $row['Cusine'];
        $file_name = $row['Image'];
    } else {
        echo "No record found with ID: $productID";
    }
}

if (isset($_POST['submit'])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDetails = $_POST['productDetails'];
    $productType = $_POST['productType'];
    $productCuisine = $_POST['productCuisine'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;

//     // Update query
//     if (!empty($file_name)) {
//         if (move_uploaded_file($tempname, $folder)) {
//             $sql = "UPDATE productdetails 
//                     SET Name = '$productName', Details = '$productDetails', Price = $productPrice, 
//                         Type = '$productType', Cusine = '$productCuisine', Image = '$file_name' 
//                     WHERE id = $productID";
//         } else {
//             echo "Failed to upload image.";
//             exit();
//         }
//     } else {
//         $sql = "UPDATE productdetails 
//                 SET Name = '$productName', Details = '$productDetails', Price = $productPrice, 
//                     Type = '$productType', Cusine = '$productCuisine'
//                 WHERE id = $productID";
//     }

//     // Execute SQL statement
//     if ($conn->query($sql) === TRUE) {
//         echo "Record updated successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// Handle delete action
if (isset($_POST['delete'])) {
    $productID = $_POST['productID'];

    // Delete query
    $sql = "DELETE FROM productdetails WHERE id = $productID";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
        // Optionally, you can redirect or perform other actions after deletion
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
