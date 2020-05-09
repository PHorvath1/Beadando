<?php if(!IsUserLoggedIn()) : ?>
    <h1>Page access is forbidden!</h1>
<?php else : ?>

    <?php if(array_key_exists('a',$_GET) || !empty($_GET['a'])) :?>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addComment'])) {
                $postData = [
                    'comment' => $_POST['comment']
                ];
                if (empty($postData['comment'])) {
                    echo "A komment minimum 1 karakter hosszú!";
                }
                $getDate = date('Y-m-d H:i:s'); 
                $query = "INSERT INTO comments (pid,uid,date,content) VALUES (:pid,:uid,:date,:content)";
                $params = [
                    ':uid' => $_SESSION['uid'],
                    ':pid' => $_GET['a'],
                    ':content' => $postData['comment'],
                    ':date' => $getDate
                ];
                require_once DATABASE_CONTROLLER;
                if(!executeDML($query, $params)) {
                    echo "Hiba az adatbevitel során";
                } header("Location: index.php?P=forum");
            }
        ?>
    

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="commentContent">Add comment</label>
                    <textarea class="form-control" id="commentContent" name="comment"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="addComment">Comment</button>
        </form>
    <?php endif; ?>
<?php endif; ?>