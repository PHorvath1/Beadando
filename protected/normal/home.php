<?php require_once DATABASE_CONTROLLER; ?>
<div id="recentPosts">
    <table>
        <thead>Recent Posts:</thead>
        <?php $query="SELECT date,title FROM posts ORDER BY date desc";
            $recentPost=getList($query);
        ?>
        <p>
        <?php for ($i=0; $i < 3; $i++) : ?> 
            <tr><a id="recentLink" href="index.php?P=forum"><?=$recentPost[$i]['date']?> - <?=$recentPost[$i]['title']?></a></tr>
        <?php endfor; ?>    
    </table>
</div>

<?php if(IsUserLoggedIn()) : ?>
    <h1>Welcome <?=$_SESSION['last_name']?> <?=$_SESSION['first_name']?></h1>
<?php else : ?>
    <h1><a id="notLoggedIn" href="index.php?P=login">Sign in</a> to use the forum</h1>
    <h2>...or <a id="notLoggedIn" href="index.php?P=register">register</a> if you don't have an account yet.</h2>
<?php endif; ?>
