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
            <a href="#" class="btn">Home</a>
            <a href="../productmenupage/Menu.php" class="btn">Food Menus</a>
            <a href="../Beverages/index.html" class="btn">Beverages</a>
            <div class="logo">
                <img src="images/2-removebg-preview.png" alt="Bindi Logo">
            </div>
            <a href="#" class="btn">Special events</a>
            <a href="#" class="btn">Promotions</a>
            <a href="../Aboutpage/Index.html" class="btn">About us</a>
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

<?php if (isset($_SESSION['SUCCESS_MSG'])): ?>
    <div id="success-msg" class="alert"><?php echo $_SESSION['SUCCESS_MSG']; unset($_SESSION['SUCCESS_MSG']); ?></div>
<?php endif; ?>
<?php if (isset($_SESSION['ERROR_MSG'])): ?>
    <div id="error-msg" class="alert"><?php echo $_SESSION['ERROR_MSG']; unset($_SESSION['ERROR_MSG']); ?></div>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const authBtn = document.getElementById('signin-btn');
    const accountBtn = document.getElementById('account-btn');
    const logoutBtn = document.getElementById('logout-btn');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('close-popup');
    const closePopupSignup = document.getElementById('close-popup-signup');
    const closePopupUser = document.getElementById('close-popup-user');
    const showSignup = document.getElementById('show-signup');
    const showLogin = document.getElementById('show-login');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const userDetails = document.getElementById('user-details');
    const logoutLink = document.getElementById('logout-link');
    const successMsg = document.getElementById('success-msg');
    const errorMsg = document.getElementById('error-msg');

    if (successMsg) {
        setTimeout(() => {
            successMsg.style.display = 'none';
        }, 3000);
    }

    if (errorMsg) {
        setTimeout(() => {
            errorMsg.style.display = 'none';
        }, 3000);
    }

    if (authBtn) {
        authBtn.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
            popup.style.display = 'flex';
        });
    }

    if (accountBtn) {
        accountBtn.addEventListener('click', (e) => {
            e.preventDefault();
            userDetails.style.display = 'block';
            popup.style.display = 'flex';
        });
    }

    if (logoutLink) {
        logoutLink.addEventListener('click', (e) => {
            e.preventDefault();
            fetch('logout.php')
                .then(response => response.text())
                .then(data => {
                    if (data === 'logout_success') {
                        window.location.reload();
                    }
                });
        });
    }

    closePopup.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    closePopupSignup.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    closePopupUser.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    showSignup.addEventListener('click', () => {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
    });

    showLogin.addEventListener('click', () => {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    });
});
</script>



    <div class="slideshow">
      <div class="carousel">
        <div class="slide active">
          <img src="images/image1.png" />
        </div>
        <div class="slide">
          <img src="images/image2.png" />
        </div>
        <div class="slide">
          <img src="images/image3.png" />
        </div>
        <div class="slide">
          <img src="images/chickenbites.png" />
        </div>
        
        
      </div>
      <div class="controls">
        <a href="#" data-index="1" class="active">
          <img src="images/image1.png" />
        </a>
        <a href="#" data-index="2">
          <img src="images/image2.png" />
        </a>
        <a href="#" data-index="3">
          <img src="images/image3.png" />
        </a>
        <a href="#" data-index="4">
          <img src="images/chickenbites.png" />
        </a>
        
      </div>
    </div>
    <div class="section">
      <div class="feature-container">
          <div class="feature-box">
              <i class="fas fa-truck"></i>
              <div class="feature-text">
                  <h4> Fast Delivery</h4>
                  <p>Free delivery on orders over $100</p>
              </div>
          </div>
          <div class="feature-box">
              <i class="fas fa-lock"></i>
              <div class="feature-text">
                  <h4> Secure Transactions</h4>
                  <p>Safe and reliable payment options</p>
              </div>
          </div>
          <div class="feature-box">
              <i class="fas fa-tag"></i>
              <div class="feature-text">
                  <h4> Bulk Discounts</h4>
                  <p>Special prices on selected items</p>
              </div>
          </div>
          <div class="feature-box">
              <i class="fas fa-phone"></i>
              <div class="feature-text">
                  <h4>24/7 Support</h4>
                  <p>Reach out to us anytime</p>
              </div>
          </div>
      </div>
  </div>
  
    
 

 
  <section class="top-cuisines">
    <h1>Our Top Culinary Delights</h1>
    <div class="cuisine-slider">
      <!-- <button class="slider-btn prev-btn" onclick="document.querySelector('.cuisines-container').style.animationPlayState = 'paused';">&#10094;</button>-->
      <div class="cuisines-container"> 
        <div class="cuisine-box">
          <img src="images/japan1.jpeg">
          <div class="cuisine-info">
            <h3>Authentic Japanese Cuisine</h3>
            <p>Pure and delicate</p>
          </div>
        </div>
        <div class="cuisine-box">
          <img src="images/italian1.jpeg" alt="Italian Delights">
          <div class="cuisine-info">
            <h3>Exquisite Italian Delights</h3>
            <p>Fresh and creamy</p>
          </div>
        </div>
        <div class="cuisine-box">
          <img src="images/indian.jpeg" alt="Indian Spices">
          <div class="cuisine-info">
            <h3>Flavors of Indian Spices</h3>
            <p>Bold and aromatic</p>
          </div>
        </div>
        <div class="cuisine-box">
          <img src="images/Crispy Air Fryer Chicken Bites (+25 Air Fryer Chicken Recipes).jpeg" alt="Chinese Delights">
          <div class="cuisine-info">
            <h3>Savory Chinese Delights</h3>
            <p>Rich and flavorful</p>
          </div>
        </div>
        <div class="cuisine-box">
          <img src="images/2.jpeg" alt="French Cuisine">
          <div class="cuisine-info">
            <h3>Elegant French Cuisine</h3>
            <p>Refined and sophisticated</p>
          </div>
        </div>
    </div>
  </section>

</div>

<div class="parallax-section">
  <h2>OUR OPERATION</h2>
  <h1>DEDICATED STAFF</h1>
  <p class="fly-in-text">In the heart of our bustling restaurant, a symphony of flavors unfolds.<br> Meet our dedicated staff—the unsung heroes behind every delectable dish. They don’t just cook; they compose.<br> Their canvas? Fresh, locally sourced ingredients that whisper secrets of sun-kissed fields and vibrant markets.</p>
  <a href="#" class="indiabutton">Our Menu</a>
</div>

<section class="latest-inventions">
  <h1>Indulge your senses today with our highest-rated culinary creations! 🍽️</h1>
  <div class="inventions-slider">
    <div class="inventions-container">
        <div class="invention-box">
            <img src="images/3.jpeg">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🍣 Sushi and Sashimi</h3>
                <p>Pure and delicate flavors of fresh fish, rice, and seaweed. A harmonious blend of simplicity and precision.</p>
            </div>
        </div>
        <div class="invention-box">
            <img src="images/crossinet.jpeg" alt="Italian Delights">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🥐 Croissants</h3>
                <p>Buttery, flaky layers that melt in your mouth. Perfect for breakfast or an afternoon treat.</p>
            </div>
        </div>
        <div class="invention-box">
            <img src="images/download (1).jpeg" alt="Indian Spices">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🌶️ Masala Dosa</h3>
                <p>A crispy South Indian crepe filled with spiced potato. Bursting with aromatic spices and served with chutney.</p>
            </div>
        </div>
        <div class="invention-box">
            <img src="images/burger1.jpeg" alt="Chinese Delights">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🍲 Dim Sum</h3>
                <p>Steamed dumplings, buns, and rolls filled with savory meats or vegetables. A delightful taste of China.</p>
            </div>
        </div>
        <div class="invention-box">
            <img src="images/Devour Burgers.jpeg">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🥘 Coq au Vin</h3>
                <p>Slow-cooked chicken in red wine, mushrooms, and herbs. A refined French classic with depth and sophistication.</p>
            </div>
        </div>
        <div class="invention-box">
            <img src="images/Chicken Bacon Alfredo [50 Minutes].jpeg">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🍝 Fettuccine Alfredo</h3>
                <p>Creamy pasta with grilled chicken, crispy bacon, and Parmesan cheese. A comforting Italian favorite.</p>
            </div>
        </div>
        <div class="invention-box">
            <img src="images/DESAYUNO.jpeg">
            <div class="invention-info">
                <button class="try-now-btn">Try Now</button>
                <h3>🥐 Za'atar Croissant</h3>
                <p>Flaky croissant infused with Middle Eastern za'atar spice blend. A unique twist on a beloved pastry.</p>
            </div>
        </div>
    </div>
</div>

</section>

<div class="advbooking">
  <div class="sweets">
      <div class="imgsweet">
    <img src="/images/donut.png" alt=""></div>
   <span class="shadow"></span> 
</div>

<p style="font-size: 30px;color: rgb(143, 144, 144);margin-left: 5%;"><b>Abs are cool.</b> </p>
 <br> <span class="sweet-donuts">But have you ever tried <br>our donuts?</span>.<br>
 <p style="margin: 20px 5%; font-size: 20px;color: rgb(109, 109, 109);">We make our original Glazed Doughnut the way<br> we always have.Because its the right way.</p>
 <button class="eat-now-button">DONUT STORE<span class="now-icon"></span></button>
 

</div>

<footer class="footer-section">
  <div class="footer-container">
      <div class="footer-column">
          <div class="footer-logo">
             <img src="images/2-removebg-preview.png" alt="">  </div>
          <div class="footer-text">
              <p>Explore our enticing world of foods and join us on a culinary journey. From spicy sensations to sweet symphonies, discover the magic within our restaurant.</p>
          </div>
          <div class="social-media"><br>
            <br><br>
              <h3>Connect with Us</h3>
              <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
              <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
              <a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
              <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
          </div>
      </div>
      <!-- <div class="footer-column" style="align-items: center;">
          <br><br>
          <div class="branch-info">
              <h3>Our Branches</h3>
              <ul>
                  <li>Colombo</li>
                  <li>Kandy</li>
                  <li>Jaffnao</li>
                  
              </ul>
          </div>
      </div> -->
      <div class="footer-column">
        <div class="footer-text"> <br>
          <br>
          <br>
          <div class="contact-info">
            <p><i class="fas fa-map-marker-alt"></i> 1010 Avenue, SW 54321, Chandigarh</p>
            <p><i class="fas fa-phone"></i> 9876543210</p>
            <p><i class="far fa-envelope-open"></i> mail@info.com</p>
        </div><br><br>
         <h3>Stay connected</h3><br>
          <form id="subscribe">
              <input type="email" id="subscriber-email" placeholder="Enter Email Address"/><br><br>
              <input type="submit" value="Subscribe" id="btn-scribe"/>
            </form> <div class="branch-info">
             <br><br><br><br>
              ABOUT US   |   MENU   |   CONTACT
                  
           </div>
  </div>
  </div>
  </div>
  
</footer>
<div class="footer-bottom">
  <p>&copy; 2024, All Rights Reserved <a href="#">The Gallery Cafe</a></p>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
