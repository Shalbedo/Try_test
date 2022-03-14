<?php

namespace App\Database;

use PDO;
use App\Entity\User;

class MySqlConnection extends PDO
{
    public function __construct($dsn, $username = null, $password = null, $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

    public function createUserTable(): bool
    {
        $statement = $this->prepare(
            'CREATE TABLE IF NOT EXISTS `user` (
                id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(255),
                email VARCHAR(255),
                gender VARCHAR(255)
            );'
        );

        return $statement->execute();
    }

    public function addUserRecord(User $user): bool
    {
        $statement = $this->prepare("INSERT INTO `user`(name, email, gender) values (?,?,?)");

        return $statement->execute(
            [
                $user->getUserName(),
                $user->getEmail(),
                $user->getGender(),
            ]
        );
    }

    public function selectAllUsersFromUserTable(): array
    {
        $statement = $this->prepare("SELECT * FROM `user`");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
