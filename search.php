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
$song = $dbconnection->query('select * from lyrics where song_name like "%'.$q.'%" ORDER BY id DESC'); /// search by songs 
$artist = $dbconnection->query('select * from lyrics where artist like "%'.$q.'%" ORDER BY id DESC'); //// search by artist
$deep_search = $dbconnection->query('select * from lyrics where concat(song_name, artist) like"%'.$q.'%" ORDER BY id DESC'); /// search in the two fields also deep search!!!
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
    <div class="container box search__result">

        <?php if($song->rowCount() <= 0 && $artist->rowCount() <= 0 && $deep_search->rowCount() <= 0 ): ?>
            <h3>Sorry but nothing found! for "<?= $q ?>"</h3>
        <?php else: ?>
            <h3>Result for "<?= $q ?>"</h3>
            <?php while ($res = $song->fetch()): ?>
                <p>
                    <a href="lyrics.php?song_name=<?= $res['song_name'] ?>">
                        <span class="name"><?= $res['song_name'] ?></span> by 
                        <span class="name"><?= $res['artist'] ?></span>
                    </a>
                </p>
            <?php endwhile ?>
            <?php if ($song->rowCount() <= 0 ): ?>
                <?php while ($res = $artist->fetch()): ?>
                    <p>
                        <a href="lyrics.php?song_name=<?= $res['song_name'] ?>">
                        <span class="name"><?= $res['song_name'] ?></span> by 
                        <span class="name"><?= $res['artist'] ?></span>
                        </a>
                    </p>    
                <?php endwhile ?>
            <?php endif ?>
            <?php if ($song->rowCount() <= 0 && $artist->rowCount() <= 0): ?>
                <?php while ($res = $deep_search->fetch()): ?>
                    <p>
                        <a href="lyrics.php?song_name=<?= $res['song_name'] ?>">
                        <span class="name"><?= $res['song_name'] ?></span> by 
                        <span class="name"><?= $res['artist'] ?></span>
                        </a>
                    </p>
                <?php endwhile ?>
            <?php endif ?>
        <?php endif ?>
    </div>

<?php 
require "footer.php";
?>