<?php
require_once "basis.php";
$query = 'SELECT * FROM lyrics';
$data = $dbconnection->query($query);
?>
<?php require 'header.php' ?>

<div class="container box">
    <h1>Lyrics of the moment</h1>
    <hr class="line hiden"/>
    <?php while($res = $data->fetch()) { ?>
        <div class="card_box">
            <div class="card__header">
                <h3 class="song__name">Title : <?php echo $res['song_name']; ?></h3>
                <p class="song__artist">Artist : <?php echo $res['artist']; ?></p>
            </div>
            <div class="part__lyrics">
                <p class="preview gradient">
                    <?php
                    $shap = strlen($res['lyrics']);
                    if ($shap >= 80) {
                        echo substr($res['lyrics'], 0, 80)."...";
                    }
                     else {
                         echo $res['lyrics'];
                     }
                    ?>
                    <a href="lyrics.php?song_name=<?php echo $res['song_name']; ?>" class="read__more" id="read__more__button">Read
                        more</a>
                </p>

            </div>
            <div class="card__footer">
                <p class="song__genre">Genre : <?php echo $res['genre']; ?> </p>
                <p class="song__genre">Time : <?php echo $res['time_of_upload']; ?></p>
            </div>
            <hr class="line"/>
        </div>
        <?php
    }$data->closeCursor();
    ?>
</div>

<?php require 'footer.php' ?>