<?php
session_start();
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Simple Responsive Webpage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="Login.js"></script>
</head>

<body class="home-body">

    <header>
        <div class="header-top">
            <img src="HomePage/simple-graphic-logo-color-bike-white-background_84176-13863-removebg-preview.png"
                alt="Logo" class="logo">
        </div>
        <nav>
            <ul class="header_section">
                <li class="header_class login-icon"><a href="login.php" class="header_link">Login</a></li>
                <li class="header_class header_registration"><a href="Registration.php"
                        class="header_link">Registration</a></li>
            </ul>
        </nav>
    </header>
    <main class="home-main" id="home-main">
        <div class="login-container">
            <div class="login-form-container">
                <form id="loginForm" action="LoginInsert.php" onsubmit="return loginValidationCheck()">
                    <input id="loginUser" name="loginUser" type="text" placeholder="Username">
                    <input id="loginPassword" name="loginPassword" type="password" placeholder="Password">
                    <button type="submit" class="btn" id="loginBtn">Login</button>
                </form>
            </div>
        </div>
    </main>
    <footer style="position: absolute;">
        <p>&copy; 2024 Devarsh & Aakarsh E-commerce Website. All rights reserved.</p>
    </footer>
</body>

</html>