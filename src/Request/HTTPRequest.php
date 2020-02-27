<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http;
    
    use Ekolo\Component\Http\Options\Server;
    use Ekolo\Component\Http\Options\Headers;

    /**
     * Répertorie les variables http et d'autres fonctionnalités
     */
    class HTTPRequest {

        protected $vars;
		protected $server;
		protected $headers;

        public function __construct()
        {
			$this->server = new Server;
			$this->headers = new Headers;
        }

        /**
		 * Renvoi l'adresse IP de l'utilisateur
		 * @return string $ip
		 */
		public function getClientIp()
		{
			return $this->server->get('REMOTE_ADDR');
		}

		/**
		 * Renvoi le protocol du serveur
		 * @return string
		 */
		public function getServerProtocol()
		{
			return $this->server->get('SERVER_PROTOCOL');
		}

		/**
		 * Renvoi le remote port
		 * @return string
		 */
		public function getRemotePort()
		{
			return $this->server->get('REMOTE_PORT');
		}

		/**
		 * Renvoi l'application du server PHP et sa version
		 * @return string
		 */
		public function getServerSoftware()
		{
			return $this->server->get('SERVER_SOFTWARE');
		}

		/**
		 * Renvoi le nom du serveur
		 * @return string
		 */
		public function getSeverName()
		{
			return $this->server->get('SERVER_NAME');
		}

		/**
		 * Renvoi le port dont le serveur est lancer
		 * @return string
		 */
		public function getServerPort()
		{
			return $this->server->get('SERVER_PORT');
		}

		/**
		 * Renvoi le fichier exécuté
		 * @return string
		 */
		public function scriptName()
		{
			return $this->server->get('SCRIPT_NAME');
		}

		/**
		 * Renvoi le path du fichier exécuté
		 * @return string
		 */
		public function scriptFileName()
		{
			return $this->server->get('SCRIPT_FILENAME');
		}

		/**
		 * Renvoi le query string
		 * @return string
		 */
		public function queryString()
		{
			return $this->server->get('QUERY_STRING');
		}

		/**
		 * Renvoi le path du fichier exécuté
		 * @return string
		 */
		public function httpHost()
		{
			return $this->server->get('HTTP_HOST');
		}

		/**
		 * Renvoi le request uri
		 * @return string
		 */
		public function requestUri()
		{
			return $this->server->get('REQUEST_URI');
		}

		/**
		 * Retourne l'instance de Server
		 * @return Ekolo\Component\Http\Server
		 */
		public function server()
		{
			return $this->server;
		}

		/**
		 * Retourne l'instance de Headers
		 * @return Ekolo\Component\Http\Headers
		 */
		public function headers()
		{
			return $this->headers;
		}
    }