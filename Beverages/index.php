<?php include_once("../Homepage/navbar.php"); ?>

<?php
// Database connection
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

$sql = "SELECT ID, Name, Price, Image, Type, Details FROM bevereagedetails";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Custom JS file link -->
    <script src="script.js" defer></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    transition: all .2s linear;
    text-transform: capitalize;
}

html {
    font-size: 62.5%;
    overflow-x: hidden;
}

body {
    background: #eee;
}

.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    margin-bottom: 0;
}

.navbar .logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar .logo img {
    height: 100px;
}

.navbar-section {
    display: flex;
    align-items: center;
}

.nav-links {
    display: flex;
    align-items: center;
}

.nav-links .btn {
    color: rgb(14, 14, 14);
    background: rgba(246, 246, 246, 0.5);
    padding: 14px 17px;
    font-size: 12px;
    text-decoration: none;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin: 0 10px;
    border: none;
}

.nav-links .btn:hover {
    background: #aaa8a5;
    color: whitesmoke;
}

.search-container {
    display: flex;
    align-items: center;
    margin-left: 10px;
}

.search-container input {
    width: 0px;
    padding: 2px;
    font-family: 'Times New Roman';
    font-size: 15px;
    border: none;
    border-bottom: 2px solid #aaa8a5;
    outline: none;
    transition: width 0.3s ease;
}

.search-container input:focus {
    width: 200px;
}

.search-container .fas {
    color: #aaa8a5;
    font-size: 18px;
    margin-left: 5px;
}

.auth-buttons {
    position: absolute;
    top: 10px;
    right: 20px;
}

.auth-buttons .auth-btn {
    color: rgb(14, 14, 14);
    background: rgba(254, 254, 254, 0.727);
    padding: 12px 15px;
    font-size: 10px;
    text-decoration: none;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-left: 10px;
    border-radius: 100px;
    border: solid black;
}

.auth-buttons .auth-btn:hover {
    background: #aaa8a5;
    color: whitesmoke;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 3rem 2rem;
}

.container .title {
    font-size: 3rem;
    color: #444;
    margin-bottom: 3rem;
    text-transform: uppercase;
    text-align: center;
}

.container .products-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
    gap: 2rem;
}

.container .products-container .product {
    text-align: center;
    padding: 2rem;
    background: #fff;
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
    outline: .1rem solid #ccc;
    outline-offset: -1.5rem;
    cursor: pointer;
}

.container .products-container .product:hover {
    outline: .2rem solid #222;
    outline-offset: 0;
}

.container .products-container .product img {
    height: 20rem;
}

.container .products-container .product:hover img {
    transform: scale(.9);
}

.container .products-container .product h3 {
    padding: .5rem 0;
    font-size: 2rem;
    color: #444;
}

.container .products-container .product:hover h3 {
    color: #27ae60;
}

.container .products-container .product .price {
    font-size: 2rem;
    color: #444;
}

.products-preview {
    position: fixed;
    top: 0;
    left: 0;
    min-height: 100px;
    width: 100%;
    background: rgba(0, 0, 0, .8);
    display: none;
    align-items: center;
    justify-content: center;
}

.products-preview .preview {
    display: none;
    padding: 2rem;
    text-align: center;
    background: #fff;
    position: relative;
    margin: 2rem;
    width: 40rem;
}

.products-preview .preview.active {
    display: inline-block;
}

.products-preview .preview img {
    height: 30rem;
}

.products-preview .preview .fa-times {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    cursor: pointer;
    color: #444;
    font-size: 4rem;
}

.products-preview .preview .fa-times:hover {
    transform: rotate(90deg);
}

.products-preview .preview h3 {
    color: #444;
    padding: .5rem 0;
    font-size: 2.5rem;
}

.products-preview .preview .stars {
    padding: 1rem 0;
    font-size: 1.7rem;
}

.products-preview .preview .stars i {
    color: #27ae60;
}

.products-preview .preview .stars span {
    color: #999;
}

.products-preview .preview p {
    line-height: 1.5;
    font-size: 15px;
    padding: 1rem 0;
    color: #777;
}

.products-preview .preview .price {
    padding: 1rem 0;
    font-size: 2.5rem;
    color: #27ae60;
}

.products-preview .preview .buttons {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
    margin-top: 1rem;
}

.products-preview .preview .buttons a {
    flex: 1 1 16rem;
    padding: 1rem;
    font-size: 1.8rem;
    color: #444;
    border: .1rem solid #444;
}

.products-preview .preview .buttons a.cart {
    background: #444;
    color: #fff;
}

.products-preview .preview .buttons a.cart:hover {
    background: #111;
}

.products-preview .preview .buttons a.buy:hover {
    background: #444;
    color: #fff;
}

@media (max-width: 991px) {
    html {
        font-size: 55%;
    }
}

@media (max-width: 768px) {
    .products-preview .preview img {
        height: 15rem;
    }
}

@media (max-width: 450px) {
    html {
        font-size: 50%;
    }
}
</style>

</head>
<body>
<header>
<?php include_once("../Homepage/navbar.php"); ?>
</header>

<div class="container">

    <div class="products-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="product" data-name="b-' . $row['ID'] . '">
                    <img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" alt="Beverage Image">
                    <h3>' . htmlspecialchars($row['Name']) . '</h3>
                    <div class="price">$' . htmlspecialchars($row['Price']) . '</div>
                </div>
                ';
            }
        } else {
            echo "No beverages found.";
        }
        $conn->close();
        ?>
    </div>
</div>

<div class="products-preview">
    <div class="preview">
        <i class="fa fa-times"></i>
        <img src="" alt="Beverage Image">
        <h3></h3>
        <div class="stars"></div>
        <p></p>
        <div class="price"></div>
        <div class="buttons">
            <a href="#" class="cart">Add to Cart</a>
            <a href="#" class="buy">Buy Now</a>
        </div>
    </div>
</div>

</body>
</html>
