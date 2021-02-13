<?php
    require 'utils/db.php';
    $bookId = $_GET['id'];

    if (isset($bookId))
    {
        $book = book_get_by_id($bookId);
        if ($book === [])
        {
            header('Location: /');
        }
    }
    else
    {
        $book = null;
        header('Location: /');
    }
?>

<?php require 'layout/header.php'; ?>

<p>
    <b>Book name: </b><?php echo htmlspecialchars($book['name']) ?>
</p>

<p>
    <b>Author: </b><?php echo htmlspecialchars($book['author']) ?>
</p>

<?php
if ($book['genre'])
{
?>
<p>
    <b>Genre: </b><?php echo htmlspecialchars($book['genre']) ?>
</p>
<?php
}
?>

<?php
if ($book['year'])
{
?>
<p>
    <b>Release year: </b><?php echo htmlspecialchars($book['year']) ?>
</p>
<?php
}
?>

<?php require 'layout/footer.php'; ?>

