<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;
use Tiquette\Domain\Member;

class UserAccount implements UserInterface
{
    private $member;

    public static function fromMember(Member $member): self
    {
        return new self($member);
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return $this->member->getEncodedPassword()->getEncodedPassword();
    }

    public function getSalt()
    {
        return $this->member->getEncodedPassword()->getSalt();
    }

    public function getUsername()
    {
        return (string) $this->member->getEmail();
    }

    public function eraseCredentials()
    {
        // nothing to do
    }

    private function __construct(Member $member)
    {
        $this->member = $member;
    }
}
