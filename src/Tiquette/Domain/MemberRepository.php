<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

interface MemberRepository
{
    public function save(Member $member): void;
}
