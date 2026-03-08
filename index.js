document.addEventListener("DOMContentLoaded", function() {

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'database.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status === 200) {
            console.log("Database connected successfully" + xhr.responseText)
        }
    }
    xhr.send();

    document.querySelector(".header_home").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Home.php', true);
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "relative");
                    setTimeout(setEventForProducts(), 2000);
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });

    document.querySelector(".footer_home").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Home.php', true);
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "relative");
                    setTimeout(setEventForProducts(), 2000);
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });

    document.querySelector(".cart-icon").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Cart.php', true);
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "relative");
                    setTimeout(setEventForCart(), 2000);
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });

    document.querySelector(".footer-cart-icon").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Cart.php', true);
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "relative");
                    setTimeout(setEventForCart(), 2000);
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });

    document.querySelector(".header_admin").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Admin.php', true); 
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "absolute");
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });

    document.querySelector(".footer_admin").addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Admin.php', true); 
        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200) {
                    document.getElementById("home-main").innerHTML = xhr.responseText;
                    document.querySelector("footer").style.setProperty("position", "absolute");
                } else {
                    document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
                }
            }
        };
        xhr.send();
    });

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'Main.php', true); 
    xhr.onreadystatechange = function() {
        if(this.readyState == 4){
            if (xhr.status === 200 && xhr.responseText == "active") {
                document.querySelector(".header_home").click();
            }
        }
    };
    xhr.send();
});

function setEventForProducts(){
    let productsDiv = document.getElementsByClassName("bicycle_product");
    for(let singleProduct of productsDiv){
        singleProduct.addEventListener('click', function(e){
            let imgDiv = singleProduct.getElementsByTagName("img")[0];
            let imgSrc = imgDiv.src;
            imgSrc = imgSrc ? imgSrc : '';
            let imgTitleElem = singleProduct.getElementsByClassName("product_img_title")[0].innerHTML;
            imgTitleElem = imgTitleElem ? imgTitleElem : '';
            let proPrice = singleProduct.getElementsByClassName("product_img_title")[0].getAttribute("price");
            proPrice = proPrice ? proPrice : '';
            let proDesc = singleProduct.getElementsByClassName("product_img_title")[0].getAttribute("desrc");
            proDesc = proDesc ? proDesc : '';
            let imgSrc2 = singleProduct.getElementsByClassName("product_img_title")[0].getAttribute("imgSrc2");
            imgSrc2 = imgSrc2 ? imgSrc2 : '';
            let imgSrc3 = singleProduct.getElementsByClassName("product_img_title")[0].getAttribute("imgSrc3");
            imgSrc3 = imgSrc3 ? imgSrc3 : '';
            let product_id = singleProduct.getElementsByClassName("product_img_title")[0].getAttribute("product_id");
            product_id = product_id ? product_id : '';
    
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'Product.php', true); 
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.status === 200) {
                    document.querySelector(".home-main").innerHTML = xhr.responseText;
                    readyFunctionProductPage();
                    document.querySelector("footer").style.setProperty("position", "relative");
                } else {
                    document.querySelector(".home-main").innerHTML = 'Error calling PHP script.';          
                }
            };
            xhr.send(JSON.stringify({ imgSrc: imgSrc, 
                product_id: product_id,
                imgTitle: imgTitleElem,
                proPrice: proPrice,
                proDesc: proDesc,
                imgSrc2: imgSrc2,
                imgSrc3: imgSrc3,
            }));
        });
    }
}


function openAdminOrderedProduct(order_id){

    var xhr = new XMLHttpRequest();
    let url = 'OrderedProductDetail.php?order_id=' + order_id;
    xhr.open('GET', url, true); 
    xhr.onreadystatechange = function() {
        if(this.readyState == 4){
            if (xhr.status === 200) {
                document.getElementById("home-main").innerHTML = xhr.responseText;
                document.querySelector("footer").style.setProperty("position", "absolute");
            } else {
                document.getElementById("home-main").innerHTML = 'Error calling PHP script.';
            }
        }
    };
    xhr.send();
}