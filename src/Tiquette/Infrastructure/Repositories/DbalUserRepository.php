<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Infrastructure\Repositories;

use Doctrine\DBAL\Connection;
use Tiquette\Domain\User;
use Tiquette\Domain\UserRepository;

class DbalUserRepository implements UserRepository
{
    private $connection;

    public  function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): void
    {
        $data = [
            'user_name' => $user->getUserName(),
            'user_password' => $user->getUserPassword(),
            'user_email' => $user->getUserEmail(),

        ];

        $this->connection->insert('users', $data);
    }
}
