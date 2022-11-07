<?php

require_once dirname(__DIR__, 2) . "/lib/Repository/AbstractRepository.php";
require_once dirname(__DIR__) . "/Model/User.php";

class UserRepository extends AbstractRepository
{

    /**
     * @param string $username
     * @return mixed une valeur 
     * fonction qui permet de trouver un utilisateur par sont username, pratique pour la connexion
     */
    public function findOneByUsername(string $username): mixed
    {
        $query = " SELECT * 
                  FROM user 
                  WHERE username = :username ;
                ";
        $params = [":username" => $username];
        return $this->executeQuery($query, "User", $params);
    }

    /**
     * @param User $user prend en paramètre un onject User
     * @return mixed une valeur 
     * fonction qui permet de créer un nouvel utilisateur
     */
    public function insert(User $user): mixed
    {
        $query = "INSERT INTO user(lastname, firstname, username, password) 
                  VALUES(:lastname, :firstname, :username, :password);";
        $params = [
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":username" => $user->getUsername(),
            ":password" => $user->getPassword()
        ];
        return $this->executeQuery($query, "User", $params);
    }

    /**
     * @param int $id user
     * @return User
     * fonction qui permet de trouver un utilisateur par son id 
     */
    public function find(int $id): mixed
    {
        $query = " SELECT * 
                  FROM user 
                  WHERE id = :id ;
                ";
        $params = [":id" => $id];
        return $this->executeQuery($query, "User", $params);
    }
}