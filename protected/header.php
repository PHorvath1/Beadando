<div>
    <h5><?=IsUserLoggedIn() ? $_SESSION['first_name'] : 'Not logged in'; ?></h5>
    <?php if(!IsUserLoggedIn()) : ?>
        <a id="Login" href="index.php?P=login">Login</a>
        <a id="Register" href="index.php?P=register">Register</a>
    <?php else: ?>
        <a id="Logout" href="index.php?P=logout">Logout</a>
    <?php endif; ?>
</div>