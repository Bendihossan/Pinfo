#!/usr/bin/env php
<?php

set_time_limit(0);
$loader = require 'vendor/autoload.php';

use Symfony\Component\Console\Application;
use Bendihossan\Pinfo\Command\EnvironmentCommand;
use Bendihossan\Pinfo\Command\ExtensionsCommand;
use Bendihossan\Pinfo\Command\RunAllCommand;

$console = new Application();

$console->add(new RunAllCommand());
$console->add(new EnvironmentCommand);
$console->add(new ExtensionsCommand);

$console->run();
