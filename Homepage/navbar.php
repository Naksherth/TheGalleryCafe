<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="app.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Circle Slider</title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navbar-section auth-buttons">
            <?php if (isset($_SESSION['USER_NAME'])): ?>
                <a href="#" id="account-btn" class="auth-btn"><i class="fas fa-user"></i> <?php echo $_SESSION['USER_NAME']; ?></a>
                <a href="#" id="logout-btn" class="auth-btn" style="display: none;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <a href="#" id="signin-btn" class="auth-btn"><i class="fas fa-user"></i> Sign In</a>
            <?php endif; ?>
            <a href="#" class="auth-btn"><i class="fas fa-shopping-cart"></i></a>
        </div>
        <div class="navbar-section nav-links">
            <a href="../Homepage/index.php" class="btn">Home</a>
            <a href="../productmenupage/Menu.php" class="btn">Food Menus</a>
            <a href="../Beverages/index.php" class="btn">Beverages</a>
            <div class="logo">
                <img src="images/2-removebg-preview.png" alt="Bindi Logo">
            </div>
            <a href="#" class="btn">Special events</a>
            <a href="#" class="btn">Promotions</a>
            <a href="../Aboutpage/Index.php" class="btn">About us</a>
            <div class="search-container">
                <input type="text" placeholder="Discover Flavorful Delights">
                <a href="#"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </nav>
</header>

<div class="login-signup-popup" id="popup" style="display: none;">
    <div class="form-container" id="login-form" style="display: <?php echo isset($_SESSION['USER_NAME']) ? 'none' : 'block'; ?>">
        <i class="fas fa-times" id="close-popup"></i>
        <form action="loginverify.php" method="POST">
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="login" class="btn">Login</button>
            <p>Don't have an account? <span class="toggle-link" id="show-signup">Sign Up</span></p>
        </form>
    </div>
    <div class="form-container" id="signup-form" style="display: none;">
        <i class="fas fa-times" id="close-popup-signup"></i>
        <form action="loginverify.php" method="POST">
            <h2>Sign Up</h2>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="signup" class="btn">Sign Up</button>
            <p>Already have an account? <span class="toggle-link" id="show-login">Login</span></p>
        </form>
    </div>
    <div class="form-container" id="user-details" style="display: <?php echo isset($_SESSION['USER_NAME']) ? 'block' : 'none'; ?>">
        <i class="fas fa-times" id="close-popup-user"></i>
        <h2>User Details</h2>
        <p>Username: <?php echo $_SESSION['USER_NAME']; ?></p>
        <p>Email: <?php echo $_SESSION['USER_EMAIL']; ?></p>
        <a href="#" id="logout-link" class="btn">Logout</a>
    </div>
</div>

</body>
</html>