<?php

function get_connection(): PDO
{
    $dbConfig = require 'db_config.php';
    return new PDO(
        $dbConfig['dsn'],
        $dbConfig['username'],
        $dbConfig['password']
    );
}

