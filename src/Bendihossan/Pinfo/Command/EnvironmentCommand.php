<?php
namespace Bendihossan\Pinfo\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bendihossan\Pinfo\Command\PinfoCommand;

class EnvironmentCommand extends PinfoCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('pinfo:env')
            ->setDescription('Lists info about your PHP environment')
            ->setHelp('The pinfo:env</info> command will list your PHP environment info.')
            ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->newSection("Environment", $output);

        $output->writeln('<info>PHP Version => </info>'.phpversion());
        $output->writeln('<info>PHP Configuration => </info>'.php_ini_loaded_file());
        $output->writeln('<info>PHP Binary => </info>'.getenv('_'));
        $output->writeln('<info>OS => </info>'.PHP_OS);
        $output->writeln('<info>Shell => </info>'.getenv('SHELL'));
        $output->writeln('<info>Term => </info>'.getenv('TERM'));

        $xdebug = 'No';
        if (extension_loaded('xdebug')) {
            $xdebug = 'Yes';
        }

        $output->writeln('<info>Xdebug loaded? => </info>'.$xdebug);

        print "\n";
    }
}
