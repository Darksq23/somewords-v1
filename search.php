<?php 
require_once 'basis.php';

require "header.php";

if(isset($_GET['s']) && !empty($_GET['s'])) {
    $q = htmlspecialchars($_GET['s']);
} else {
    header('Location: index.php');
    echo "type something...";
}

//$data = $dbconnection->query('select * from lyrics');
$song = $dbconnection->query('select * from lyrics where song_name like "%'.$q.'%" ORDER BY id DESC');
$artist = $dbconnection->query('select * from lyrics where artist like "%'.$q.'%" ORDER BY id DESC');
?>

    <div class="search__box">
        <form action="search.php" method="GET">
            <div class="search__input">
                <input type="search" name="s" id="search__id" placeholder="search here...">
            </div>
            <button class="search__btn" type="submit">
                <i class="fas fa-search"></i>
                <span>search</span>
            </button>
        </form>
    </div>
    <div class="container box">
        <?php if($song->rowCount() <= 0 && $artist->rowCount() <= 0): ?>
            <h3>Sorry but nothing found! :(</h3>
        <?php else: ?>
            <h3>Result for "<?= $q ?>"</h3>
            <?php while ($res = $song->fetch()): ?>
                <p><?= $res['song_name'] ?></p>
            <?php endwhile ?>
            <?php while ($res = $artist->fetch()): ?>
                <p><?= $res['song_name'] ?></p>
            <?php endwhile ?>
        <?php endif ?>
    </div>

<?php 
require "footer.php";
?>