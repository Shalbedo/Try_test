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

        if (!$data['email']) {
            throw new InvalidArgumentException('email is required');
        }
    }

    public function sanitizeText(array &$data)
    {
        foreach ($data as $input) {
            trim($input); // убирает пробелы из начала и конца строки
            stripslashes($input); // удаляет слеши
            htmlspecialchars($input); // Преобразует специальные символы в HTML сущности
        }
    }
}