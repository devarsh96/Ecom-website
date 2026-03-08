
<div class="discount-offers">
  <div class="single-dis">
    <img class="first_discount" src="HomePage/Specialoffer70.png" alt="Logo">
  </div>
  <div class="single-dis">
    <img class="second_discount" src="HomePage/50blackfriday.png" alt="Logo">
  </div>
</div>
<div class="all_product_grid">

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bicycle_db";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sqlStat = "SELECT * FROM products";
  $result = $conn->query($sqlStat);

  if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    for ($i = 0; $i < count($rows); $i++) {
        echo "<div class='bicycle_product'> " 
        . "<img src='" . $rows[$i]['image_1'] . "' alt='" . $rows[$i]['image_2'] . "'>"
        . "<div class='captionTag'>"
        . "<div class='product_img_title_price'><strong> $" . $rows[$i]['price'] . "</strong> </div>"
        . "<div class='product_img_title' price='" . $rows[$i]['price'] . "' desrc='" . $rows[$i]['description'] . "' reviews='' "
        . "imgSrc2='" . $rows[$i]['image_2'] . "' imgSrc3='" . $rows[$i]['image_3'] . "' product_id='" . $rows[$i]['product_id'] . "'>" 
        . $rows[$i]['product_name'] 
        . "</div>"
        . "</div></div>";
    }
  } else {
    echo "0 results";
  }

  $conn->close();

  if (session_status() != PHP_SESSION_NONE) {
    session_start();
  }
?>
</div>
