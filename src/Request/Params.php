<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http;
    
    use Ekolo\Component\Http\Astuces\ParameterBag;

    /**
     * Controlle les paramètres de $_GET
     */
    class Params extends ParameterBag {

        public function __construct(array $vars = [])
        {
            $vars = !empty($vars) ? $vars : $_GET;
            parent::__construct($vars);
            $this->generateParams();
        }

        /**
         * Permet de générer des params qui n'existaient pas
         */
        public function generateParams()
        {
            if ($this->count() > 0) {
                foreach ($this->parameters as $key => $value) {
                    $this->$key = $value;
                }
            }
        }
    }