<?php

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/UserRepository.php";

class UserController extends AbstractController
{

    /**
     * @Route user_connexion
     * fonction de connexion de l'utilisateur
     */
    public function connexion()
    {
        $error = null;
        $message = "";
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $error = false;
            $userRepository = new UserRepository();
            $user = $userRepository->findOneByUsername($_POST["username"]) ?? null;
            if (!empty($user) && password_verify($_POST["password"], $user->getPassword())) {
                $error = true;
                $_SESSION['user_is_connected'] = true;
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['role'] = $user->getRole();
                $message = "vous etes connecté";
                header("Location: ./?page=article");
                exit;
            }
        }
        return $this->renderView("/views/template/user/user_connexion.php", 
        [
            "error" => $error,
            "message" => $message
        ]);
    }

    /**
     * @Route user_disconnect
     * fonction de deconnexion de l'utilisateur
     */
    public function disconnect()
    {
        if (isset($_SESSION["user_is_connected"]) && $_SESSION["user_is_connected"]) {
            session_destroy();
            header("Location: ./?page=home");
        }
    }

    /**
     * @Route user_add
     * fonction de creation d'utilisateur
     */
    public function add()
    {
        $error = null;
        $message = "";
        // Vérification de l'eexistence des index dans $_POST
        if (
            !empty($_POST)
            &&  isset($_POST["lastname"], $_POST["firstname"], $_POST["username"], $_POST["password"])
        ) {
            $error = false;
            $message = "Erreur : Informations invalides.";
            $userRepository =  new UserRepository();

            // déclaration et assignation des variable avec vérifcation de l'existence de valeur valide
            if (
                strlen($lastname = trim($_POST["lastname"]))
                && strlen($firstname = trim($_POST["firstname"]))
                && strlen($username = trim($_POST["username"]))
                && strlen($password = trim($_POST["password"]))
            ) {
                // Vérification di un utilisateur n'existe pas déjà avec ce username
                $message = "Erreur :  l'utilisateur existe déjà.";
                if (empty($userRepository->findOneByUsername($username))) {
                    // Instanciation de User
                    $user = new User();
                    // assignation des valeur de usser
                    $user->setLastname($lastname);
                    $user->setFirstname($firstname);
                    $user->setUsername($username);
                    $user->setPassword(password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]));
                    // insertion du nouveau utilisateur dans la BDD
                    $userRepository->insert($user);

                    // Gestion erreur
                    $error = true;
                    $message = "L'utilisateur a bien été créé.";
                }
                header('Location: ./?page=article');
            }
        }

        // renvoie de la vue correspondante avec des paramètres 
        return $this->renderView("/views/template/user/user_add.php", [
            "error" => $error,
            "message" => $message
        ]);
    }
}