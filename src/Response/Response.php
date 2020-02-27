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
         * Permet d'ajouter un header dans la response à donner
         * @param string $header Le header à ajouter
         * @return void
         */
        public function addHeader(string $header)
        {
            header($header);
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
            $this->addHeader('Location: '.$url);
            exit;
        }

        /**
         * Permet de modifier le status
         * @param int $code Le code du status
         * @param string $string
         * @return void
         */
        public function setStatus(int $code, string $string)
        {
            $this->addHeader($this->server->SERVER_PROTOCOL().' '.$code.' '.$string);
        }

        /**
         * Permet de renvoyer les données
         * @param mixed $data Les données à afficher
         * @param string $type Le type de données à envoyer
         * @param mixed $status Le status
         */
        public function send($data, $type = 'text/html', $status = null)
        {
            $this->addHeader('Content-Type: '.$type);

            if ($status !== null) {
                if (\is_array($status)) {
                    \extract($status);
                }else {
                    $code = $status;
                    $string = '';
                }
    
                if (!isset($code)) {
                    throw new Exception("Le status doit être numérique ou un tableau ['code' => 404, 'string' => 'Not Found']");
                }
                
                $this->setStatus($code, $string);
            }

            if ($type == 'text/html') {
                if (!is_array($data)) {
                    echo $data;
                }else {
                    echo '<pre>';
                    print_r($data);
                    echo '</pre>';
                    die();
                }
            }elseif ($type == 'application/json') {
                echo json_encode($data);
			    die();
            }else {
                echo '<pre>';
                print_r($data);
                echo '</pre>';
                die();
            }
        }
        
        /**
         * Renvoi les données en JSON
         * @param mixed $data Les données à renvoyer
         * @param mixed $status
         */
        public function json($data, $status)
        {
            $this->send($data, 'application/json', $status);
        }
    }
    