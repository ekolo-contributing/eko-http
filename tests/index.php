<?php 
    require_once __DIR__.'./../vendor/autoload.php';
    
    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Http\Response;
    use Ekolo\Component\Http\Options\Headers;

    $request = new Request;
    $response = new Response;

    $response->send([
        'nom' => 'Papa'
    ], ['Content-Type: application/json'], 200);