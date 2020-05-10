<?php
    $query="SELECT id,uid,title,content,date FROM posts";
    require_once DATABASE_CONTROLLER;
    $posts = getList($query);
    $query = "SELECT id,uid,pid,content,date FROM comments";
    $comments = getList($query);
    if(array_key_exists('d',$_GET) && !empty($_GET['d'])) {
        if (array_key_exists('t',$_GET) && !empty($_GET['t'])) {
            if (isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) {
                switch ($_GET['t']) {
                    case 'c':
                        $query="DELETE FROM comments WHERE id=:id";
                        $params = [
                            ':id' => $_GET['d']
                        ];
                        require_once DATABASE_CONTROLLER;
                        if (!executeDML($query, $params)) {
                            echo "Hiba a törlés közben!";
                        } header ('Location: index.php?P=forum');
                        break;
                    case 'p':
                        $query="DELETE FROM posts WHERE id=:id";
                        $params = [
                            ':id' => $_GET['d']
                        ];
                        require_once DATABASE_CONTROLLER;
                        if (!executeDML($query, $params)) {
                            echo "Hiba a törlés közben!";
                        } header ('Location: index.php?P=forum');
                        break;
                    default:
                        break;
                }
            }
        }
    }

?>
<div id="forumpage">
    <?php if ($_SESSION['permission'] >= 1) : ?>
        <a id="addPost" href="index.php?P=new_post">New</a>
    <?php endif; ?>
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
                    <?php if($_SESSION['permission'] >= 2) : ?>
                        <a id="deletePosts" href="index.php?P=forum&d=<?=$p['id']?>&t=p">Delete</a>
                    <?php endif; ?>
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
                            <?php if($_SESSION['permission'] >= 2) : ?>
                                <a id="deleteComments" href="index.php?P=forum&d=<?=$c['id']?>&t=c">Delete</a>
                            <?php endif; ?>
                            <h5><?=$c['content']?><h5>
                            <h6>Commented by: <?=$commentedBy['first_name']?></h6>
                            <h6>on: <?=$c['date']?></h6>
                            <hr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>