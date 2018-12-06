<?php
include('vendor/autoload.php');

//generate navigation
include( __DIR__ . 'includes/navigation.inc.php');

//generate products
use aitsyd\Product;

$product_class = new Product();
$products = $product_class -> getProducts();
$page_title = 'Shop Page';



$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    //'cache' => 'cache'
));

$template = $twig -> load('home.twig');

echo $template -> render( array(
      'pages' => $pages,
      'products' => $products, 
      'pagetitle' => $page_title
      )
    );

?>
