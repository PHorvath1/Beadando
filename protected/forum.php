<?php 
    $query="SELECT id,uid,title,content,date FROM posts";
    require_once DATABASE_CONTROLLER;
    $posts = getList($query);
    $query = "SELECT uid,pid,content,date FROM comments";
    $comments = getList($query);

?>
<div id="forumpage">
    <a id="addPost" href="index.php?P=new_post">New</a>
    <div id="forum">

        <?php if(count($posts) <= 0) : ?>
            <h1>There are no posts to show</h1>
        <?php else : ?>
            <?php $i = 0; ?>
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
                    <a href="index.php?P=add_comment&a=<?=$p['id']?>">Add comment</a>
                </div>
                <div id="comments">
                    <?php foreach ($comments as $c) : ?>
                        <?php if($p['id'] == $c['pid']) : ?>
                            <?php 
                            $query = "SELECT first_name FROM users WHERE id=".$c['uid'];
                            $commentedBy = getRecord($query);
                            ?>
                                <h5><?=$c['content']?><h5>
                                
                                <h6>Commented by: <?=$commentedBy['first_name']?></h6>
                                <h6>on: <?=$c['date']?></h6>
                        <?php endif; ?>
                        <hr>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>