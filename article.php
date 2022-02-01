<?php
class Article {
    private $text;

    public function setText(string $text) {
        $this->text=$text;
    }
    public function getVolume() {
        if (!$this->text){
            echo 'Текст-то закинь, чел';
        } else {
        return(mb_strlen($this->text));
        }
    }
}