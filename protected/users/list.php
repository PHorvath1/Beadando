<?php require_once DATABASE_CONTROLLER; ?>
<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 2) : ?>
    <?php $query = "SELECT first_name, last_name, email, permission FROM users ORDER BY permission desc";
        $users = getList($query);
    ?>
    <table id="listUsers">
        <th>#</th>
        <th>Vezetéknév</th>
        <th>Keresztnév</th>
        <th>Email</th>
        <th>Jogosultság</th>
        <?php $i=0;?>
        <?php foreach ($users as $u) : ?>
            <?php $i++;?>
            <tr>
                <td><?=$i?></td>
                <td><?=$u['last_name']?></td>
                <td><?=$u['first_name']?></td>
                <td><?=$u['email']?></td>
                <?php if($u['permission'] == 2) : ?>
                    <td>Admin</td>
                <?php elseif($u['permission'] == 1) : ?>
                    <td>Member</td>
                <?php else : ?>
                    <td>User</td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>