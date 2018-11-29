<?php
include('autoloader.php');

$product_class = new Product();
$products = $product_class -> getProducts();

?>
<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <?php 
        if( count($products) > 0 ){
          foreach( $products as $product ){
            $id = $product['product_id'];
            $name = $product['name'];
            $price = $product['price'];
            $description = $product['description'];
            $image = 'images/products/products/' . $product['image_file_name'];
            echo "<div class=\"col-md-3\" id=\"$id\">
              <h3>$name</h3>
              <img class=\"img-fluid\" src=\"$image\">
              <p>$price</p>
              <a href=\"detail.php?id=$id\">More detail</a>
            </div>";
          }
        }
        ?>
        
      </div>
    </div>
  </body>
</html>