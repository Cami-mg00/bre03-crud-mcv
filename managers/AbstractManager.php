<?php

namespace Managers;

use PDO;
use PDOException;

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        // Paramètres de connexion spécifiques à 3WA
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "camillemounier_crud_mvc";
        $user = "camillemounier";
        $password = "922b2543764177289574eb62d821c069";

        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        try {
            $this->db = new PDO(
                $connexionString,
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active le mode exception en cas d'erreur
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retourne les résultats sous forme de tableaux associatifs
                ]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
