<?php 

    require './helpers.php';
    require_once __DIR__.'./../vendor/autoload.php';
    
    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Http\Options\Headers;

    $request = new Request;

    $request->input()->set('nom', 'mbuyu');

    echo $request->input()->nom();