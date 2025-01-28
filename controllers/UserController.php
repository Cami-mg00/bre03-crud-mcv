<?php

namespace Controllers;

class UserController
{
     // Le constructeur vide
    public function __construct()
    {
        // Rien à initialiser pour le moment
    }
    
    // Méthode pour afficher la liste des utilisateurs
    public function list(): void
    {
        $route = "users/list"; // Correspond au fichier templates/users/list.phtml
        require "templates/layout.phtml";
        echo "Afficher la liste des utilisateurs.";
    }

    // Méthode pour afficher les détails d'un utilisateur
    public function show(): void
    {
        $route = "users/show"; // Correspond au fichier templates/users/show.phtml
        require "templates/layout.phtml";
        echo "Afficher les détails d'un utilisateur";
    }

    // Méthode pour afficher le formulaire de création d'utilisateur
    public function create(): void
    {
        $route = "users/create"; // Correspond au fichier templates/users/create.phtml
        require "templates/layout.phtml";
        echo "Afficher le formulaire création";
    }

    // Méthode pour traiter les données du formulaire de création
    public function checkCreate(): void
    {
        // Traitement à implémenter plus tard
        echo "Traitement des données de création.";
    }

    // Méthode pour afficher le formulaire de mise à jour d'utilisateur
    public function update(): void
    {
        $route = "users/update"; // Correspond au fichier templates/users/update.phtml
        require "templates/layout.phtml";
        
    }

    // Méthode pour traiter les données de mise à jour utilisateurs
    public function checkUpdate(): void
    {
        // Traitement à implémenter plus tard
        echo "Données mise à jour.";
    }

    // Méthode pour supprimer un utilisateur
    public function delete(): void
    {
        // Traitement à implémenter plus tard
        echo "Suppression d'un utilisateur";
    }
}

?>