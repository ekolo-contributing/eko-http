<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
	namespace Ekolo\Component\Http;

	use Ekolo\Component\Http\Options\Params;
	use Ekolo\Component\Http\Options\Bodies;
	use Ekolo\Component\Http\HTTPRequest;

    /**
     * @see Ekolo\Component\Http\RequestInterface
     */
    class Request extends HTTPRequest implements RequestInterface {

		protected $params,
				  $body, 
				  $bodies,
				  $input;

		public function __construct()
		{
			parent::__construct();
			$this->params = new Params;
			$this->body   = new Bodies;
		}

        /**
		 * Manipule et renvoi les données du type GET stockées dans $_GET
		 * @param string $key La clé de la variable
		 * @param mixed $default La valeur par défault au cas où cette variable n'existe pas
		 * @return mixed|Params
		 */
		public function params($key = null, $default = null)
		{
			if ($key) {
				return $this->params->has($key) ? $this->params->get($key) : $default;
			}else {
				return $this->params;
			}
		}
		
		/**
		 * Manipule et renvoi les données du type POST stockées dans $_POST
		 * @param string $key La clé de la valeur
		 * @param mixed $default la valeur par défaut au cas où cette variable n'existe pas
		 * @return mixed|Bodies
		 */
		public function body($key = null, $default = null)
		{
			if ($key) {
				return $this->body->has($key) ? $this->body->get($key) : $default;
			}else {
				return $this->body;
			}
		}
		
		/**
		 * Manipule et renvoi les données du type POST stockées dans $_POST
		 * @param string $key La clé de la valeur
		 * @param mixed $default la valeur par défaut au cas où cette variable n'existe pas
		 * @return mixed|Bodies
		 */
		public function input($key = null, $default = null)
		{
			return $this->body($key, $default);
		}
        
        /**
		 * Vérifie s'il y a une la variable $_GET[$key]
		 * @param string $key La clé de la variable
		 * @return mixed
		 */
		public function paramExists($key)
		{
			return $this->params->has($key);
		}

		/**
		 * Renvoi la méthode dont la requête a été lancée
		 * @return string
		 */
		public function method()
		{
			return $this->server->get('REQUEST_METHOD') ? $this->server->get('REQUEST_METHOD') : 'GET';
		}

		/**
		 * Renvoi l'uri (url) demandé par le client
		 * @return string
		 */
		public function uri()
		{
			return $this->requestUri();
		}
    }