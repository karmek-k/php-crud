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

function book_get_all(): array
{
    $conn = get_connection();
    $result = $conn->query('SELECT id, name, author, genre, year FROM books;');

    return $result->fetchAll();
}

function book_get_by_name(string $name): array
{
    $conn = get_connection();
    $stmt = $conn->prepare('SELECT id, name, author, genre, year FROM books WHERE name LIKE :name;');
    $stmt->execute(['name' => $name]);

    return $stmt->fetchAll();
}