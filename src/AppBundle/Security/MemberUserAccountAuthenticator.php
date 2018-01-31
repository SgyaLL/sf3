<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Tiquette\Domain\Member;

class MemberUserAccountAuthenticator
{
    private $tokenStorage;
    private $session;
    private const FIREWALL_NAME = 'main';
    private const FIREWALL_CONTEXT_NAME = '_security_main';

    public function __construct(TokenStorageInterface $tokenStorage, SessionInterface $session)
    {
        $this->tokenStorage = $tokenStorage;
        $this->session = $session;
    }

    public function authenticate(Member $member): void
    {
        $userAccount = UserAccount::fromMember($member);

        $token = new UsernamePasswordToken($userAccount, null, self::FIREWALL_NAME, $userAccount->getRoles());
        $this->tokenStorage->setToken($token);
        $this->session->set(self::FIREWALL_CONTEXT_NAME, serialize($token));
    }
}
