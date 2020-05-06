<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
    <h1>Page access is forbidden!</h1>
<?php else : ?>
    <form method="post">

        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addPost'])) {
            $postData = [
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ];
        }
        if (empty($_POST['title']) || empty($_POST['content'])) {
            echo "Hiányzó cím vagy tartalom!";
        } else {
            require_once DATABASE_CONTROLLER;
            $getDate = getRecord("SELECT TO_CHAR(SELECT NOW())"); 
            $query = "INSERT INTO posts (uid,title,content,date) VALUES (:uid,:title,:content,:date)";
            $params = [
                ':uid' => $_SESSION['uid'],
                ':title' => $postData['title'],
                ':content' => $postData['content'],
                ':date' => $getDate
            ];
            if(!executeDML($query, $params)) {
                echo "Hiba az adatbevitel során";
            } header("Location: index.php");
        }
        ?>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="postTitle">Title</label>
                <input type="text" class="form-control" id="postTitle" name="title">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="postContent">Content</label>
                <textarea class="form-control" id="postContent" name="content"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="addPost">Post</button>
    </form>
<?php endif; ?>