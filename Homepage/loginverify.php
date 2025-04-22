<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thegallerycafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM logindetails WHERE Username='$email' AND Password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['USER_ID'] = $row['id'];
            $_SESSION['USER_NAME'] = $row['Username'];
            $_SESSION['USER_EMAIL'] = $row['Email'];
            $_SESSION['SUCCESS_MSG'] = "Login successful!";
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['ERROR_MSG'] = "Invalid username or password.";
            header('Location: index.php');
            exit();
        }
    }

    if (isset($_POST['signup'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "INSERT INTO logindetails (Username, Email, Password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['USER_ID'] = $conn->insert_id;
            $_SESSION['USER_NAME'] = $username;
            $_SESSION['USER_EMAIL'] = $email;
            $_SESSION['SUCCESS_MSG'] = "Sign up successful! You are now logged in.";
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['ERROR_MSG'] = "Error: " . $sql . "<br>" . $conn->error;
            header('Location: index.php');
            exit();
        }
    }
}

$conn->close();
?>
