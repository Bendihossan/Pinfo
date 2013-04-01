<?php
namespace Bendihossan\Pinfo\Command;

use Console_Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bendihossan\Pinfo\Command\PinfoCommand;

class ExtensionsCommand extends PinfoCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('pinfo:exts')
            ->setDescription('Lists your PHP extensions.')
            ->setHelp('The <info>pinfo:env</info> lists your environment specific info')
            ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->newSection("Loaded Extensions", $output);

        $extensions = get_loaded_extensions();
        // Sort an array using a case insensitive "natural order" algorithm
        natcasesort($extensions);

        $table = new Console_Table();

        $table->setHeaders(array('Ext. Name'));

        foreach ($extensions as $extension) {
            $table->addRow(array($extension));
        }

        $output->write($table->getTable());

        print "\n";
    }
}
