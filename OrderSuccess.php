<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bicycle_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    function sessionInit() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    sessionInit();

    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $province = $_GET['province'];
    $postalcode = $_GET['postalcode'];
    $phone = $_GET['phone'];
    $paymentmethod = $_GET['paymentmethod'];

    $cart = $_SESSION['cart'] ?? [];
    $userId = $_SESSION['user_id'];

    $totalitems = 0;
    $totalPrice = 0;
    foreach ($cart as $id => $item):

        $totalitems = $totalitems + 1;
        $totalPrice = $totalPrice + $item['price'];
    endforeach; 

    $tax = ($totalPrice * 13 ) / 100;
    $afterTax = $totalPrice + $tax;

    $stmt = $conn->prepare("INSERT INTO orders (user_id, first_name, last_name, `address`, city, 
    provice, postal_code, phone_num, payment_method, total_price, total_items) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $userId, $firstname, $lastname, $address, $city,
    $province, $postalcode, $phone, $paymentmethod,
    $afterTax, $totalitems
    );

    $stmt->execute();
    $stmt->close();
    $lastId = $conn->insert_id;

    foreach ($cart as $id => $item):

        $stmt = $conn->prepare("INSERT INTO ordered_product (order_id, 	product_id, product_name, price) 
                                VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $lastId, $item['product_id'], $item['title'], $item['price']);
        $stmt->execute();
        $stmt->close();
    endforeach; 
    
    $conn->close();

    session_unset();
    session_destroy();
    
} else {
    echo "Error: Invalid request method.";
}
?>
<img src="HomePage/hero.svg" style="width: 100%; height: 580px; ">