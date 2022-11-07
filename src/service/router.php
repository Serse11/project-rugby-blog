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
        "title" => "Accueil",
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
        "title" => "Article",
        "description" => "Article"
    ],
    "article_add" => [
        "controller" => "ArticleController",
        "action" => "add",
        "title" => "Créer un article",
        "description" => "Créer votre article"
    ],
    "article_deleted" => [
        "controller" => "ArticleController",
        "action" => "deleted",
        "title" => "Supprimez votre article",
        "description" => "Supprimez votre article"
    ],
    "article_update" => [
        "controller" => "ArticleController",
        "action" => "update",
        "title" => "Modifiez votre article",
        "description" => "Modifiez votre article si besoin"
    ],
    "user_add" => [
        "controller" => "UserController",
        "action" => "add",
        "title" => "Créer votre profil",
        "description" => "Créer un profil pour pouvoir partager l'actu !"
    ],
    "user_connexion" => [
        "controller" => "UserController",
        "action" => "connexion",
        "title" => "Connexion",
        "description" => "Connectez vous pour créer votre article"
    ],
    "user_disconnect" => [
        "controller" => "UserController",
        "action" => "disconnect",
        "title" => "Deconnexion",
        "description" => "Deconnectez vous"
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

/*fonction qui retourne la valeur de la clé title d'une page*/
function getPageTitle(){
    $page = $_GET['page'] ?? 'home';
    return ROUTING[$page]['title'];
}

/*fonction qui retourne la valeur de la clé description qui correspond a la meta-description d'une page */
function getPageDescription(){
    $page = $_GET['page'] ?? 'home';
    return ROUTING[$page]['description'];
}
?>
