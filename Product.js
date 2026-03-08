function readyFunctionProductPage(){
    const productThumbnails = document.querySelectorAll('.product-thumbnails img');
    const productImage = document.querySelector('.product-image img');

    productThumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            productImage.src = thumbnail.src;
        });
    });
    
    document.querySelector(".addToCart").addEventListener('click', function() {

        let imgTitle = this.getAttribute("imgTitle");
        let proPrice = this.getAttribute("proPrice");
        let proDesc = this.getAttribute("proDesc");
        let imgSrc = this.getAttribute("imgSrc");
        let imgSrc2 = this.getAttribute("imgSrc2");
        let imgSrc3 = this.getAttribute("imgSrc3");
        let product_id = this.getAttribute("product_id");

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'AddtoCart.php', true); 
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function() {
            if(this.readyState == 4){
                if (xhr.status === 200 && xhr.responseText == "success") {
                    alert("Added to cart success");
                    document.querySelector(".cart-count").innerHTML = Number(document.querySelector(".cart-count").innerHTML) + 1;
                }
                else{
                    alert("Added to cart unsuccess");
                }
            }
        };
        xhr.send(JSON.stringify({ imgSrc: imgSrc, 
            product_id: product_id,
            imgTitle: imgTitle,
            proPrice: proPrice,
            proDesc: proDesc,
            imgSrc2: imgSrc2,
            imgSrc3: imgSrc3,
        }));
    });
}
