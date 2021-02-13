<?php
    require 'utils/db.php';

    $errors = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // meh, it's so tedious without a framework...
        $name = htmlspecialchars($_POST['name']);
        $author = htmlspecialchars($_POST['author']);
        $genre = htmlspecialchars($_POST['genre']);
        $year = (int) $_POST['year'];

        $errors = !book_add($name, $author, $genre, $year);

        if (!$errors)
        {
            header('Location: /');
        }
    }
?>

<?php require 'layout/header.php' ?>

<?php if ($errors) echo 'Error while adding book to the database'; ?>

<form method="post">
    <p>
        <label for="book-name">Name</label>
        <input id="book-name" name="name" required />
    </p>

    <p>
        <label for="book-author">Author</label>
        <input id="book-author" name="author" required />
    </p>

    <p>
        <label for="book-genre">Genre</label>
        <input id="book-genre" name="genre" />
    </p>

    <p>
        <label for="book-year">Year</label>
        <input id="book-year" name="year" type="number" />
    </p>

    <input type="submit" value="Submit" />
</form>

<?php require 'layout/footer.php' ?>
