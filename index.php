<?php

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
