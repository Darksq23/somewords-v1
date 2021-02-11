<?php
require_once "basis.php";
?>

<?php require 'header.php' ?>
<div class="container box">
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
    <?php if (isset($_GET['name']) && !empty($_GET['name'])): ?>
        <?php
            $query = "SELECT * FROM lyrics WHERE artist = :artist ORDER BY id DESC";
            $data = $dbconnection->prepare($query);
            $data->execute(['artist' => $_GET['name']]);
        ?>
        <h1>All songs by <?= $_GET['name'] ?></h1>

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
</div>
<?php require 'footer.php' ?>