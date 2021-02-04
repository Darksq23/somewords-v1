<?php
require_once "basis.php";
$query = 'SELECT * FROM lyrics';
$data = $dbconnection->query($query);
?>
<?php require 'header.php' ?>
<div class="container box">
    <h1>Lyrics of the moment</h1>
    <?php while($res = $data->fetch()) { ?>
        <div class="card_box">
            <a href="lyrics.php?song_name=<?php echo $res['song_name']; ?>">
            <p class="song_name"><?php echo $res['song_name']; ?></p>
            </a>
            <p class="artist"><?php echo $res['artist']; ?></p>
            <p class="genre"><?php echo $res['genre']; ?></p>
            <p class="time"><?php echo $res['time_of_upload']; ?></p>
        </div>
        <?php
    }$data->closeCursor();
    ?>
    <div class="pagination">
        <button class="btn__prev"><i class="fas fa-arrow-left"></i> prev</button>
        <p class="page__number">1</p>
        <button class="btn__next">next <i class="fas fa-arrow-right"></i></button>
    </div>
</div>
<?php require 'footer.php' ?>