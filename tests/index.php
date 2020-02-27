<?php 

    require './helpers.php';
    require_once __DIR__.'./../vendor/autoload.php';
    
    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Http\Response;
    use Ekolo\Component\Http\Options\Headers;

    $request = new Request;
    $response = new Response;

    ob_start();
    require 'view.php';
    $content = ob_get_clean();

    require $extend.'.php';