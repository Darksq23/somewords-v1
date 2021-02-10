<?php
require_once "basis.php";
$alllyrics = $dbconnection->query("SELECT * FROM lyrics ORDER BY id DESC");

if ((isset($_GET['s']) && !empty($_GET['s']))) {
    $search = htmlspecialchars($_GET['s']);
    $alllyrics = $dbconnection->query("SELECT song_name, artist FROM lyrics WHERE MATCH LIKE "%'.$search.'%" ORDER BY id DESC");
}

?>

<?php require 'header.php' ?>
<div class="container box">
    <div class="search__box">
        <form action="search.php" method="GET">
            <div class="search__input">
                <input type="search" name="s" id="search__id" placeholder="search for song, artist...">
            </div>
            <button class="search__btn" type="submit">
                <i class="fas fa-search"></i>
                <span>search</span>
            </button>
        </form>
    </div>

    <div class="search__result">
        <?php if ($alllyrics->rowCount() < 0): ?>
            <?= "nothing found!" ?>
        <?php else: ?>
            <?= "found things yayyyy :(" ?>
        <?php endif ?>
    </div>
        
</div>
<?php require 'footer.php' ?>










<!--<?php /*



<h2>result for <?= $_GET['s'] ?></h2>

        <?php while($res = $data->fetch()){ ?>
            <div class="card_box">
                <div class="card_box-info">
                    <a href="lyrics.php?song_name=<?php echo $res['song_name']; ?>">
                        <p class="song_name"><?php echo $res['song_name']; ?></p>
                    </a>
                    <a href="artist.php?name=<?php echo $res['artist']; ?>">
                        <p class="artist underline"><?php echo $res['artist']; ?></p>
                    </a>
                    <p class="genre"><?php echo $res['genre']; ?></p>
                    <p class="time"><?php echo $res['time_of_upload']; ?></p>
                </div>
                <div class="card_box-play">
                    <a href="lyrics.php?song_name=<?php echo $res['song_name']; ?>">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
            <?php
            }
            $data->closeCursor();
            ?>
    <?php else: ?>
        <div class="message__box message__box-errors">
            <p>Sorry no song found! :( </p>
        </div>
    <?php endif ?>



?>-->