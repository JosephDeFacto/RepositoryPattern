<?php

namespace App;

use App\Database\DatabaseConnection;


class UserRepository implements UserRepositoryInterface
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }


    public function add(User $user)
    {
        $query = "INSERT INTO user (firstname, lastname, createdAt) VALUES (?, ?, ?)";
        $stmt = $this->connection->getConnection()->prepare($query);
        $stmt->execute([$user->getFirstname(), $user->getLastname(), $user->getCreatedAt()]);

        $stmt = null;
    }

    public function findBy($id): User
    {
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->connection->getConnection()->prepare($query);
        $stmt->execute([$id]);
        $arr = $stmt->fetch();
        if (!$arr) {
            exit("Failed");
        }
        $stmt = null;

        $user = new User($arr['firstname'], $arr['lastname']);
        $user->setId($arr['id']);
        $user->setFirstname($arr['firstname']);
        $user->setLastname($arr['lastname']);
        return $user;
    }
}