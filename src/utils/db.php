<?php

function get_connection(): PDO
{
    $dbConfig = require 'db_config.php';
    static $pdo;

    if ($pdo === null)
    {
        $pdo = new PDO(
            $dbConfig['dsn'],
            $dbConfig['username'],
            $dbConfig['password']
        );
    }

    return $pdo;
}

//
// I'm sorry for duplicating so much code
// Someday I will create another project using OOP
//

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

function book_get_by_id(int $id): array
{
    $conn = get_connection();
    $stmt = $conn->prepare('SELECT id, name, author, genre, year FROM books WHERE id = :id;');
    $stmt->execute(['id' => $id]);

    return $stmt->fetch() ?? [];
}

function book_add(string $name, string $author, string $genre = null, int $year = null): bool
{
    $conn = get_connection();
    $stmt = $conn->prepare(
        'INSERT INTO books (name, author, genre, year) VALUES (:name, :author, :genre, :year)'
    );

    return $stmt->execute([
        'name' => $name,
        'author' => $author,
        'genre' => $genre,
        'year' => $year,
    ]);
}

function book_delete(int $id, bool $all = false): bool
{
    $conn = get_connection();

    if (!$all)
    {
        $stmt = $conn->prepare('DELETE FROM books WHERE id = :id');

        return $stmt->execute(['id' => $id]);
    }
    else
    {
        $conn->query('TRUNCATE TABLE books;')->execute();
        return true;
    }
}
