#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Bendihossan\Pinfo\Compiler;

error_reporting(-1);
ini_set('display_errors', 1);

try {
    $compiler = new Compiler();
    $compiler->compile();
} catch (\Exception $e) {
    echo 'Failed to compile phar: ['.get_class($e).'] '.$e->getMessage().' at '.$e->getFile().':'.$e->getLine();
    exit(1);
}