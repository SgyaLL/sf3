<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Security;

use Tiquette\Domain\Email;
use Tiquette\Domain\MemberRepository;

class RolePromoter
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function promoteAdmin(Email $email): void
    {
        $member = $this->memberRepository->findByEmail($email);
        $member->promoteAdmin();
        $this->memberRepository->save($member);
    }

    public function demoteAdmin(Email $email): void
    {
        $member = $this->memberRepository->findByEmail($email);
        $member->demoteAdmin();
        $this->memberRepository->save($member);
    }
}
