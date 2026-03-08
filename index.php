<?php
  function sessionInit() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
  }
  sessionInit();

  $cart = $_SESSION['cart'] ?? [];
  $cartCount = count($cart);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple Responsive Webpage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="Home.css">
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link rel="stylesheet" type="text/css" href="Registration.css">
    <link rel="stylesheet" type="text/css" href="Product.css">
    <link rel="stylesheet" type="text/css" href="Cart.css">
    <link rel="stylesheet" type="text/css" href="OrderSummary.css">
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js"></script>
    <script src="Registration.js"></script>
    <script src="Cart.js"></script>
    <script src="Login.js"></script>
    <script src="Product.js"></script>
    <script src="OrderSummary.js"></script>
</head>

<body class="home-body">

    <header>
        <div class="header-top">
            <img src="HomePage/simple-graphic-logo-color-bike-white-background_84176-13863-removebg-preview.png"
                alt="Logo" class="logo">
        </div>
        <nav>
            <ul class="header_section">
                <li class="header_class header_home"><a class="header_link">Home</a></li>
                <li class="header_class header_admin"><a class="header_link">Admin</a></li>
            </ul>
        </nav>
        <div class="header-top">
            <ul class="header-icons">
                <li>
                    <div class="cart-icon">Cart <span class="cart-count"><?php echo $cartCount; ?></span>
                </li>
                <li>
                    <div class="Logout-icon" onclick="location.href='Login.php'">Logout
                </li>
            </ul>
        </div>
    </header>
    <main class="home-main" id="home-main">

    </main>
    <footer>
        <div class="parent-footer-menu">
            <nav>
                <ul class="footer-menu">
                    <li class="header_class footer_home"><a class="header_link">Home</a></li>
                    <li class="header_class footer_admin"><a class="header_link">Admin</a></li>
                    <li class="header_class footer-cart-icon"><a class="header_link">Cart</a></li>
                </ul>
            </nav>
            <p>&copy; 2024 Devarsh & Aakarsh E-commerce Website. All rights reserved.</p>
            <div class="footer-icon-menu">
                <img src="HomePage/devicon--linkedin.png" alt="Logo" class="footer-icon"
                    onclick="location.href='https://www.linkedin.com/in/devarsh-patel-d09062001/'">
                <img src="HomePage/logos--facebook.png" alt="Logo" class="footer-icon"
                    onclick="location.href='https://www.facebook.com'">
            </div>
        </div>
    </footer>
</body>

</html>