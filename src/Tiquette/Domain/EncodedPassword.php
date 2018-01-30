<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

class EncodedPassword
{
    private $encodedPassword;
    private $salt;

    public function __construct(string $encodedPassword, string $salt)
    {
        $this->encodedPassword = $encodedPassword;
        $this->salt = $salt;
    }

    public function getEncodedPassword(): string
    {
        return $this->encodedPassword;
    }

    public function getSalt(): string
    {
        return $this->salt;
    }

    public function __toString()
    {
        return sprintf('%s{%s}', $this->encodedPassword, $this->salt);
    }
}
