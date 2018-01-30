<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Infrastructure\Repositories;

use Doctrine\DBAL\Connection;
use Tiquette\Domain\Member;
use Tiquette\Domain\MemberRepository;

class DbalMemberRepository implements MemberRepository
{
    private $connection;

    public  function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function save(Member $member): void
    {
        $data = [
            'email' => (string) $member->getEmail(),
            'nickname' => $member->getNickname(),
            'encoded_password' => $member->getEncodedPassword()->getEncodedPassword(),
            'password_salt' => $member->getEncodedPassword()->getSalt(),
        ];

        $this->connection->insert('members', $data);
    }
}
