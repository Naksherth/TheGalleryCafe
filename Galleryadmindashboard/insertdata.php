// insertdata.php
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
    // else{echo"connected";}
} catch (Exception $e) {
    echo "Message: " . $e->getMessage();
}
if (isset($_POST['submit'])) {
    $productName = $_POST['Name'];
    $productPrice = $_POST['Price'];
    $productDetails = $_POST['Details'];
    $productType = $_POST['Type'];
    $productCuisine = $_POST['Cusine'];
    $image = $_FILES['image']['tmp_name'];
    $imageData = addslashes(file_get_contents($image));

    $sql = "INSERT INTO productdetails (Name, Details, Price, Type, Cusine, Image)
            VALUES ('$productName', '$productDetails', '$productPrice', '$productType', '$productCuisine', '$imageData')";

    if ($conn->query($sql) === TRUE) {
        header("Location: insert.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
