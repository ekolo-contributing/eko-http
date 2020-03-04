<?php 
    require_once __DIR__.'./../vendor/autoload.php';
    
    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Http\Response;
    use Ekolo\Component\Http\Options\Headers;
    

    $request = new Request;
    $response = new Response;
    $request->body()->add([
        'nom' => '',
        'email' => 'josue.com',
        'prenom' => '1h23'
    ]);

    $rules = [
        'nom' => 'required|min:3',
        'prenom' => 'alpha:3',
        'email' => 'required|email'
    ];

    $request->validator($rules);

    debug(session('errors'));

    // $response->send([
    //     'nom' => 'Papa'
    // ], ['Content-Type: application/json'], 200);

