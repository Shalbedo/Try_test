<?php
class User {
    public const VERSION='версия wishmaster: 2.65 qarasique edition';
    private $userName;
    private $threadsCreated=0;
    private $postSent=0;
    private $status='newfag';

    public function setUserName(string $userName) {
        $this->userName=$userName;
    }
    public function setStatus(string $status) {
        $this->status=$status;
    }
    public function setThreadsCreated(int $threadsCreated) {
        $this->threadsCreated=$threadsCreated;
    }
    public function setPostSent(int $postSent) {
        $this->postSent=$postSent;
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
    public function getThreadsCreated() {
        return($this->threadsCreated);
    }
    public function getPostSent() {
        if($this->postSent==-1){
            echo "Ты как это сделал?";
        }else {
        return($this->postSent);
        }

    }

}