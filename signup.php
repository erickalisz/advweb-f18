<?php
include('vendor/autoload.php');

//generate navigation
include('includes/navigation.inc.php');

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
  //'cache' => 'cache'
));

$template = $twig -> load('signup.twig');

echo $template -> render( array(
      'pages' => $pages,
      'pagetitle' => $page_title,
      'currentPage' => $currentPage
      )
    );
?>