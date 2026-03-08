<div class="all_cart_grid">

    <?php
function sessionInit() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
sessionInit();

$cart = $_SESSION['cart'] ?? [];

if (count($cart) === 0){
    echo '<img src="HomePage/empty-cart-1.png" style="width:"100%";height: 580px; ">';
}
else{
    foreach ($cart as $id => $item):
        echo ('<div class="cart-product-card">'
        . '<div class="cart-product-image">'
        . '<img src="' . $item['src'] . '" alt="">'
        . '</div>'
        . '<div class="cart-product-details">'
        . '<h2>' . $item['title'] . '</h2>'
        . '<p class="desc">' . $item['desc'] . '</p>'
        . '<p class="product-id">#' . $item['product_id'] . '</p>'
        . '</div>'
        . '<div class="cart-product-price">'
        .    '<p>$' . $item['price'] . '</p>'
        . '</div>'
        .'</div>');
    
    endforeach;

    echo '<div class="cart-product-card">
        <button class="Checkout-btn">Check Out</button>
      </div>';
}
?>

</div>