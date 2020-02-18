<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http;

    /**
     * @package Classe gérant les différentes requêtes http
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    interface RequestInterface {

        /**
		 * Permet de renvoyer une variable GET ou le tableau GET
		 * @param string $key La clé de la variable en question
		 * @return mixed $_GET[$key] La valeur trouvée
		 */
		public function params($key = null);
        
        /**
		 * Véfirie si une variable GET existe
		 * @param {string} $key La clé de la variable
		 * @return {bool}
		 */
		public function paramExists($key);

        
    }