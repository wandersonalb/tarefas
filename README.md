DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.

Installing Composer
If you do not already have Composer installed, you may do so by following the instructions at getcomposer.org. On Linux and Mac OS X, you'll run the following commands:

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer


On Windows, you'll download and run Composer-Setup.exe.

composer install

config db

create database vazio

php yii migrate