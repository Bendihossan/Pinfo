Pinfo!
====================

I'm constantly switching between three different computers with different operating systems and development environments: desktop, laptop and work computer. Because of that I'm terrible at remembering what version of PHP I'm using, which extensions are loaded and so on.
Pinfo! is a simple application to remind you what's loaded and available on this computer. This was an experiment for me in building a CLI tool in PHP.

Current build status: [![Build Status](https://travis-ci.org/Bendihossan/Pinfo.png)](https://travis-ci.org/Bendihossan/Pinfo)

Basic Usage
====================
Pinfo! uses the Symfony Console component to register commands.

Run ``php console.php`` to find out the available commands:
```
Available commands:
  all    Lists all your environment info.
  env    Lists info about your PHP environment
  exts   Lists your PHP extensions.
```

Coming soon!
====================

* More options
* Bundled ``pinfo.phar`` in the bin/ directory.
* Tests

Contribute
====================
1. Fork the repository and download the source to your development workspace and run ``bin/composer install``.
2. Checkout a branch for your code
3. Write the logic for your command in ``src/Bendihossan/Pinfo/pinfo.php``.
4. Register a new command in ``console.php``.
5. Write unit tests for your command.
6. Commit and push your code to GitHub, make a Pull Request to the Pinfo! project.

Contact
====================
Contact: [contact@steffanharries.me.uk](mailto:contact@steffanharries.me.uk)
