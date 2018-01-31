<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Command;

use AppBundle\Security\RolePromoter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tiquette\Domain\Email;

class DemoteAdminCommand extends Command
{
    private $rolePromoter;

    public function __construct(RolePromoter $rolePromoter)
    {
        $this->rolePromoter = $rolePromoter;

        parent::__construct();
    }

    public function configure()
    {
        $this
            ->setName('app:members:demote-admin')
            ->setDescription('Demote a member from admin role')
            ->setHelp('Use member\'s e-mail to remove it admin privilege')
            ->addArgument('emailMember', InputArgument::REQUIRED, 'Member\'s e-mail')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $providedEmail = new Email($input->getArgument('emailMember'));
        $output->writeln(sprintf('<info>Demoting member "%s" from admin role</info>', $providedEmail));
        $this->rolePromoter->demoteAdmin($providedEmail);
        $output->writeln(sprintf('<info>Done! %s is not anymore an admin.', $providedEmail));
    }
}
