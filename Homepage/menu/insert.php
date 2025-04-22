<?php
include("dbconnection.php");
// if(isset($_POST['submit'])){
//     $productName = $_POST['productName'];
//     $productPrice = $_POST['productPrice'];
//     $productDetails = $_POST['productDetails'];
//     $productType = $_POST['productType'];
//     $productCuisine = $_POST['productCuisine'];
//     $file_name=$_FILES['image']['name'];
//     $tempname=$_FILES['image']['tmp_name'];
//     $folder='images/'.$file_name;

//     $query = mysqli_query($conn, "INSERT INTO productdetails (Name, Details, Price, Type, Cusine, Image) VALUES ('$productName', '$productDetails', $productPrice, '$productType', '$productCuisine', '$file_name')");
//     if ($conn->query($sql) === TRUE) {
//         echo "Record inserted successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }

// }
// $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">

    <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="productPrice">Price:</label>
        <input type="number" id="productPrice" name="productPrice" min="0" step="0.01" required>

        <label for="productDetails">Detail:</label>
        <input type="text" id="productDetails" name="productDetails">

        <label for="productType">Type of Food:</label>
        <select id="productType" name="productType" required>
            <option value="">Select Type</option>
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
            <option value="delight">Delight</option>
            <option value="coffee">Coffee</option>
        </select>

        <label for="productCuisine">Cuisine of Food:</label>
        <select id="productCuisine" name="productCuisine" required>
            <option value="">Select Cuisine</option>
            <option value="chinese">Chinese</option>
            <option value="japanese">Japanese</option>
            <option value="indian">Indian</option>
            <option value="srilankan">Sri Lankan</option>
        </select>
        <input type="file" name="image" />
        <br>
        <button type="submit" name="submit">Submit </button>
    </form>
</body>
</html>