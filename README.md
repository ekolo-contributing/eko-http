# ekolo/http

C'est un module composant du framework `Ekolo` destiné à gérer et manipuler tous les traitements liés à toutes les requêtes et aux réponses `http`.

## Installation

Pour l'installer vous devez à avoir déjà composer installé. Si ce n'est pas le cas aller sur  [Composer](https://getcomposer.org/)

```bash
$ composer require ekolo/http
```

## API

`ekolo/http` contient des dossiers qui à leurs tours contiennent des classes pour faciliter la tâche aux développeurs.

1. `src` Dossier principal de la librairie
    * `Options` : Contient quelques classes qui à gérer des éléments optionnnelement.
        * `Bodies` : Gère les données venue par la méthode `POST`
        * `Headers` : Gère les headers
        * `Params` : Gère les données venue par la méthode `GET`
        * `Params` : Gère les données et des variables server `$_SERVER`
    * `Request` : Contient des classes qui alimente la class `Request` qui gère les requêtes `http`
    * `Response` : Contient des classes qui alimente la class `Response` qui gère les réponses `http`

Pour plus des détails sur ces classes il serait mieux de parcourir le code source de chaque classe.

### class Request

Gère les requêtes `http`

#### Request::params()

Cette méthode permet de récuper et de manipuler les données (variables) envoyées par la méthode GET qui sont généralement stockées la variable super globale `$_GET`

```php
use Ekolo\Component\Http\Request;

$_GET = [
    'nom' => 'Etokila',
    'prenom' => 'Diani',
    'sexe' => 'M'
];

$request = new Request;
```

##### Request::params($key)

`$key` : C'est le nom de la variable à récuperer

```php
use Ekolo\Component\Http\Request;

$_GET = [
    'nom' => 'Etokila',
    'prenom' => 'Diani',
    'sexe' => 'M'
];

$request = new Request;

echo $request->params('nom'); // Etokila
```

##### Request::params()->key

`key` : C'est le nom de la variable à récuperer

```php
echo $request->params()->nom; // Etokila
```

##### Request::params()->key()

Ceci est l'appelle des méthodes magiques si on ne veut pas récuperer par des attributs
* `key` : C'est le nom de la variable à récuperer

```php
echo $request->params()->nom(); // Etokila
```

##### Request::params()->get($key)

`$key` : C'est le nom de la variable à récuperer

```php
echo $request->params()->get('nom'); // Etokila
```

##### Request::params()->get($key, $default = null)

* `$key` : C'est le nom de la variable à récuperer
* `$default` : C'est la valeur par défaut au cas où cette variable n'existe pas

```php
echo $request->params()->get('fonction', 'Professesur'); // Professesur
```

##### Request::params($key, $default)

* `$key` : C'est le nom de la variable à récuperer
* `$default` : C'est la valeur par défaut au cas où cette variable n'existe pas

```php
echo $request->params('grade', 'Médecin'); // Médecin
```

##### Request::params()->all()

Renvoi le tableau contenant toutes les varibles

```php
print_r($request->params()->all());

/*
    Array
    (
        [nom] => Etokila
        [prenom] => Diani
        [sexe] => M
    )
*/
```

> En bref, le `params` est une instance de l'objet `ParameterBag` qui est une classe de la librairie `eko-magic`. Pour plus d'information aller sur sa [documentation](https://github.com/ekolo-contributing/eko-magic).

#### Request::body()

Cette méthode permet de récuperer les données envoyées par la méthode `POST`, génralement stockées dans la variable super globale `$_POST`.

L'utilisation de cette méthode est égale à celle de `params`

```php
use Ekolo\Component\Http\Request;

$request = new Request;

$request->body()->add([
    'nom' => 'Utilisateur',
    'prenom' => 'nouveau',
    'email' => 'inconnu'
]);

echo $request->body()->prenom();
```

#### Request::server()

Cette méthode permet de récuperer les données du serveur, génralement stockées dans la variable super globale `$_SERVER`.

L'utilisation de cette méthode est égale à celle de `params` et `body`

```php
use Ekolo\Component\Http\Request;

$request = new Request;

echo $request->server()->PROCESSOR_IDENTIFIER);
echo echo $request->server()->SCRIPT_NAME();

print_r($request-server()->all());
/*
Array
(
    [PHP_SELF] => index.php
    [SCRIPT_NAME] => index.php
    [SCRIPT_FILENAME] => index.php
    [PATH_TRANSLATED] => index.php
    [DOCUMENT_ROOT] =>
    [REQUEST_TIME_FLOAT] => 1582292281.2729
    [REQUEST_TIME] => 1582292281
    ...
)
*/
```

#### Request::headers()

Cette méthode permet de récuperer les headers envoyés.

L'utilisation de cette méthode est égale à celle de `params` et `body`

```php
use Ekolo\Component\Http\Request;

$request = new Request;

echo $request->headers()->get('User-Agent');

print_r($request-server()->all());
/*
Array
(
    [PHP_SELF] => index.php
    [SCRIPT_NAME] => index.php
    [SCRIPT_FILENAME] => index.php
    [PATH_TRANSLATED] => index.php
    [DOCUMENT_ROOT] =>
    [REQUEST_TIME_FLOAT] => 1582292281.2729
    [REQUEST_TIME] => 1582292281
    ...
)
*/
```

#### Request::input()

Cette méthode est juste un synonyme pour de body

L'utilisation de cette méthode est égale à celle de `body`

```php
use Ekolo\Component\Http\Request;

$request = new Request;
$request->input()->set('nom', 'mbuyu');

echo $request->input()->get('nom');

print_r($request-server()->all());
```

> Attention pour les clés qui ont de tiret `-`, là le génarateur des attributs et des méthodes ne les prend pas en charge, du cout ces valeurs ne peuvent être récuperées que par `get('User-agent')` ou `params('user-name')` ou `body('encore-ici')'` ainsi de suite

### class Response

Gère les réponses `http`

Pour plus de détails consulter les codes sources dans `src/Response`