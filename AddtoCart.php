<?php
function sessionInit() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

sessionInit();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$singledatacart = file_get_contents('php://input');

$singlecartrequest = json_decode($singledatacart, true);
$product_id = $singlecartrequest['product_id'];
$imgSrc = $singlecartrequest['imgSrc'];
$imgTitle = $singlecartrequest['imgTitle'];
$proPrice = $singlecartrequest['proPrice'];
$proDesc = $singlecartrequest['proDesc'];
$imgSrc2 = $singlecartrequest['imgSrc2'];
$imgSrc3 = $singlecartrequest['imgSrc3'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($product_id)) {
    $_SESSION['cart'][$product_id] = [
        "product_id" => $product_id,
        "src" => $imgSrc,
        "title" => $imgTitle,
        "price" => $proPrice,
        "desc" => $proDesc
    ];

    echo "success";
}


?>