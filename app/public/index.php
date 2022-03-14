<?php

require_once '/var/www/app/vendor/autoload.php';
require_once '/var/www/app/src/Handler/Form.php';

use App\Database\MySqlConnection;
use App\Handler\PostDataValidator;
use App\Handler\OutputGenerator;
use App\Entity\User;

$dsn = 'mysql:host=database;dbname=main;port=3306';

$username = "root";
$password = "password";

try {
    $db = new MySqlConnection($dsn, $username, $password); // Переменная с текущим подключением к базе данных
} catch (PDOException $e) {
    echo "EXCEPTION: " . $e->getMessage() . "<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'] ?? null,
        'email' => $_POST['email'] ?? null,
        'comment' => $_POST['comment'] ?? null,
        'gender' => $_POST['gender'] ?? null
    ];

    $validator = new PostDataValidator();
    $validator->sanitizeText($data);
    $validator->validate($data);



    $user = new User();
    $user->setEmail($data['email']);
    $user->setUsername($data['name']);
    $db->createUserTable();

    $success = $db->addUserRecord($user);

    if ($success) {
        (new OutputGenerator())->printTable($db->selectAllUsersFromUserTable());
    }
}
