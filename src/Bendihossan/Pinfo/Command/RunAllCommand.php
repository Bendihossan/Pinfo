<?php

namespace Bendihossan\Pinfo\Command;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bendihossan\Pinfo\Command\PinfoCommand;

class RunAllCommand extends PinfoCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('pinfo:all')
            ->setDescription('Lists all your environment info.')
            ->setHelp('The <info>pinfo:all</info> lists your environment specific info');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = $this->getApplication()->find('pinfo:env');

        $arguments = array(
            'command' => 'pinfo:env'
        );

        $input = new ArrayInput($arguments);
        $returnCode = $command->run($input, $output);

        $command = $this->getApplication()->find('pinfo:exts');

        $arguments = array(
            'command' => 'pinfo:exts'
        );

        $input = new ArrayInput($arguments);
        $returnCode = $command->run($input, $output);
    }
}
