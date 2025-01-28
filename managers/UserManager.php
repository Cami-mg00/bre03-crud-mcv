<?php

namespace Managers;

use Models\User;
use PDO;

class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    // Récupère toutes les données de la table et retourne un tableau d'instances du Model (User)
    public function findAll(): array
    {
        $query = $this->db->query("SELECT * FROM users");
        $usersData = $query->fetchAll();

        $users = [];
        foreach ($usersData as $data) {
            $users[] = new User(
                $data['id'],
                $data['email'],
                $data['first_name'],
                $data['last_name']
            );
        }

        return $users;
    }

    // Récupère une ligne de la table par son ID et la retourne en tant qu'instance de User
    public function findOne(int $id): ?User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute(['id' => $id]);
        $data = $query->fetch();

        if ($data) {
            return new User(
                $data['id'],
                $data['email'],
                $data['first_name'],
                $data['last_name']
            );
        }

        return null;
    }

    // Crée une nouvelle entrée dans la table à partir d'une instance de User
    public function create(User $user): bool
    {
        $query = $this->db->prepare("INSERT INTO users (email, first_name, last_name) VALUES (:email, :first_name, :last_name)");
        return $query->execute([
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName()
        ]);
    }

    // Met à jour une ligne de la table à partir d'une instance de User
    public function update(User $user): bool
    {
        $query = $this->db->prepare("UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name WHERE id = :id");
        return $query->execute([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName()
        ]);
    }

    // Supprime une ligne de la table à partir d'une instance de User
    public function delete(User $user): bool
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $query->execute(['id' => $user->getId()]);
    }
}

?>