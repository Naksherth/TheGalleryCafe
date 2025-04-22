<?php


@include '../Homepage/dbconn.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit;
}

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   $user_id = $_SESSION['user_id'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE uid = '$user_id'");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         $user_id = $_SESSION['user_id'];
         $select_cart = mysqli_query($conn, "SELECT c.id, c.quantity, c.type, p.Name as pname, p.Price as pprice, p.Image as pimage, b.Name as bname, b.Price as bprice, b.Image as bimage
                                             FROM `cart` c 
                                             LEFT JOIN `productdetails` p ON c.product_id = p.ID AND c.type = 'product'
                                             LEFT JOIN `beveragedetails` b ON c.product_id = b.ID AND c.type = 'beverage'
                                             WHERE c.uid = '$user_id'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $name = $fetch_cart['type'] == 'product' ? $fetch_cart['pname'] : $fetch_cart['bname'];
               $price = $fetch_cart['type'] == 'product' ? $fetch_cart['pprice'] : $fetch_cart['bprice'];
               $image = $fetch_cart['type'] == 'product' ? $fetch_cart['pimage'] : $fetch_cart['bimage'];
               $sub_total = $price * $fetch_cart['quantity'];
               $grand_total += $sub_total;
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $image; ?>" height="100" alt=""></td>
            <td><?php echo $name; ?></td>
            <td>$<?php echo number_format($price); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo number_format($sub_total); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
            }
         } else {
            echo '<tr><td colspan="6" class="empty">Your cart is empty!</td></tr>';
         }
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo number_format($grand_total); ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>
