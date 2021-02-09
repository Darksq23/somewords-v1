<?php
require "basis.php";
require "header.php";

$song_name = $_GET['song_name'];

$query_for_lyrics = 'SELECT * FROM lyrics WHERE song_name = :song_name';
$data = $dbconnection->prepare($query_for_lyrics);
$data->execute(array('song_name' => $song_name));

$query_for_suggestion = 'SELECT * FROM lyrics WHERE artist = :artist';
$suggestion = $dbconnection->prepare($query_for_suggestion);

while($res = $data->fetch()) { ?>

    <div class="container box">
    <div class="header__lyrics">
        <h2><?php echo $res['song_name']; ?></h2>
        <div class="second__header">
            <p class="artist__name"><?php echo $res['artist']; ?> | </p>
            <p class="time_of_upload"><?php echo $res['time_of_upload']; ?></p>
        </div>
    </div>
    <div class="lyrics__content">
        <div class="lyrics__box">
            <p class="lyrics">
                <?php echo $res['lyrics']; ?>
            </p>
        </div>
    </div>
    <div class="song_link">
        <?php echo $res['link']; ?>
    </div>
        <?php 
            $suggestion->execute(array(
                    'artist' => $res['artist']
            ));
            while ($result = $suggestion->fetch()) { ?>

        <p class="suggestion__header">Other title You may like</p>
        <div class="suggestion">
                <?php
                    if ($res['song_name'] == $result['song_name']) {
                        echo "No suggestion for this song";
                    }
                    else {?>
                        <div class="suggesstion__box">
                            <div class="sugge">
                                <h3 class="sugge_head"><a href="lyrics.php?song_name=<?= $result['song_name']; ?>" class="links"><?php echo $result['song_name'] ?></a></h3>
                                <p class="song_time"><?php echo $result['artist'] ?> | <?= $result['time_of_upload'] ?></p>
                            </div>
                        </div><?php
                    }
                ?>

            <?php
            $data->closeCursor();
            $suggestion->closeCursor();
            }
            ?>
        </div>
    </div>
<?php }?>
<?php require "footer.php"; ?>