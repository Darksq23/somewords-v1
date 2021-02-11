<?php
require_once "basis.php";
///////// pagination

//detecter la page actuel
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
// fixer le nombre d'entrer a recuperer
$no_of_record = 10;
// trouver la limite
$offset = ($pageno - 1) * $no_of_record;
// compte des données dans la db
$total_entries = $dbconnection->query('select count(*) from lyrics');
$total_entries_number = $total_entries->fetchColumn();
// page total possible
$total_pages = ceil($total_entries_number / $no_of_record);

$query = "SELECT * FROM lyrics ORDER BY id DESC LIMIT $offset, $no_of_record";
$data = $dbconnection->prepare($query);
$data->execute();

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
    <h1>Hits of the moment</h1>
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
    <div class="pagination">
        <ul>
            <li><a href="?pageno=1"><i class="fas fa-backward"></i> First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fas fa-arrow-left"></i> Prev</a>
            </li>
            <li><p class="page__number"><?= $pageno ?></p></li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next <i class="fas fa-arrow-right"></i></a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last <i class="fas fa-forward"></i></a></li>
        </ul>
    </div>
    <script>document.querySelector('.disabled').addEventListener('click',function(e){e.preventDefault()});</script>
</div>
<?php require 'footer.php' ?>