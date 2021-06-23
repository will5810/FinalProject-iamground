<?php
    echo "<script> console.log('index.php'); </script>";
    require_once 'controller/FrontController.php';
    $query = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    echo "<script> console.log('".$query."'); </script>";
    $controller = new FrontController($query);
    echo "<script> console.log('construct finish'); </script>";
    $controller->run();
    exit;  
          
?>
