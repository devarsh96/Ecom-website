<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bicycle_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['loginUser']) && isset($_GET['loginPassword'])) {
        $user = $_GET['loginUser'];
        $pass = $_GET['loginPassword'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password1 = ?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            for ($i = 0; $i < count($rows); $i++) {               
                $_SESSION['user_id'] = $rows[$i]['user_id'];
                $_SESSION['username'] = $rows[$i]['username'];
                $_SESSION['phoneNumber'] = $rows[$i]['phone_number'];
                $_SESSION['email'] = $rows[$i]['email'];
            }
            header("Location: http://localhost:8000/Ecom/index.php");
            exit();
        } else {
            
            if (!empty($_SESSION)) {
                session_destroy();
            }   
            header("Location: http://localhost:8000/Ecom/Registration.php");
        
            exit();
        }

        $stmt->close();
        $conn->close();
    }
}
?>