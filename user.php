<?php
class User {
    public const VERSION='версия wishmaster: 2.65 qarasique edition';
    private $userName;
    private $threadsCreated;
    private $postSent;
    private $status='newfag';

    public function setUserName($userName) {
        $this->userName=$userName;
    }
    public function setStatus($status) {
        $this->status=$status;
    }
    public function getUserName() {
        if (!$this->userName){
            echo 'Имя пользователя не задано';
        } else {
        return($this->userName);
        }
    }
    public function getStatus() {
        if (!$this->userName){
            echo 'Статус: Нюфаня';
        } else {
        return($this->status);
        }
    }
}