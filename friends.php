<?php
	$title = 'Друзья';

	include 'templates/header.php'; 

    require_once './php/connect.php';

    $user_id = $_SESSION['user']['user_id'];
    $friends = [];
    $r = mysqli_query($connect, "SELECT t1.friendship_recipient FROM friendship t1 INNER JOIN friendship t2 ON t1.friendship_sender = t2.friendship_recipient AND t1.friendship_recipient = t2.friendship_sender WHERE t1.friendship_sender = {$user_id}");
    if ($r->num_rows > 0) {
        while ($row = mysqli_fetch_array($r)) {
            array_push($friends, $row[0]);
        }
    }
    $friends_string = implode(', ', $friends);

    $friends = [];
    if ($friends_string != ''){
        $r = mysqli_query($connect, "SELECT `user_id`, `login`, `reg_date`, `avatar`, `description`, `game_count`, `game_win`, `game_loss`, `score` FROM `user` WHERE `user_id` IN (0, {$friends_string})");
        if ($r->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                array_push($friends, $row);
            }
        }
    }

    $outcoming_requests = [];
    $r = mysqli_query($connect, "SELECT t1.friendship_recipient FROM friendship t1 LEFT JOIN friendship t2 ON t1.friendship_sender = t2.friendship_recipient AND t1.friendship_recipient = t2.friendship_sender WHERE t1.friendship_sender = {$user_id} AND t2.friendship_sender IS NULL");
    if ($r->num_rows > 0) {
        while ($row = mysqli_fetch_array($r)) {
            array_push($outcoming_requests, $row[0]);
        }
    }
    $out_requests_string = implode(', ', $outcoming_requests);

    $outcoming_requests = [];
    if ($out_requests_string != ''){
        $r = mysqli_query($connect, "SELECT `user_id`, `login`, `reg_date`, `avatar`, `description`, `game_count`, `game_win`, `game_loss`, `score` FROM `user` WHERE `user_id` IN (0, {$out_requests_string})");
        if ($r->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                array_push($outcoming_requests, $row);
            }
        }
    }

    $incoming_requests = [];
    $r = mysqli_query($connect, "SELECT t1.friendship_sender FROM friendship t1 LEFT JOIN friendship t2 ON t1.friendship_sender = t2.friendship_recipient AND t1.friendship_recipient = t2.friendship_sender WHERE t1.friendship_recipient = {$user_id} AND t2.friendship_sender IS NULL");
    if ($r->num_rows > 0) {
        while ($row = mysqli_fetch_array($r)) {
            array_push($incoming_requests, $row[0]);
        }
    }
    $in_requests_string = implode(', ', $incoming_requests);

    $incoming_requests = [];
    if ($in_requests_string != '') {
        $r = mysqli_query($connect, "SELECT `user_id`, `login`, `reg_date`, `avatar`, `description`, `game_count`, `game_win`, `game_loss`, `score` FROM `user` WHERE `user_id` IN ({$in_requests_string})");
        if ($r->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                array_push($incoming_requests, $row);
            }
        }
    }

?>
<form action="/php/friends_actions.php" method="post" class="friend-find">
    <input type="hidden" name="act" value="add-name">
    <input type="text" name="recipient">
    <button type="submit">Добавить друга</button>
</form>
<div class="friends-container">
    <div class="friends-data">
        <p>Друзья</p>
        <?
        foreach ($friends as $friend) {
            ?>
            <div class="friend-data">
                <img src="/images/avatars/<? echo $friend['avatar'] ?>">
                <p open-user-info="<?= $friend['user_id']?>"><? echo $friend['login'] ?></p>
                <p><? echo $friend['description'] ?></p>
                <div class="buttons">
                    <form action="/php/friends_actions.php" method="post">
                        <input type="hidden" name="act" value="remove">
                        <input type="hidden" name="recipient" value="<? echo $friend['user_id']?>">
                        <button type="submit">Удалить</button>
                    </form>
                </div>
            </div>
            <?
        }
        ?>
    </div>

    <div class="friends-data">
        <p>Исходящие запросы</p>
        <?
        foreach ($outcoming_requests as $friend) {
            ?>
            <div class="friend-data">
                <img src="/images/avatars/<? echo $friend['avatar'] ?>">
                <p open-user-info="<?= $friend['user_id']?>"><? echo $friend['login'] ?></p>
                <p><? echo $friend['description'] ?></p>
                <div class="buttons">
                    <form action="/php/friends_actions.php" method="post">
                        <input type="hidden" name="act" value="remove">
                        <input type="hidden" name="recipient" value="<? echo $friend['user_id']?>">
                        <button type="submit">Отменить</button>
                    </form>
                </div>
            </div>
            <?
        }
        ?>
    </div>

    <div class="friends-data">
        <p>Входящие запросы</p>
        <?
        foreach ($incoming_requests as $friend) {
            ?>
            <div class="friend-data">
                <img src="/images/avatars/<? echo $friend['avatar'] ?>">
                <p open-user-info="<?= $friend['user_id']?>"><? echo $friend['login'] ?></p>
                <p><? echo $friend['description'] ?></p>
                <div class="buttons">
                    <form action="/php/friends_actions.php" method="post">
                        <input type="hidden" name="act" value="add">
                        <input type="hidden" name="recipient" value="<? echo $friend['user_id']?>">
                        <button type="submit">Принять</button>
                    </form>
                    <form action="/php/friends_actions.php" method="post">
                        <input type="hidden" name="act" value="remove">
                        <input type="hidden" name="recipient" value="<? echo $friend['user_id']?>">
                        <button type="submit">Отклонить</button>
                    </form>
                </div>
            </div>
            <?
        }
        ?>
    </div>

</div>

<?php include 'templates/footer.php'; ?>