<?php

require 'config.php';

$records = $conn->prepare("SELECT * FROM products");
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $product) {
    ?>
        <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="./<?=$product["img"]?>" alt="product">
            <span><?=$product["name"]?></span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span><?=$product["category"]?></div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status <?=$product["status"] ? "active" : "disabled";?>"><?=$product["status"] ? "Active" : "Disabled";?></span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span><?=$product["sales"]?></div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span><?=$product["stock"]?></div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$<?=$product["price"]?></div>
      </div>
    <?php }
    ?>