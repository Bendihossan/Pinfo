<?php
namespace Bendihossan\Pinfo\Tests\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Bendihossan\Pinfo\Command\EnvironmentCommand;
use Bendihossan\Pinfo\Command\ExtensionsCommand;

class CommandTest extends \PHPUnit_Framework_TestCase
{
    protected function getCommandTester($commandString)
    {
        $application = new Application();
        $application->add(new EnvironmentCommand());
        $application->add(new ExtensionsCommand());

        $command = $application->find($commandString);
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        return $commandTester;
    }

    public function testExecuteEnvironmentCommand()
    {
        $commandTester = $this->getCommandTester('env');

        $this->assertContains('Environment', $commandTester->getDisplay());
        $this->assertContains('PHP Version => '.phpversion(), $commandTester->getDisplay());
        $this->assertContains('PHP Configuration => '.php_ini_loaded_file(), $commandTester->getDisplay());
        $this->assertContains('PHP Binary => '.getenv('_'), $commandTester->getDisplay());
        $this->assertContains('OS => '.PHP_OS, $commandTester->getDisplay());
        $this->assertContains('Shell => '.getenv('SHELL'), $commandTester->getDisplay());
        $this->assertContains('Term => '.getenv('TERM'), $commandTester->getDisplay());

        $xdebug = 'No';
        if (extension_loaded('xdebug')) {
            $xdebug = 'Yes';
        }

        $this->assertContains('Xdebug loaded? => '.$xdebug, $commandTester->getDisplay());
    }

    public function testExecuteExtensionsCommand()
    {
        $commandTester = $this->getCommandTester('exts');

        $extensions = get_loaded_extensions();
        foreach ($extensions as $extension) {
            $this->assertContains($extension, $commandTester->getDisplay());
        }
    }
}
