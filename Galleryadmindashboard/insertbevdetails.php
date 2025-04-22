<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thegallerycafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $details = $_POST['Details'];
    $type = $_POST['Type'];
    $price = $_POST['Price'];
    $image = $_FILES['image']['tmp_name'];
    $imageData = addslashes(file_get_contents($image));

    $sql = "INSERT INTO bevereagedetails (Name, Details, Type, Price, Image) 
            VALUES ('$name', '$details', '$type', '$price', '$imageData')";

    if ($conn->query($sql) === TRUE) {
        header("Location: insertbevdetails.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
