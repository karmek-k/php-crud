<?php
    require 'utils/db.php';
    $nameInQuery = isset($_GET['name']);

    if ($nameInQuery)
    {
        $bookName = $_GET['name'];

        // redirect to home if book name is not present
        if ($bookName === '')
        {
            header('Location: /');
        }

        $books = book_get_by_name($bookName);
    }
    else
    {
        $books = book_get_all();
    }
?>

<?php require 'layout/header.php'; ?>

<form method="get" class="search-form">
    <label for="book-name">Search for a book:</label>
    <input
        id="book-name"
        value="<?php echo $nameInQuery ? htmlspecialchars($bookName) : ''; ?>"
        name="name"
    />
    <input type="submit" value="Search" />
</form>

<?php
    if ($books === [])
    {
        if ($nameInQuery)
        {
            echo 'No such book found!';
        }
        else
        {
            echo 'No books in the database!';
        }
    }
    else
    {
?>
<table>
    <tbody>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>
        <?php
            foreach ($books as $book)
            {
        ?>
        <tr>
            <td>
                <a href="book.php?id=<?php echo htmlspecialchars($book['id']); ?>">
                    <?php echo htmlspecialchars($book['name']); ?>
                </a>
            </td>
            <td><?php echo htmlspecialchars($book['author']); ?></td>
            <td><?php echo htmlspecialchars($book['genre']); ?></td>
            <td>
                <?php
                    echo htmlspecialchars(
                            $book['year'] !== 0 ? $book['year'] : 'unknown'
                    );
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php
    }
?>

<a href="create.php">Create a new book entry</a>
<a href="delete_all.php">Delete all books</a>

<?php require 'layout/footer.php'; ?>