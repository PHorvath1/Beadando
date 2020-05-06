<?php 
    $query="SELECT title,content,date FROM posts";
    require_once DATABASE_CONTROLLER;
    $posts = getList($query);

?>
<div id="forumpage">
    <a id="addPost" href="index.php?P=new_post">New</a>
    <div id="recentPosts">
        <table>
            <thead>Recent Posts:</thead>
            <?php $query="SELECT id,date,title FROM posts ORDER BY id desc";
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
            <?php foreach ($posts as $p) : ?>
                <?php $i++;?>
                <div id="posts">
                    <h3><?=$p['title']?></h3>
                    <h4><?=$p['content']?></h4>
                    <h6>Posted on: <?=$p['date']?></h6>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>