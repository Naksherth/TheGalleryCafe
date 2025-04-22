
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>
<body>
     <!-- Navigation panel -->
   <nav>
    <div class="box">
    <a href="#" class="btn">Home</a>
    <a href="menu.html" class="btn">Food Menus</a>
    <a href="productdetails.html" class="btn">Find us</a>
    <a href="#" class="btn">Order online</a>
    
      <input type="text" placeholder=" ">
      <a href="#"><i class="fas fa-search"></i></a>
        <!-- <a href="#" class="auth-btn"><i class="fas fa-user"></i> Create Account</a>
         <a href="#" class="auth-btn"><i class="fas fa-sign-in-alt"></i> Log In</a> -->
   
    
                <!-- <div class="filterSearch" style="align-items: center;margin-left: 420px;">
                    <label for="category-filter">Filter by Type:</label> -->
                   
                
    <!-- </div> -->
</nav>
<div>
<label for="topic-filter">Filter by Cusine:</label>
<select class="browser-default video-filter" id="topic-filter" data-filter-group="topic">
    <option value="" disabled selected>Choose option</option>
    <option value=".movie">Indian</option>
    <option value=".book">Chinese</option>
</select>
</div>

<div class="categories-container">
    <?php
    include("dbconnection.php");
    if (mysqli_num_rows($result) > 0) {
       
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="category-box">';
            echo '<img src="' . $row['Image'] . '" alt="' . $row['Name'] . '">';
            echo '<div class="category-info">';
            echo '<h3>' . $row['Name'] . '</h3>';
            echo '<p>' . $row['Details'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No products found in db.';
    }

   
    mysqli_close($conn);
    ?>
</body>
</html>