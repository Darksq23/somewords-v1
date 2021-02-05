<?php
require "header.php";
require "basis.php";

$data = $dbconnection->prepare('select * from lyrics where id = :id');
$data->execute([
    'id' => $_GET['id']
]);
?>

<script type="text/javascript">
// Auto-Grow-TextArea script.

function AutoGrowTextArea(textField)
{
  if (textField.clientHeight < textField.scrollHeight)
  {
    textField.style.height = textField.scrollHeight + "px";
    if (textField.clientHeight < textField.scrollHeight)
    {
      textField.style.height = 
        (textField.scrollHeight * 2 - textField.clientHeight) + "px";
    }
  }
}
</script>


<?php while($res = $data->fetch()): ?>
<h3 class="title">Edit <?= $res['song_name'] ?> by <?= $res['artist'] ?></h3>

    <div class="admin__form">

        <form action="traitement.php?action=edit&id=<?= $res['id'] ?>" method="post">
            <div class="form_input_box">
                <label>artist :
                    <input type="text" name="artist" maxlength="100" value="<?= $res['artist'] ?>">
                </label>
            </div>

            <div class="form_input_box">
                <label>lyrics :
                    <textarea name="lyrics" rows="5" cols="40" required onkeyup="AutoGrowTextArea(this)"><?= $res['lyrics'] ?></textarea>
                </label>
            </div>

            <div class="form_input_box">
                <label>link of the song :
                    <input type="text" name="link" required value="<?= $res['link'] ?>">
                </label>
            </div>

            <div class="form_input_box">
                <label> song name :
                    <input type="text" name="song_name" maxlength="150" value="<?= $res['song_name'] ?>">
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
            <input type="submit" value="Edit Lyric" class="btn main__btn">
        </form>
    </div>
    <?php endwhile ?>


<?php require "footer.php"?>
