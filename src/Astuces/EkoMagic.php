<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http\Astuces;

    /**
     * EkoMagic est une classe magique ;-) qui permet de faire des appels magiquements à des méthodes qui existent pas
     */
    class EkoMagic {

        protected $methods = [];

        public function __construct(array $vars = [])
        {
            $this->methods = $vars;
        }

        public function registerMethod($method)
        {
            $this->methods[] = $method;
        }

        public function __set($key, $value)
        {
            $this->methods[$key] = $value;
        }

        public function __get($key)
        {
            return $this->methods[$key];
        }

        public function __call($method, $args)
        {
            return $this->methods[$method];
        }
    }