<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http\Options;
    
    use Ekolo\Component\EkoMagic\ParameterBag;

    /**
     * Controlle les paramètres de $_FILES (Les données venant d'un formulaire par la méthode POST)
     */
    class Files extends ParameterBag {

        public function __construct(array $vars = [])
        {
            $_FILES = !empty($vars) ? array_merge($_FILES, $vars) : $_FILES;
            parent::__construct($_FILES);
        }

        /**
         * Permet de modifier la valeur de $_FILES
         * @param string $key La clé
         * @param mixed $value la valeur
         * @return void
         */
        public function set($key, $value)
        {
            parent::set($key, $value);
            $_FILES[$key] = $value;
        }

        /**
         * Permet d'ajouter un nouveau tableau de $_FILES
         * @param array $parameters Les paramètres à ajouter
         * @return void
         */
        public function add(array $parameters = [])
        {
            parent::add($parameters);
            $_FILES = array_merge($_FILES, $parameters);
        }

        /**
         * Remplace les variables $_FILES
         * @param array $parameters
         * @return void
         */
        public function replace(array $parameters = [])
        {
            parent::replace($parameters);
            $_FILES = $parameters;
        }

        /**
         * Supprime la variable
         * @param string $key La clé de la variable à supprimer
         * @return void
         */
        public function remove($key)
        {
            parent::remove($key);
            unset($_FILES[$key]);
        }

        /**
         * Retourne la variable dont la clé passée en paramètre
         * @param string $key La clé de la variable à retoruner
         * @return void
         */
        public function get($key, $default = null)
        {
            parent::get($key, $default);

            return $this->has($key) ? $_FILES[$key] : null;
        }

        /**
         * Retourne les variables
         * @return array
         */
        public function all()
        {
            parent::all();

            return $_FILES;
        }

        /**
         * Renvoi les clés des paramètres
         * @return array
         */
        public function keys()
        {
            parent::keys();
            return array_keys($_FILES);
        }

        /**
         * Vérifie si le parameter existe
         * @param string $key
         * @return bool
         */
        public function has($key)
        {
            parent::has($key);
            return array_key_exists($key, $_FILES);
        }

        /**
         * Retourne Le nombre de parameters
         * @return int
         */
        public function count()
        {
            parent::count();
            return \count($_FILES);
        }
    }