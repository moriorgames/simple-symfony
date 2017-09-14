<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Update cards with fixtures data in the database.
 *
 * Class UpdateCardsCommand
 * @package AppBundle\Command
 */
class HelloWorldCommand extends ContainerAwareCommand
{
    const COMMAND_NAME = 'app:hello-world';

    /**
     * Configure the Command Line explaining the purpose and the optional or required parameters.
     */
    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Prints Hello "name" where a name is a dynamic parameter')
            ->addOption('name', null, InputOption::VALUE_OPTIONAL, 'Name to print in Hello World command');
    }

    /**
     * This method is executed after interact() and initialize(). It usually
     * contains the logic to execute to complete this command task.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getOption('name');
        if (!$name) {
            $name = 'World';
        }

        $output->writeln(sprintf('Hello %s', $name));
    }
}
