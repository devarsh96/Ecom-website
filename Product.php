 <div class="product-details">
    <div class="product-gallery">
        <div class="product-image">
            <img src=

            <?php
              $data = file_get_contents('php://input');

              $request = json_decode($data, true);
              $imgSrc = $request['imgSrc'];
              $imgTitle = $request['imgTitle'];
              $proPrice = $request['proPrice'];
              $proDesc = $request['proDesc'];
              $imgSrc2 = $request['imgSrc2'];
              $imgSrc3 = $request['imgSrc3'];
              $product_id = $request['product_id'];

              echo $imgSrc; 
            ?>

            alt="Product Image" id="main-image">
        </div>
        <div class="product-thumbnails">
            <img src="<?php echo $imgSrc;  ?>" alt="Thumbnail 1">
            <img src="<?php echo $imgSrc2;  ?>" alt="Thumbnail 2">
            <img src="<?php echo $imgSrc3;  ?>" alt="Thumbnail 3">
        </div>
    </div>

    <div class="product-info">
      <h3 class="product-title"><?php echo $imgTitle;  ?></h3>
      <h3 class="product-price">$<?php echo $proPrice;  ?></h3>
      <button class="addToCart"
      imgTitle="<?php echo $imgTitle;  ?>"
      product_id="<?php echo $product_id;  ?>"
      imgSrc="<?php echo $imgSrc;  ?>"
      proPrice="<?php echo $proPrice;  ?>"
      proDesc="<?php echo $proDesc;  ?>"
      imgSrc2="<?php echo $imgSrc2;  ?>"
      imgSrc3="<?php echo $imgSrc3;  ?>"
      >
        Add to Cart</button>
    </div>
    <div class="product-description">
      <h2>Description</h2>
      <p><?php echo $proDesc;  ?></p>
    </div>

  </div>

