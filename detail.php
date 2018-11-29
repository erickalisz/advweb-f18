<?php
include('autoloader.php');

$detail_class = new ProductDetail();
$product = $detail_class -> getProductById();

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
        <div class="col">
          <h1 class="text-capitalize"><?php echo $product['name']; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <?php 
          //if there are images
          if( isset($product['images']) ){
            //if there are more than 1 image, create carousel
            if( count($product['images']) > 1 ){
              echo count($product['images']);
              echo "<div id=\"detail-carousel\" class=\"carousel slide border\" data-ride=\"carousel\">";
              echo "<div class=\"carousel-inner\">";
                $counter = 0;
                foreach( $product['images'] as $image ){
                  $active = $counter == 0 ? 'active' : '';
                  echo "<div class=\"carousel-item $active\">";
                  echo "
                  <img src=\"images/products/products/$image\" class=\"img-fluid\">";
                  echo "</div>";
                  $counter++;
                }
              echo "</div>";
              //print out the carousel indicators
              echo "<ol class=\"carousel-indicators\">";
              $counter = 0;
              foreach( $product['images'] as $image ){
                $active = $counter == 0 ? 'active' : '';
                echo "<li data-target=\"#detail-carousel\" data-slide-to=\"$counter\" style=\"height:30px;width:40px;overflow:hidden;background-image:url('images/products/products/$image');background-size:cover;border:solid white thin;\"></li>";
                $counter++;
              }
              echo "</ol>";
              echo "</div>";
            }
            else{
              $image = $product['images'][0];
              echo "<img src=\"images/products/products/$image\" class=\"img-fluid\">";
            }
            
          }
          ?>
        </div>
        <div class="col-md-6">
          <h4 class="price"><?php echo $product['price']; ?></h4>
          <div class="description"><?php echo $product['description']; ?></div>
        </div>
      </div>
    </div>
  </body>
</html>