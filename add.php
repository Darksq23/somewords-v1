<?php
require "header.php";
require "basis.php";
?>

<h2 class="title">Welcome <?php echo $_GET['user']?></h2>
<h3 class="title">Complete the following formular to add new lyrics in the database</h3>
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

<?php require "footer.php"?>
