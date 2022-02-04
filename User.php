<?php
class User
{
    public const VERSION='версия wishmaster: 2.65 qarasique edition';

    private string $userName;
    private int $threadsCreated=0;
    private int $postSent=0;
    private string $status='newfag';

    public function __construct()
    {
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getStatus()
    {
        return $this->status ?? 'Нюфаня';
    }

    public function getThreadsCreated()
    {
        return($this->threadsCreated);
    }

    public function getPostSent()
    {
        return $this->postSent;
    }

    public function setUserName(string $userName)
    {
        $this->userName=$userName;
    }

    public function setStatus(string $status)
    {
        $this->status=$status;
    }

    public function setThreadsCreated(int $threadsCreated)
    {
        $this->threadsCreated=$threadsCreated;
    }

    public function setPostSent(int $postSent)
    {
        $this->postSent=$postSent;
    }
}