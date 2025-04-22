<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"> <!-- Corrected the Link tag to link -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Added FontAwesome -->
<style>/* footer */
    /* Footer Section Styling */
    .footer-section { 
      
      background: #ffffff;
      color: #424040;
      padding: 5px 100px 5px 100px;
      margin-top: 70px;
    }
    
    .footer-container {
      display: flex;
      justify-content: space-between;
      
    }
    
    .footer-column {
      text-align: left;
      flex: 1;
      padding:15px;
    }
    
    .footer-logo img {
      margin-left: 150px;
      align-items: center;
      max-width: 100px;
    }
    
    .footer-text p {
      margin: 14px 0;
      font-size: 14px;
      line-height: 24px;
    }
    
    .contact-info p {
      margin: 5px 0;
      font-size: 14px;
      line-height: 24px;
    }
    
    .contact-info i {
      margin-right: 10px;
      color:#ffae42;
    }
    
    .social-media {
      margin-bottom: 20px;
    }
    
    .social-media h3, .branch-info h3 {
      color: #ffae42;
      margin-bottom: 20px;
    }
    
    .social-media a {
      color: #ffae42;
      font-size: 20px;
      margin-right: 10px;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .social-media a:hover {
      color: #070707;
    }
    
    .branch-info ul {
      list-style: none;
      padding: 0;
    }
    
    .branch-info ul li {
      margin-bottom: 10px;
      font-size: 14px;
    }
    
    .footer-bottom {
      text-align: center;
      padding: 20px 0;
      background: #e7e6e6;
    }
    
    .footer-bottom p {
      margin: 0;
      font-size: 14px;
      color: #878787;
    }
    
    .footer-bottom p a {
      color: #ffae42;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .footer-bottom p a:hover {
      color: #ffae42;
    }
    .form{
    
    }
    .submitbtn{
      
        margin-top: 20px;
        padding: 7px 7px;
        font-size: 1.7rem;
        color: white;
        background-color:hsl(30, 2%, 24%);
        border: none;
        /* border-radius: 10px; */
        text-decoration:solid;
        opacity:-1;
        transform: translateY(50px);
        transition: opacity 1s, transform 1s;
        z-index: 2;
      
      
       
    }
    .submitbtn:hover {
      background:hsl(30, 50%, 40%);
      color: whitesmoke;
    }
    /* Responsive Footer */
    @media (max-width: 768px) {
      .footer-container {
          flex-direction: column;
          align-items: center;
      }
    
      .footer-column {
          padding: 20px;
      }
    
     
      }</style>
</head>
<body>
    <header>
        <?php include_once("../Homepage/navbar.php"); ?>
        </header>
        

    <div class="parallax-section">
        <h2>OUR STORY</h2>
        <h1>THE JOURNEY OF FLAVORS</h1>
        <p class="fly-in-text">The Gallery Cafe began with a simple vision: to create a place where culinary art meets the joy of sharing meals.<br> Our journey started with a passion for fresh, locally-sourced ingredients and a love for innovative cooking.<br> Today, we continue to bring unique and delightful experiences to our guests, celebrating the art of food in every dish we serve.</p>
        <a href="#" class="story-button">Discover More</a>
    </div>
<br>
<br>
    <div class="about-section">
        <div class="about-image">
            <img src="../Homepage/images/2-removebg-preview.png" alt="About Image"> <!-- Replace with the correct image path -->
        </div>
        <div class="about-text">
            <h2>About us</h2>
            <p>At The Gallery Cafe, we believe that food is an art form. Nestled in the heart of the city, our restaurant is more than just a place to eat; it’s a place where culinary creativity and artistic expression come together. Our mission is to offer a dining experience that delights all your senses.</p>
          
            <a href="../productmenupage/index.php">Go to Product Menu Page</a>
        </div>
    </div>
    <br>
    <br>
   
    <div class="footer-section">
        <div class="footer-container">
            <div class="footer-column">
                <div class="footer-text">
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> 1010 Avenue, SW 54321, Chandigarh</p>
                        <p><i class="fas fa-phone"></i> 9876543210</p>
                        <p><i class="far fa-envelope-open"></i> mail@info.com</p>
                    </div>
                </div>
                <h3>Stay connected</h3>
                <form id="subscribe">
                    <input type="email" id="subscriber-email" placeholder="Enter Email Address" required />
                    <input type="submit" value="Subscribe" id="btn-scribe" />
                </form>
                <div class="branch-info">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024, All Rights Reserved <a href="#">The Gallery Cafe</a></p>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <script>
        window.addEventListener('scroll', function() {
            var flyInText = document.querySelector('.fly-in-text');
            var storyButton = document.querySelector('.story-button');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 200) {
                flyInText.classList.add('visible');
                storyButton.classList.add('visible');
            }
        });
    </script>

    <script>
        const authBtn = document.getElementById('signin-btn');
        const popup = document.getElementById('popup');
        const closePopup = document.getElementById('close-popup');
        const closePopupSignup = document.getElementById('close-popup-signup');
        const showSignup = document.getElementById('show-signup');
        const showLogin = document.getElementById('show-login');
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');

        authBtn.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
            popup.style.display = 'flex';
        });

        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
        });

        closePopupSignup.addEventListener('click', () => {
            popup.style.display = 'none';
        });

        showSignup.addEventListener('click', () => {
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
        });

        showLogin.addEventListener('click', () => {
            signupForm.style.display = 'none';
            loginForm.style.display = 'block';
        });
    </script>
</body>
</html>
