<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http;
    
    use Ekolo\Component\Http\Astuces\ParameterBag;

    /**
     * Controlle les paramètres de $_SERVER et d'autres fonctionnalités liées au serveur
     */
    class Server extends ParameterBag {

        public function __construct(array $vars = [])
        {
            $vars = !empty($vars) ? $vars : $_SERVER;
            parent::__construct($vars);
        }
    }