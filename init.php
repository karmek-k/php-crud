<?php

$dbConfig = require 'src/utils/db_config.php';

echo "Welcome! Right now I'm preparing the database.\n";
echo "Here is the DB connection config:\n\n";

foreach ($dbConfig as $key => $value)
{
    echo $key.": ".$value."\n";
}

echo "\nYou might want to change these; if so, edit src/utils/db_config.php\n";
echo "Trying to connect to the database...\n";

$pdo = new PDO($dbConfig['dsn'], $dbConfig['username'], $dbConfig['password']);
$pdo->query('SELECT 2+2;');

echo "\nTest query succeeded!\n";
echo "Ok, I'm creating the books table...\n";

$success = $pdo->query(<<<EOF
CREATE TABLE IF NOT EXISTS books (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    author character varying(255) NOT NULL,
    genre character varying(255),
    year integer
);
EOF);

if ($success)
{
    echo "\nCreating the table succeeded. Have fun!\n";
}
else
{
    echo "\nCreating the table failed! :(\n";
}
