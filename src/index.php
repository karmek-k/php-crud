<?php
    require 'utils/db.php';
    $nameInQuery = isset($_GET['name']);

    if ($nameInQuery)
    {
        $books = book_get_by_name($_GET['name']);
    }
    else
    {
        $books = book_get_all();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Book Manager</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="favicon.png" />
</head>
<body>
    <main>
        <h1>PHP Book Manager</h1>
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
                    <td><?php echo htmlspecialchars($book['name']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td><?php echo htmlspecialchars($book['year']); ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            }
        ?>
    </main>
</body>
</html>