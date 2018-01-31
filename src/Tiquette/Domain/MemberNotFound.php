<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;


use Tiquette\Exception;

class MemberNotFound extends \DomainException implements Exception
{
    public static function unknownEmail(Email $email): self
    {
        return new self(sprintf('Member with email "%s" not found.', $email));
    }
}
