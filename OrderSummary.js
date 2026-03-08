function setOrderSummaryEvents(){
    document.querySelector("#payment-select-option").addEventListener('change', function(){
        let paymentMethod = document.querySelector('select[name="payment-select-option"]').value;
        let cardDetails = document.getElementById('card-details-container');
        if (paymentMethod === 'credit_card') {
            cardDetails.style.display = 'block';
        } else {
            cardDetails.style.display = 'none';
        }
    });

    document.querySelector(".continue-payment-button").addEventListener('click', function() {

        let firstName = document.getElementById("billing-firstname").value;
        let lastName = document.getElementById("billing-lastname").value;
        let address = document.getElementById("billing-address").value;
        let city = document.getElementById("billing-city").value;
        let provice = document.getElementById("billing-province").value;
        let postalCode = document.getElementById("billing-postalcode").value;
        let phone = document.getElementById("billing-phone").value;
        let paymentMethod = document.getElementById("payment-select-option").value;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'OrderSuccess.php?firstname=' + encodeURIComponent(firstName) + 
        '&lastname=' + encodeURIComponent(lastName) +
        '&address=' + encodeURIComponent(address) +
        '&city=' + encodeURIComponent(city) +
        '&province=' + encodeURIComponent(provice) +
        '&postalcode=' + encodeURIComponent(postalCode) +
        '&phone=' + encodeURIComponent(phone) +
        '&paymentmethod=' + encodeURIComponent(paymentMethod) 
        , true); 
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "relative");
                    document.querySelector(".cart-count").innerHTML = "0";
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });
}