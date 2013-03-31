<?php

call_user_func(
    function () {
        if (!is_file($autoloadFile = 'vendor/autoload.php')) {
            throw new \RuntimeException('Could not find vendor/autoload.php. Did you run "composer install --dev"?');
        }

        require $autoloadFile;
    }
);
