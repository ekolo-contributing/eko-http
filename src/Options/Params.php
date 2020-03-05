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

        /**
         * Permet de modifier la valeur de GET
         * @param string $key La clé
         * @param mixed $value la valeur
         * @return void
         */
        public function set($key, $value)
        {
            parent::set($key, $value);
            $_GET[$key] = $value;
        }

        /**
         * Permet d'ajouter un nouveau tableau de GET
         * @param array $parameters Les paramètres à ajouter
         * @return void
         */
        public function add(array $parameters = [])
        {
            parent::add($parameters);
            $_GET = array_merge($_GET, $parameters);
        }

        /**
         * Remplace les variables GET
         * @param array $parameters
         * @return void
         */
        public function replace(array $parameters = [])
        {
            parent::replace($parameters);
            $_GET = $parameters;
        }

        /**
         * Supprime la variable
         * @param string $key La clé de la variable à supprimer
         * @return void
         */
        public function remove($key)
        {
            parent::remove($key);
            unset($_GET[$key]);
        }

        /**
         * Retourne la variable dont la clé passée en paramètre
         * @param string $key La clé de la variable à retoruner
         * @return void
         */
        public function get($key, $default = null)
        {
            parent::get($key, $default);

            return $_GET[$key];
        }

        /**
         * Retourne les variables
         * @return array
         */
        public function all()
        {
            parent::all();

            return $_GET;
        }
    }