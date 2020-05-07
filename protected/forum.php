<?php 
    $query="SELECT uid,title,content,date FROM posts";
    require_once DATABASE_CONTROLLER;
    $posts = getList($query);

?>
<div id="forumpage">
    <a id="addPost" href="index.php?P=new_post">New</a>
    <div id="recentPosts">
        <table>
            <thead>Recent Posts:</thead>
            <?php $query="SELECT date,title FROM posts ORDER BY date desc";
                $recentPost=getRecord($query);
            ?>
            <p>
            <tr><?=$recentPost['title']?></tr>
        </table>    
    </div>
    <div id="forum">

        <?php if(count($posts) <= 0) : ?>
            <h1>There are no posts to show</h1>
        <?php else : ?>
            <?php $i = 0; ?>
            <?php $postedBy = ""?>
            <?php foreach ($posts as $p) : ?>
                <?php $i++;?>
                <?php 
                    $query = "SELECT first_name FROM users WHERE id=".$p['uid'];
                    $postedBy = getRecord($query);
                ?>
                <div id="posts">
                    <h3><?=$p['title']?></h3>
                    <h4><?=$p['content']?></h4>
                    <hr>
                    <h6>Posted by: <?=$postedBy['first_name']?></h6>
                    <h6>on: <?=$p['date']?></h6>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>