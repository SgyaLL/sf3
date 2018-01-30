<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Domain;

interface UserRepository
{
    public function save(User $user): void;
}
