<?php

require_once dirname(__DIR__) . "/Controller/HomeController.php";
require_once dirname(__DIR__) . "/Controller/ArticleController.php";
require_once dirname(__DIR__) . "/Controller/ContactController.php";
require_once dirname(__DIR__) . "/Controller/UserController.php";



/**
 * const stockant le routing de l'application, si on veut rajouter une url c'est ici
 */
const ROUTING = [
    "home" => [
        "controller" => "HomeController",
        "action" => "index",
        "title" => "Acceuil",
        "description" => "Retrouvez toute l'actu du rugby francais sur ce blog !"
    ],
    "article" => [
        "controller" => "ArticleController",
        "action" => "index",
        "title" => "Articles",
        "description" => "Tout les articles qui font l'actu rugby en ce moment !"
    ],
    "article_show" => [
        "controller" => "ArticleController",
        "action" => "show",
        "title" => "Article"
    ],
    "article_add" => [
        "controller" => "ArticleController",
        "action" => "add",
        "title" => "Créer un article",
    ],
    "user_add" => [
        "controller" => "UserController",
        "action" => "add",
        "title" => "Ajout d'utilisateur",
    ],
    "user_connexion" => [
        "controller" => "UserController",
        "action" => "connexion",
        "title" => "Connexion"
    ],
    "user_disconnect" => [
        "controller" => "UserController",
        "action" => "disconnect"
    ],
    "contact" => [
        "controller" => "ContactController",
        "action" => "index",
        "title" => "Contact",
        "description" => "Une question ? Besoin d'information ? Contactez-nous via notre formulaire !"
    ]
];

/**
 * function vérifiant l'existence d'une page avant d'instancier le bon controleur définie dans ROUTING
 */
function getRouteFromUrl():void
{
    $path = ROUTING["home"];
    if (isset($_GET["page"]) && isset(ROUTING[$_GET["page"]])) {
        $path =   ROUTING[$_GET["page"]];
    }
    
    $controller = new $path['controller'];
    $controller->{$path['action']}();
}

function getPageTitle(){
    $page = $_GET['page'] ?? 'home';
    return ROUTING[$page]['title'];
}

function getPageDescription(){
    $page = $_GET['page'] ?? 'home';
    return ROUTING[$page]['description'];
}
?>
