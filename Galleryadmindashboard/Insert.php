<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2>Enter Product Details Here</h2>
        <form method="POST" action="insertdata.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Name">Product Name:</label>
                <input type="text" id="Name" name="Name" required>
            </div>
            <div class="form-group">
                <label for="Price">Price:</label>
                <input type="number" id="Price" name="Price" min="0" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="Details">Detail:</label>
                <input type="text" id="Details" name="Details">
            </div>
            <div class="form-group">
                <label for="Type">Type of Food:</label>
                <select id="Type" name="Type" required>
                    <option value="">Select Type</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                    <option value="delight">Delight</option>
                    <option value="coffee">Coffee</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Cusine">Cuisine of Food:</label>
                <select id="Cusine" name="Cusine" required>
                    <option value="">Select Cuisine</option>
                    <option value="chinese">Chinese</option>
                    <option value="japanese">Japanese</option>
                    <option value="indian">Indian</option>
                    <option value="srilankan">Sri Lankan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Image">Product Image:</label>
                <input type="file" id="Image" name="image" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
