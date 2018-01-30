<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

class Member
{
    private $email;
    private $nickname;
    private $encodedPassword;

    public static function signUp(Email $email, string $nickname, EncodedPassword $encodedPassword): self
    {
        return new self($email, $nickname, $encodedPassword);
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getEncodedPassword(): EncodedPassword
    {
        return $this->encodedPassword;
    }

    private function __construct(Email $email, string $nickname, EncodedPassword $encodedPassword)
    {
        $this->email = $email;
        $this->nickname = $nickname;
        $this->encodedPassword = $encodedPassword;
    }
}
