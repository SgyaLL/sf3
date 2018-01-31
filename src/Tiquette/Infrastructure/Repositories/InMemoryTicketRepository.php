<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Infrastructure\Repositories;

use Tiquette\Domain\Ticket;
use Tiquette\Domain\TicketRepository;

class InMemoryTicketRepository implements TicketRepository
{
    private $tickets = [];

    public function save(Ticket $ticket): void
    {
        $this->tickets[] = $ticket;
    }

    public function findAll(): array
    {
        return $this->tickets;
    }
}
