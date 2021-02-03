<?php
require "header.php";
require "basis.php";

$data = $dbconnection->prepare('select * from lyrics where id = :id');
$data->execute([
    'id' => $_GET['id']
]);
?>

<?php while($res = $data->fetch()): ?>
<h3 class="title">edit <?= $res->song_name ?></h3>
<?php endwhile ?>
<h4><a href="admin_page.php" class="links">Back on the dashboard</a></h4>
<div class="container">
    <div class="form">
        <form action="traitement.php?action=insert" method="post">
            <div class="form_input_box">
                <label>artist :
                    <input type="text" name="artist" maxlength="100" required>
                </label>
            </div>

            <div class="form_input_box">
                <label>lyrics :
                    <textarea name="lyrics" rows="20" cols="80" required></textarea>
                </label>
            </div>

            <div class="form_input_box">
                <label>link of the song :
                    <input type="text" name="link" required>
                </label>
            </div>

            <div class="form_input_box">
                <label> song name :
                    <input type="text" name="song_name" maxlength="150">
                </label>
            </div>
            <div class="form_input_box">
                <label for="genre">Genre : </label>
                <select name="genre" id="genre">
                    <option value="POP">POP</option>
                    <option value="RNB">RNB</option>
                    <option value="HIP HOP">HIP HOP</option>
                </select>
            </div>
            <input type="submit" value="Post Lyric" class="btn box">
        </form>
    </div>
</div>




/***** il faut se baser sur 

la page index........

*/







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






<?php require "footer.php"?>
