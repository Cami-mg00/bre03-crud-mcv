<?php

namespace Managers;

use PDO;
use PDOException;

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=localhost;dbname=camillemounier_crud_mvc;charset=utf8',
                'camillemounier', // Remplace par ton utilisateur MySQL
                '922b2543764177289574eb62d821c069', // Remplace par ton mot de passe MySQL
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
