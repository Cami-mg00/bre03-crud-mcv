<?php

namespace Controllers;

use Managers\UserManager;
use Models\User;

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
    }

    // Méthode pour afficher les détails d'un utilisateur
    public function show(): void
    {
        $route = "users/show"; // Correspond au fichier templates/users/show.phtml
        require "templates/layout.phtml";
    }

    // Méthode pour afficher le formulaire de création d'utilisateur
    public function create(): void
    {
        $route = "users/create"; // Correspond au fichier templates/users/create.phtml
        require "templates/layout.phtml";
    }

    // Méthode pour traiter les données du formulaire de création
    public function checkCreate(): void
    {
        // 1. Récupérer les données du formulaire
        $email = $_POST['email'] ?? null;
        $firstName = $_POST['first_name'] ?? null;
        $lastName = $_POST['last_name'] ?? null;

        // Vérification des champs obligatoires
        if (!$email || !$firstName || !$lastName) {
            die("Tous les champs sont requis !");
        }

        // 2. Hydrater une instance de User
        $newUser = new User(null, $email, $firstName, $lastName);

        // 3. Instancier le UserManager et appeler la méthode create()
        $userManager = new UserManager();
        $isCreated = $userManager->create($newUser);

        if (!$isCreated) {
            die("Erreur lors de la création de l'utilisateur.");
        }

        // 4. Rediriger vers la liste des utilisateurs
        header("Location: index.php?route=list_users");
        exit();
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
        echo "Traitement des données de mise à jour.";
    }

    // Méthode pour supprimer un utilisateur
    public function delete(): void
    {
        // Traitement à implémenter plus tard
        echo "Suppression d'un utilisateur.";
    }
}
