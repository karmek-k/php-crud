<?php
    require 'utils/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        book_delete(0, true);
        header('Location: /');
    }
?>

<?php require 'layout/header.php'; ?>

Are you sure that you want to delete <b>ALL books</b>?
<form method="post">
    <input type="submit" value="Yes" />
</form>

<?php require 'layout/footer.php'; ?>


