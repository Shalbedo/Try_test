<?php

namespace App\Entity;

class Article
{
    private string $text;
    private User $author;
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTextVolume()
    {
        return mb_strlen($this->text);
    }

    public function setText(string $text)
    {
        if (!mb_strlen($text)) {
            throw new Exception('Текст введи, чмонь');
        }
        $this->text=$text;
    }
}