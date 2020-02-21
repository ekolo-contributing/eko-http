<?php
    /**
     * Ce fichier est un component du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http\Options;
    
    use Ekolo\Component\EkoMagic\ParameterBag;

    /**
     * Controlle les headers
     */
    class Headers extends ParameterBag {

        protected $headers;

        public function __construct(array $vars = [])
        {
            $headers = function_exists('getallheaders') ? \getallheaders() :[];
            $this->headers = !empty($vars) ? $vars : $headers;
            parent::__construct($this->headers);
        }
    }