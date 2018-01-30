<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
