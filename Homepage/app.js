const carousel = document.querySelector(".carousel");
const slides = document.querySelectorAll(".slide");
const controlLinks = document.querySelectorAll(".controls a");

let i = 0,
  j = 1,
  intervalId;

const intervalFn = () => {
  intervalId = setInterval(() => {
    carousel.style.rotate = `-${++i * 90}deg`;

    document.querySelector(".slide.active").classList.remove("active");
    const activeSlide = document.querySelector(`.slide:nth-child(${++j})`);
    activeSlide.classList.add("active");

    document.querySelector("a.active").classList.remove("active");
    const activeLink = document.querySelector(`.controls a:nth-child(${j})`);
    activeLink.classList.add("active");

    j === 4 && (j = 0);
  }, 4000);
};

intervalFn();

controlLinks.forEach((control) => {
  control.addEventListener("click", () => {
    clearInterval(intervalId);
    carousel.style.rotate = `-${
      (i - j + Number(control.dataset.index)) * 90
    }deg`;

    document.querySelector(".slide.active").classList.remove("active");
    const activeSlide = document.querySelector(
      `.slide:nth-child(${control.dataset.index})`
    );
    activeSlide.classList.add("active");

    document.querySelector("a.active").classList.remove("active");
    control.classList.add("active");
  });
});

carousel.addEventListener("mouseenter", () => {
  clearInterval(intervalId);
  console.log("Pause");
});

carousel.addEventListener("mouseleave", () => {
  intervalFn();
  console.log("Play");
});


window.addEventListener('scroll', function() {
  const subHeading = document.querySelector('.sub-heading');
  const rect = subHeading.getBoundingClientRect();
  const windowHeight = window.innerHeight || document.documentElement.clientHeight;

  if (rect.top <= windowHeight && rect.bottom >= 0) {
      subHeading.classList.add('fly-in');
  } else {
      subHeading.classList.remove('fly-in');
  }
});

// /top  cusines
document.addEventListener('DOMContentLoaded', function() {
  const flyInText = document.querySelector('.fly-in-text');
  const indiaButton = document.querySelector('.indiabutton');

  // Add the 'visible' class when the page loads
  flyInText.classList.add('visible');
  indiaButton.classList.add('visible');
});



// //popup
// document.addEventListener('DOMContentLoaded', () => {
//   const signinBtn = document.querySelector('.auth-btn');
//   const popup = document.getElementById('popup');
//   const closeBtn = document.getElementById('close-btn');

//   signinBtn.addEventListener('click', (event) => {
//       event.preventDefault();
//       popup.style.display = 'flex';
//   });

//   closeBtn.addEventListener('click', () => {
//       popup.style.display = 'none';
//   });

//   window.addEventListener('click', (event) => {
//       if (event.target === popup) {
//           popup.style.display = 'none';
//       }
//   });
// });
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




// //hellow
// let cart = [];

// document.querySelectorAll('.add-to-cart-btn').forEach(button => {
//     button.addEventListener('click', () => {
//         const productId = button.dataset.productId;
//         const productName = button.dataset.productName;
//         const productPrice = button.dataset.productPrice;
//         const productImage = button.dataset.productImage;

//         const product = {
//             id: productId,
//             name: productName,
//             price: productPrice,
//             image: productImage,
//             quantity: 1
//         };

//         const existingProductIndex = cart.findIndex(item => item.id === productId);

//         if (existingProductIndex >= 0) {
//             cart[existingProductIndex].quantity++;
//         } else {
//             cart.push(product);
//         }

//         renderCart();
//     });
// });

// function renderCart() {
//     const cartList = document.querySelector('.listCard');
//     const cartQuantity = document.querySelector('.quantity');
//     const cartTotal = document.querySelector('.total');

//     cartList.innerHTML = '';
//     let totalQuantity = 0;
//     let totalPrice = 0;

//     cart.forEach(product => {
//         const li = document.createElement('li');

//         li.innerHTML = `
//             <img src="${product.image}" alt="${product.name}">
//             <div class="item-info">
//                 <div class="name">${product.name}</div>
//                 <div class="price">$${product.price}</div>
//             </div>
//             <div class="quantity">
//                 <button class="decrease" data-product-id="${product.id}">-</button>
//                 <span>${product.quantity}</span>
//                 <button class="increase" data-product-id="${product.id}">+</button>
//             </div>
//         `;

//         li.querySelector('.decrease').addEventListener('click', () => {
//             const productIndex = cart.findIndex(item => item.id === product.id);

//             if (cart[productIndex].quantity > 1) {
//                 cart[productIndex].quantity--;
//             } else {
//                 cart.splice(productIndex, 1);
//             }

//             renderCart();
//         });

//         li.querySelector('.increase').addEventListener('click', () => {
//             const productIndex = cart.findIndex(item => item.id === product.id);

//             cart[productIndex].quantity++;

//             renderCart();
//         });

//         cartList.appendChild(li);

//         totalQuantity += product.quantity;
//         totalPrice += product.price * product.quantity;
//     });

//     cartQuantity.textContent = totalQuantity;
//     cartTotal.textContent = `$${totalPrice.toFixed(2)}`;
// }

// document.querySelector('.shopping').addEventListener('click', () => {
//     document.querySelector('.card').classList.add('active');
// });

// document.querySelector('.closeShopping').addEventListener('click', () => {
//     document.querySelector('.card').classList.remove('active');
// });


