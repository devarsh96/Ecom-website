
function setEventForCart(){

    document.querySelector(".Checkout-btn").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'OrderSummary.php', true); 
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "relative");
                    setTimeout(setOrderSummaryEvents(), 2000);
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });
}