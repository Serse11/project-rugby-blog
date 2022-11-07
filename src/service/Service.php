<?php 

class Service {

/*fonction qui verifie si l'utilisateur est connecté*/
    public static function checkIfUserIsConnected() {
            $user_is_connected = false;
            $userRepository =  new UserRepository();
            if (
                isset(
                    $_SESSION["user_is_connected"],
                    $_SESSION["user_id"]
                )
                && $_SESSION["user_is_connected"]
                && $userRepository->find($_SESSION["user_id"])
            ) {
                $user_is_connected = true;
            }
            return $user_is_connected;
    }

/*fonction qui permet de télécharger une image en bdd pour la creation d'article*/
    public static function moveFile(array $file): ?string
    {
        $file_path_image = null;
        $folder = dirname(__DIR__, 2) . "/public/assets/images/upload/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $filename = self::renameFile($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $folder . $filename)) {
            $file_path_image = $filename;
        }
        return $file_path_image;
    }
    
/*fonction qui renommme l'image avec la date a la quelle elle a etait telecharger*/
    private static function renameFile(string $filename): string
    {
        $array = explode(".", $filename);
        return (new DateTime("now"))->format("Ymdhis") . "." . end($array);
    }
}