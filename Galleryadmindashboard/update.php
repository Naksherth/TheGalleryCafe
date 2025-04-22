<?php
include("updateconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="number"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Please check the product details to get the correct product ID to update the product details!</h2>
        
        <!-- Step 1: Retrieve Product Details -->
        <form method="POST">
            <div class="form-group">
                <label for="productID">Enter Product ID:</label>
                <input type="number" id="productID" name="productID" required>
            </div>
            <button type="submit" name="retrieve">Retrieve Details</button>
        </form>

        <!-- Step 2: Update Product Details -->
        <h2>Update Product Details</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" id="productID" name="productID" value="<?php echo isset($productID) ? $productID : ''; ?>">
            
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" value="<?php echo $productName; ?>" required>
            </div>

            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="number" id="productPrice" name="productPrice" value="<?php echo $productPrice; ?>" min="0" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="productDetails">Detail:</label>
                <input type="text" id="productDetails" name="productDetails" value="<?php echo $productDetails; ?>">
            </div>

            <div class="form-group">
                <label for="productType">Type of Food:</label>
                <select id="productType" name="productType" required>
                    <option value="" <?php echo empty($productType) ? 'selected' : ''; ?>>Select Type</option>
                    <option value="breakfast" <?php echo $productType == 'breakfast' ? 'selected' : ''; ?>>Breakfast</option>
                    <option value="lunch" <?php echo $productType == 'lunch' ? 'selected' : ''; ?>>Lunch</option>
                    <option value="dinner" <?php echo $productType == 'dinner' ? 'selected' : ''; ?>>Dinner</option>
                    <option value="delight" <?php echo $productType == 'delight' ? 'selected' : ''; ?>>Delight</option>
                    <option value="coffee" <?php echo $productType == 'coffee' ? 'selected' : ''; ?>>Coffee</option>
                </select>
            </div>

            <div class="form-group">
                <label for="productCuisine">Cuisine of Food:</label>
                <select id="productCuisine" name="productCuisine" required>
                    <option value="" <?php echo empty($productCuisine) ? 'selected' : ''; ?>>Select Cuisine</option>
                    <option value="chinese" <?php echo $productCuisine == 'chinese' ? 'selected' : ''; ?>>Chinese</option>
                    <option value="japanese" <?php echo $productCuisine == 'japanese' ? 'selected' : ''; ?>>Japanese</option>
                    <option value="indian" <?php echo $productCuisine == 'indian' ? 'selected' : ''; ?>>Indian</option>
                    <option value="srilankan" <?php echo $productCuisine == 'srilankan' ? 'selected' : ''; ?>>Sri Lankan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" id="productImage" name="image">
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>