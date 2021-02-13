<?php
    require 'utils/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (isset($_POST['id']))
        {
            book_delete($_POST['id']);
        }

        header('Location: /');
    }

    if (!isset($_GET['id']))
    {
        header('Location: /');
    }
?>

<?php require 'layout/header.php'; ?>

Are you sure that you want to delete this book?
<form method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
    <input type="submit" value="Yes" />
</form>

<?php require 'layout/footer.php'; ?>

