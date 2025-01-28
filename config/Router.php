<?php

namespace Config;

use Controllers\UserController;

class Router
{
    // Le constructeur vide
    public function __construct()
    {
        // Rien à initialiser pour le moment
    }
     // Méthode pour gérer les requêtes
    public function handleRequest(array $get): void
    {
        // Instancie le UserController
        $controller = new UserController();

        // Vérifie la route demandée
        if (isset($get["route"]) && $get["route"] === "show_user") {
            // Appelle la méthode show()
             $controller->show();
        } elseif (isset($get["route"]) && $get["route"] === "create_user") {
            // Appelle la méthode create()
            $controller->create();
        } elseif (isset($get["route"]) && $get["route"] === "check_create_user") {
            // Appelle la méthode checkCreate()
            $controller->checkCreate();
        } elseif (isset($get["route"]) && $get["route"] === "update_user") {
            // Appelle la méthode update()
            $controller->update();
        } elseif (isset($get["route"]) && $get["route"] === "check_update_user") {
            // Appelle la méthode checkUpdate()
            $controller->checkUpdate();
        } elseif (isset($get["route"]) && $get["route"] === "delete_user") {
            // Appelle la méthode delete()
            $controller->delete();
        } else {
            // Dans tous les autres cas, liste les utilisateurs
            $controller->list();
        }
    }
}
?>
