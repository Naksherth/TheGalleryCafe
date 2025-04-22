<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "thegallerycafe"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT Image FROM productdetails WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Content-Type: image/png");
        echo $row['Image'];
    } else {
        header("Content-Type: image/png");
        echo file_get_contents("images/default.png");
    }
} else {
    header("Content-Type: image/png");
    echo file_get_contents("images/default.png");
}

$conn->close();
?>
