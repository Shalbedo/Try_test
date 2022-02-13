<?php
include '/var/www/app/src/Handler/Form.php';

$dsn = 'mysql:host=database;dbname=main;port=3306';
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$gender = $_POST['gender'] ?? null;
$comment = $_POST['comment'] ?? null;
$username = "root";
$password = "password";

try {
    $db = new PDO($dsn, $username, $password); // Переменная с текущим подключением к базе данных
} catch (PDOException $e) {
    echo "EXCEPTION: ";
    echo $e->getMessage();
}
function createTable (PDO $db) {
    $statement = $db->prepare('CREATE TABLE IF NOT EXISTS `user` (
        id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        email VARCHAR(255),
        gender VARCHAR(255),
        comment VARCHAR(255)
        );');
    $statement->execute();
}
function addRecord ($db, $name, $email, $gender, $comment) {
    $statement=$db->prepare("INSERT INTO user(name, email, gender, comment) values (?,?,?,?)");
    $statement->execute([$name, $email, $gender, $comment]);
}
function showTable ($db){
    $statement=$db->prepare("select * from user");
    $statement->execute(); // execute - выполняет запрос к БД/
    while ($data=$statement->fetch()) { // fetch - получить результат выполнения запроса (одну строчку)
        print_r($data);
    }
}
createTable($db);

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    if (!isset($_POST["name"])){
        Throw new Exception("Name is required");
    } else {
        $name=checktext($_POST["name"]);
    }
    if (!isset($_POST["email"])){
        Throw new Exception("email is required");
    } else {
        $email=checktext($_POST["email"]);
    }
    if (!isset($_POST["comment"])){
        $comment="";
    } else {
    $comment=checktext($_POST["comment"]);
    }
}
function checktext($data)
{
    $data=trim($data); // убирает пробелы из начала и конца строки
    $data=stripslashes($data); // удаляет слеши
    $data=htmlspecialchars($data); // Преобразует специальные символы в HTML сущности
    return $data;
}

addRecord($db, $name, $email, $gender, $comment);
showTable($db);
