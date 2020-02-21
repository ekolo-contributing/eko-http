<?php 

    require './helpers.php';
    require_once __DIR__.'./../vendor/autoload.php';
    
    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Http\Options\Headers;
    
    // $_GET = [
    //     'sexe' => 'M',
    //     'created' => 'now',
    //     'prenom' => 'Don de Dieu',
    //     'nom' => 'Bolenge'
    // ];
    

    $request = new Request;

    $request->params()->set('ville', 'Kinshasa');
    

    // echo $request->params('age', 'adulte');
    // echo $request->server()->SCRIPT_NAME();
    // debug($request->server()->PROCESSOR_IDENTIFIER);

    // debug($request->params()->all());

    $request->body()->add([
        'nom' => 'Utilisateur',
        'prenom' => 'nouveau',
        'email' => 'inconnu'
    ]);

    // echo $request->body()->prenom();

    // debug($request->server()->all());

    debug($request->body());