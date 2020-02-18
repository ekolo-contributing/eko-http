<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
	namespace Ekolo\Component\Http;

	use Ekolo\Component\Http\Params;
	use Ekolo\Component\Http\HTTPRequest;

    /**
     * @see Ekolo\Component\Http\RequestInterface
     */
    class Request extends HTTPRequest implements RequestInterface {

		protected $params;

		public function __construct()
		{
			parent::__construct();
			$this->params = new Params;
		}

        /**
		 * @see RequestInterface::params()
		 */
		public function params($key = null)
		{
			if ($key) {
				return isset($this->params->$key) ? $this->params->$key : null;
			}else {
				return $this->params;
			}
        }
        
        /**
		 * RequestInterface::paramExists()
		 */
		public function paramExists($key)
		{
			return isset($this->params->$key);
		}

		/**
		 * Renvoi le request uri
		 */
		public function requestUri()
		{
			return $this->server->get('REQUEST_URI');
		}

		/**
		 * Renvoi la méthode dont la requête a été lancée
		 * @return string
		 */
		public function method()
		{
			return $this->server->get('REQUEST_METHOD') ? $this->server->get('REQUEST_METHOD') : 'GET';
		}
    }