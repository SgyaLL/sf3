<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

class User
{
    private $userName;
    private $userPassword;
    private $userEmail;


    public static function submit(string $userName, string $userPassword, string $userEmail): self
    {
        return new self($userName, $userPassword, $userEmail);
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getUserPassword(): string
    {
        return $this->userPassword;
    }
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    private function __construct(string $userName, string $userPassword, string $userEmail)
    {
        $this->userName = $userName;
        $this->userPassword = $userPassword;
        $this->userEmail = $userEmail;

    }
}
