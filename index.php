<?php
require_once "basis.php";
$query = 'SELECT * FROM lyrics';
//$query = 'SELECT * FROM lyrics limit $offset, $no_of_record';
$data = $dbconnection->query($query);

///////// pagination

//detecter la page actuel
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
// fixer le nombre d'entrer a recuperer
$no_of_record = 2;
// trouver la limite
$offset = ($pageno - 1) * $no_of_record;
// compte des données dans la db
$total_entries = $dbconnection->query('select count(*) from lyrics');
$total_entries_number = $total_entries->fetchColumn();
// page total possible
$total_pages = ceil($total_entries_number / $no_of_record);

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
    ?><!-- <?php/*
    <div class="pagination">
        <button class="btn__prev">
            <i class="fas fa-arrow-left"></i> prev
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </button>
        <p class="page__number">1</p>
        <button class="btn__next">
            next <i class="fas fa-arrow-right"></i>
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </button>
    </div>
    <?= $total_pages ?>
</div> */ ?> -->
<?php require 'footer.php' ?>