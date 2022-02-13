<?php
include 'Form.php';
$dsn= "mysql:dbname=main;host=database";
$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$comment=$_POST['comment'];
$username= "root";
$password= "password";
try {
    $db= new PDO($dsn, $username, $password); // Переменная с текущим подключением к базе данных
    echo "suca\n";
} catch (PDOException $e) {
    echo $e->getMessage();
}
function createTable ($db) {
    $statement=$db->prepare("CREATE TABLE IF NOT EXISTS user (
        Name varchar(255),
        Email varchar(255),
        Gender varchar(255),
        Comment varchar(255),
        )");
    $statement->execute();
}
function addRecord ($db, $name, $email, $gender, $comment) {
    $statement=$db->prepare("insert into user(Name,Email,Gender,Comment) values (?,?,?,?)");
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

addRecord ($db, $name, $email, $gender, $comment);
showTable ($db);
