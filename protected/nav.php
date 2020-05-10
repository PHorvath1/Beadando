<a href="index.php">Home</a>
<?php if (IsUserLoggedIn()) : ?>
    <a href="index.php?P=forum">Forum</a>
    <?php if($_SESSION['permission'] >= 2) : ?>
        <a href="index.php?P=list_user">List Users</a>
    <?php endif; ?>
<?php endif; ?>