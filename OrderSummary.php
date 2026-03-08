<?php 

function sessionInit() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}
sessionInit();

$cart = $_SESSION['cart'] ?? [];

$totalitems = 0;
$totalPrice = 0;
foreach ($cart as $id => $item):

    $totalitems = $totalitems + 1;
    $totalPrice = $totalPrice + $item['price'];
endforeach; 

$tax = ($totalPrice * 13 ) / 100;
$afterTax = $totalPrice + $tax;

?>

<div class="order-main-container">
    <div class="billing-address-container">
        <h2 class="container-title">Billing Address</h2>
        <form style="display: contents;">
            <label for="billing-firstname">First Name</label>
            <input type="text" id="billing-firstname" name="firstname" placeholder="First Name" class="form-input">

            <label for="billing-lastname">Last Name</label>
            <input type="text" id="billing-lastname" name="lastname" placeholder="Last Name" class="form-input">

            <label for="billing-address">Address</label>
            <input type="text" id="billing-address" name="address" placeholder="Address" class="form-input">

            <label for="billing-province">Province</label>
            <select id="billing-province" name="province" class="form-select">
                <option value="">Select a province</option>
                <option value="ON">Ontario</option>
                <option value="QC">Quebec</option>
                <option value="NS">Nova Scotia</option>
                <option value="NB">New Brunswick</option>
                <option value="MB">Manitoba</option>
                <option value="BC">British Columbia</option>
                <option value="SK">Saskatchewan</option>
                <option value="AB">Alberta</option>
            </select>

            <label for="billing-city">City</label>
            <input type="text" id="billing-city" name="city" placeholder="City" class="form-input" maxlength="20">

            <label for="billing-postalcode">Postal Code</label>
            <input type="text" id="billing-postalcode" name="postalcode" placeholder="Postal Code" class="form-input"
                maxlength="6">

            <label for="billing-phone">Phone</label>
            <input type="text" id="billing-phone" name="phone" placeholder="Phone" onkeypress="return onlyNumber(event)"
                class="form-input" maxlength="10">

            <div class="payment-option">
                <h2 class="container-title">Payment Method</h2>

                <select id="payment-select-option" name="payment-select-option" class="form-select">
                    <option value="c_o_d">Cash on Delivery</option>
                    <option value="credit_card">Credit Card</option>
                </select>
                <div id="card-details-container" class="card-details">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="Card Number"
                        onkeypress="return onlyNumber(event)" class="form-input" maxlength="12">

                    <label for="card-expiry">Expiry Date</label>
                    <input type="text" id="card-expiry" name="card-expiry" placeholder="MM/YY" class="form-input"
                        maxlength="5">

                    <label for="card-cvc">CVC</label>
                    <input type="text" id="card-cvc" name="card-cvc" placeholder="CVC"
                        onkeypress="return onlyNumber(event)" class="form-input" maxlength="3">
                </div>
            </div>
            <div class="continue-payment-button">Place Order</div>
        </form>
    </div>
    <div class="order-summary-container">
        <h2 class="container-title">Order Summary</h2>
        <?php foreach ($cart as $id => $item): ?>
        <div class="summary-item-row">
            <span><?php echo $item['title']; ?></span>
            <span>$<?php echo $item['price']; ?></span>
        </div>
        <?php endforeach;  ?>
        <br>
        <div class="summary-item-row">
            <span>Sub-total</span>
            <span>$<?php echo $totalPrice;  ?></span>
        </div>
        <div class="summary-item-row">
            <span>Number of Items</span>
            <span><?php echo $totalitems;  ?></span>
        </div>
        <div class="summary-item-row">
            <span>Delivery</span>
            <span>Free</span>
        </div>
        <div class="summary-item-row">
            <span>Taxes</span>
            <span>$<?php echo $tax;  ?></span>
        </div>
        <div class="summary-item-row summary-total">
            <span>Total</span>
            <span>CAD $<?php echo $afterTax;  ?></span>
        </div>

    </div>
</div>