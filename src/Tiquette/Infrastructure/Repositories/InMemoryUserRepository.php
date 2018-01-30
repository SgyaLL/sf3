<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Infrastructure\Repositories;

use Tiquette\Domain\User;
use Tiquette\Domain\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    private $users = [];

    public function save(User $user): void
    {
        $this->users[] = $user;
    }
}
