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
$song = $dbconnection->query('select * from lyrics where song_name like "%'.$q.'%"');
$artist = $dbconnection->query('select * from lyrics where artist like "%'.$q.'%"');
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

<h3>Result for "<?= $q ?>"</h3>
<?php while ($res = $song->fetch()): ?>
    <p><?= $res['song_name'] ?></p>
<?php endwhile ?>
<?php while ($res = $artist->fetch()): ?>
    <p><?= $res['song_name'] ?></p>
<?php endwhile ?>

<?php 
require "footer.php";
?>