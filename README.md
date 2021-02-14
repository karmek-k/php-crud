# php-crud
An example book manager using vanilla PHP.

## Installation
You should have PHP7 (or higher) installed.
You will also need a RDBMS (I used PostgreSQL, but I think others will work as well)
and its PDO driver.

Review the DB credentials in `src/utils/db_config.php`:
```php
<?php

return [
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=php-book-mgr',
    'username' => 'php-book-mgr',
    'password' => 'you-cannot-guess',
];
```

Set them to whatever you want.
After that, run `init.php`.
```
php init.php
```

You should receive a nice message saying that the `books` table has been created.

Now can test the app using the built-in PHP server:
```
php -S localhost:8000 -t src
```

If you get an error, **make sure that you have enabled the desired PDO extension!**
