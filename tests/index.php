<?php 
    // header('Content-Type: application/json');
    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-Headers: *');

    require_once __DIR__.'./../vendor/autoload.php';
    require './helpers.php';
    
    use Ekolo\Component\Http\Request;

    $_GET = [
        'nom' => 'Mbuyu',
        'prenom' => 'Josué'
    ];

    $request = new Request;

    echo $request->params()
                 ->nom();