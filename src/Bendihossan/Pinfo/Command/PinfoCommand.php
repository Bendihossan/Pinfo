<?php
namespace Bendihossan\Pinfo\Command;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

class PinfoCommand extends Command
{
    /**
     * @Prints a message before a section of info.
     *
     * @param string $sectionMessage Message to be printed for this section
     * @param OutputInterface $output Allows us to write to the console.php in colour
     */
    protected function newSection($sectionMessage, OutputInterface $output)
    {
        $output->writeln('<comment>'.$sectionMessage.': </comment>');
    }
}
