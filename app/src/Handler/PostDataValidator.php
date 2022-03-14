<?php

namespace App\Handler;

use InvalidArgumentException;

class PostDataValidator
{
    public function validate(array $data)
    {
        if (!$data['name']) {
            throw new InvalidArgumentException('Name is required');
        }
        if (!preg_match("/^[а-яёА-ЯЁa-zA-Z-' ]*$/u", $data['name'])) {
            throw new InvalidArgumentException('Only letters and white space allowed');
        }

        if (!$data['email']) {
            throw new InvalidArgumentException('email is required');
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email');
        }

        if (!$data['gender']) {
            throw new InvalidArgumentException('gender is required');
        }
    }

    public function sanitizeText(array &$data)
    {
        foreach ($data as $input) {
            trim($input); // убирает пробелы из начала и конца строки
            stripslashes($input); // удаляет бекслеши
            htmlspecialchars($input); // Преобразует специальные символы в HTML сущности
        }
    }
}