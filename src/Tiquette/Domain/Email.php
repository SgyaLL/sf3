<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

use Tiquette\Utils\Ensure;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        Ensure::email($email);

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
