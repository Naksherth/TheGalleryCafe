<?php

@include '../Homepage/dbconn.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit;
}

if(isset($_GET['add_to_cart'])) {
    $product_id = $_GET['product_id'];
    $product_type = $_GET['product_type']; // 'product' or 'beverage'
    $user_id = $_SESSION['user_id'];
    $quantity = 1; // Default quantity is set to 1

    // Check if the product is already in the cart
    $check_cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_id = '$product_id' AND uid = '$user_id' AND type = '$product_type'");

    if(mysqli_num_rows($check_cart_query) > 0){
        // If product is already in the cart, update the quantity
        $fetch_cart = mysqli_fetch_assoc($check_cart_query);
        $new_quantity = $fetch_cart['quantity'] + $quantity;
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$new_quantity' WHERE product_id = '$product_id' AND uid = '$user_id' AND type = '$product_type'");
    } else {
        // If product is not in the cart, insert new record
        mysqli_query($conn, "INSERT INTO `cart`(uid, product_id, quantity, type) VALUES('$user_id', '$product_id', '$quantity', '$product_type')");
    }
    header('location:cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add to Cart</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <section class="products">
        <h1 class="heading">Our Products</h1>
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `productdetails`");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_product['Image']; ?>" alt="">
                <h3><?php echo $fetch_product['Name']; ?></h3>
                <div class="price">$<?php echo $fetch_product['Price']; ?>/-</div>
                <a href="addtocart.php?add_to_cart=1&product_id=<?php echo $fetch_product['ID']; ?>&product_type=product" class="cart">add to cart</a>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">No products available!</p>';
            }
            ?>
        </div>
    </section>

    <section class="beverages">
        <h1 class="heading">Our Beverages</h1>
        <div class="box-container">
            <?php
            $select_beverages = mysqli_query($conn, "SELECT * FROM `beveragedetails`");
            if(mysqli_num_rows($select_beverages) > 0){
                while($fetch_beverage = mysqli_fetch_assoc($select_beverages)){
            ?>
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_beverage['Image']; ?>" alt="">
                <h3><?php echo $fetch_beverage['Name']; ?></h3>
                <div class="price">$<?php echo $fetch_beverage['Price']; ?>/-</div>
                <a href="addtocart.php?add_to_cart=1&product_id=<?php echo $fetch_beverage['ID']; ?>&product_type=beverage" class="cart">add to cart</a>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">No beverages available!</p>';
            }
            ?>
        </div>
    </section>
</div>

</body>
</html>
