<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Security;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Tiquette\Domain\Email;
use Tiquette\Domain\MemberNotFound;
use Tiquette\Domain\MemberRepository;

class MemberAccountUserProvider implements UserProviderInterface
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function loadUserByUsername($username): UserInterface
    {
        try {
            $member = $this->memberRepository->findByEmail(new Email($username));

            return UserAccount::fromMember($member);

        } catch (MemberNotFound $e) {

            // The UserProviderInterface states that we must throw a UsernameNotFoundException
            // when the user could not be found in the provider implementation.

            throw new UsernameNotFoundException(sprintf('User with username "%s" was not found.', $username));
        }
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class): bool
    {
        return $class === UserAccount::class;
    }
}
