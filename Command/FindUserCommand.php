<?php

namespace Redeye\StormpathBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\Table;

class FindUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('redeye:stormpath:find-user')
            ->setDescription('Find a user in Stormpath')
            ->addArgument('email', InputArgument::REQUIRED, 'Customer id to update')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getContainer()->get('stormpath_application');
        $list = $app->getAccounts()->setSearch(['email' => $input->getArgument('email')]);
        $account = $list->getIterator()->current();

        $table = new Table($output);
        $table
            ->setHeaders(array('Id', 'E-mail', 'Name', 'Status'))
            ->setRows(array(
                array($account->getHref(), $account->getEmail(), $account->getFullName(), $account->getStatus()),
            ))
        ;
        $table->render();
    }
}
