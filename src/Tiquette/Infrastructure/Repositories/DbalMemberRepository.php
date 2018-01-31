<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Infrastructure\Repositories;

use Doctrine\DBAL\Connection;
use Tiquette\Domain\Email;
use Tiquette\Domain\Member;
use Tiquette\Domain\MemberNotFound;
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

    public function findByEmail(Email $email): Member
    {
        $query =<<<SQL
SELECT * FROM members WHERE email = :email LIMIT 1;
SQL;

        $statement = $this->connection->prepare($query);
        $statement->execute(['email' => $email]);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        if (null !== $row) {

            return $this->hydrateFromRow($row);
        }

        throw MemberNotFound::unknownEmail($email);
    }

    private function hydrateFromRow(array $row): Member
    {
        return Member::fromArray($row);
    }
}
