<?php
require "header.php";
require "basis.php";
?>
<?php if(isset($_COOKIE['username']) && !empty($_COOKIE['username'])): ?>

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

    <h2 class="title">Add new lyrics</h2>
    <div class="container">
        <div class="admin__form">
            <form action="traitement.php?action=insert" method="post">
                <div class="form_input_box">
                    <label>artist :
                        <input type="text" name="artist" maxlength="100" required>
                    </label>
                </div>

                <div class="form_input_box">
                    <label>lyrics :
                        <textarea name="lyrics" rows="5" cols="40" required onkeyup="AutoGrowTextArea(this)"></textarea>
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
                <input type="submit" value="Post Lyric" class="btn main__btn">
            </form>
        </div>
    </div>
    <?php else: ?>
        <?php header('Location:login.php?page=add.php'); ?>
    <?php endif ?>

<?php require "footer.php"?>
