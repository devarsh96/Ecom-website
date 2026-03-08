<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "bicycle_db";

    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }     

    $stmt = $conn->prepare("INSERT INTO users (username, password1, phone_number, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_GET['regUsername'], $_GET['regPassword'], $_GET['regPhone'], $_GET['regEmail']);

    $stmt->execute();
    $lastId = $conn->insert_id;

    // if ($lastId > 0) {
    //     header("Location: http://localhost/Ecom/Login.php");
    //     exit();
    // } else {
    //     echo "failure to register";
    // }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Simple Responsive Webpage</title>
 <link rel="stylesheet" type="text/css" href="Registration.css">
 <link rel="stylesheet" type="text/css" href="index.css">
 <script src="Registration.js"></script>
</head>
<body class="home-body">

<header>
  <div class="header-top">
    <img src="HomePage/simple-graphic-logo-color-bike-white-background_84176-13863-removebg-preview.png" alt="Logo" class="logo">
  </div>
  <nav>
    <ul class="header_section">
        <li class="header_class login-icon"><a href="login.php" class="header_link">Login</a></li>
        <li class="header_class header_registration"><a href="Registration.php" class="header_link">Registration</a></li>
    </ul>
  </nav>
</header>
<main class="home-main" id="home-main">
<?php
    if ($lastId > 0) {
        echo('<img src="HomePage/regissucc.jpg" style="width: 100%; height: 580px; ">');
    } else {
        echo "failure to register";
    }
?>
</main>
 <footer style="position: absolute;">
 <p>&copy; 2024 Devarsh & Aakarsh E-commerce Website. All rights reserved.</p>
 </footer>
</body>
</html>

