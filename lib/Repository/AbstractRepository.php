<?php

use LDAP\Result;

abstract class AbstractRepository
{

    private const DATABASE_NAME = "mysql:host=db.3wa.io;port=3306;dbname=serafimhanen_project_final";
    private const DATABASE_USERNAME = "serafimhanen";
    private const DATABASE_PASSWORD = "fa5419d240b53fbd1dc843302eeaca5d";

    /**
     * Initialise PDO connection with database
     */
    private function connect()
    {
        $db = new PDO(self::DATABASE_NAME, self::DATABASE_USERNAME, self::DATABASE_PASSWORD); 
        $db->exec('SET NAMES utf8mb4');
        return $db;
    }

    /**
     * @param string $query Request in SQL
     * @param array $params Params [":variableSQL" => "valeur",...]
     * @return query result
     */
    protected function executeQuery(string $query, string $class, array $params = []): mixed
    {
        $result = null;
        // Connection BDD en PDO
        $conn = $this->connect();
        $stm = $conn->prepare($query);
        foreach ($params as $key => $param) $stm->bindValue($key, $param);
        if ($stm->execute()) {
            // récupérer les lignes de la BDD sous forme d'object
            strlen($class) && $stm->setFetchMode(PDO::FETCH_CLASS, $class);
            if ($stm->rowCount() === 1) $result = $stm->fetch();
            if ($stm->rowCount() > 1) $result = $stm->fetchAll();
        }
        
        $conn = null;
        return $result;
    }
}