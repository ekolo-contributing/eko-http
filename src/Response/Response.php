<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Http;
    
    use Ekolo\Component\Http\Options\Server;
    use Ekolo\Component\Http\Options\Headers;

    /**
     * Gère les response http
     */
    class Response
    {
        /**
         * Les variables à envoyer dans les vues
         * @var array
         */
        protected $vars = [];

        /**
         * Objet de la classe Server
         * @var Server
         */
        protected $server;

        /**
         * Le fichier de la vue à afficher
         * @var string
         */
        protected $fileView;

        public function __construct()
        {
            $this->server = new Server;
        }

        /**
         * Permet d'ajouter les headers dans la response à donner
         * @param array $headers Les headers à ajouter
         * @return void
         */
        public function addHeaders(array $headers)
        {
            if (!empty($headers)) {
                foreach ($headers as $header) {
                    header($header);
                }
            }
        }

        /**
         * Permet d'ajouter une nouvelle variable à la vue
         * @param string $var Le nom de la variable
         * @param mixed $value La valeur à ajouter à la variable
         */
        public function addVar(string $var, $value)
        {
            $this->vars[$var] = $value;
        }

        /**
         * Permet de faire une redirection vers un autre url
         * @param string $url L'url à être redirigé
         * @return void
         */
        public function redirect(string $url)
        {
            $this->addHeaders(['Location: '.$url]);
            exit;
        }

        /**
         * Permet de modifier le status
         * @param int $status Le code du status
         * @return void
         */
        public function setStatus(int $status = null)
        {
            if (!empty($status)) {
                $this->addHeaders([$this->server->SERVER_PROTOCOL().' '.$status]);
            }
        }

        /**
         * Permet de renvoyer les données
         * @param mixed $data Les données à afficher
         * @param array $headers Les headers à envoyer
         * @param mixed $status Le status
         */
        public function send($data, array $headers = [], int $status = null)
        {
            $this->addHeaders($headers);
            $this->setStatus($status);

            if (in_array('Content-Type: application/json', $headers)) {
                echo json_encode($data);
            }else {
                if (!is_array($data)) {
                    echo $data;
                }else {
                    echo '<pre>';
                    print_r($data);
                    echo '</pre>';
                    die();
                }
            }
        }
        
        /**
         * Renvoi les données en JSON
         * @param mixed $data Les données à renvoyer
         * @param mixed $status
         */
        public function json($data, array $headers = [], int $status = null)
        {
            $headers[] = 'Content-Type: application/json';
            $this->send($data, 'application/json', $status);
        }
    }
    