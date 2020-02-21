<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http\Options;
    
    use Ekolo\Component\EkoMagic\ParameterBag;

    /**
     * Controlle les paramètres de $_GET
     */
    class Params extends ParameterBag {

        public function __construct(array $vars = [])
        {
            $vars = !empty($vars) ? $vars : $_GET;
            parent::__construct($vars);
        }
    }