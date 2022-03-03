<?php

namespace App\Entity;

class User
{
    public const VERSION = 'версия wishmaster: 2.65 qarasique edition';
    public const USER_GENDERS = [
        'MAN',
        'WOMAN'
    ];

    private string $username;
    private string $email;
    private int $threadsCreated = 0;
    private int $postSent = 0;
    private string $gender = 'MAN';
    private string $status = 'newfag';

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username=$username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getStatus()
    {
        return $this->status ?? 'Нюфаня';
    }

    public function setStatus(string $status)
    {
        $this->status=$status;
    }

    public function getPostSent()
    {
        return $this->postSent;
    }
    public function setPostSent(int $postSent)
    {
        $this->postSent=$postSent;
    }

    public function getThreadsCreated()
    {
        return($this->threadsCreated);
    }

    public function setThreadsCreated(int $threadsCreated)
    {
        $this->threadsCreated=$threadsCreated;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }
}
