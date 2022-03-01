# campus_france
Requirements

    PHP 7.2.5 or higher;
    PDO-MySQL and LDAP PHP extensions enabled;
    and the usual Symfony application requirements.

Installation

    Add environment variable :
    APP_ENV=prod

    Update environment variable in .env :
    DATABASE_URL
    MAILER_DSN

Execute command in application directory

$ npm install
$ composer install
$ bin/console  doctrine:schema:create

For update admin password, use command below and choose option 2, type your password and copy password hash value. Replace password hash in line 21 in config/packages/security.yaml

$ bin/console security:hash-password

Add crontab

$ */1 * * * * php /path/to/symfony/bin/console shapecode:cron:run

Change "/path/to/symfony" by your path.
