<?php
session_start();
?>

<?php
require "header.php";
require "basis.php";
?>

    <!--<div class="container">-->
        <div class="not_logged">
            <?php if (isset($_GET['error'])): ?>
            <div class="alert__box alert__box-errors">
                <p><?= $_GET['error'] ?></p>
            </div>
            <?php elseif(isset($_GET['message'])): ?>
            <div class="alert__box alert__box-success">
                <p><?= $_GET['message'] ?></p>
            </div>
            <?php endif ?>
            <div class="form">
                <div class="form-header">
                    <h3>Sign in to somewords</h3>
                </div>
                
                <form action="traitement.php?action=login" method="post">
                    <label> Username
                        <input type="text" name="username" required autocomplete="off">
                    </label>
                    <label> Password
                        <input type="password" name="password" required autocomplete="off">
                    </label>
                    <input type="submit" value="Login" class="btn main__btn">
                </form>
            </div>
        </div>

        <div class="dashboard" id="hide">

            <div class="admin_action_panel">
                <p class="welcome__message">welcome back <?= $_SESSION['username'] ?></p>
                <ul>
                    <li>
                        <a href="add.php?user=
                            <?php if (isset($_SESSION['username'])): ?>
                                <?= $_SESSION['username'] ?>"
                            <?php endif ?>id="add__lyrics" class="simple__btn__cool">
                            <span class="text">add lyrics</span>
                            <i class="fas fa-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="traitement.php?action=logout" class="simple__btn__danger">
                            <span class="text">sign out</span>
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
                <?php if (isset($_GET['error'])): ?>
                <div class="message__box message__box-errors">
                    <p><?= $_GET['error'] ?></p>
                </div>
                <?php elseif(isset($_GET['message'])): ?>
                <div class="message__box message__box-success">
                    <p><?= $_GET['message'] ?></p>
                </div>
                <?php endif ?>
                <div class="song__box">
                    <table class="content__table">
                        <thead>
                            <tr>
                                <td>Song name</td>
                                <td>artist</td>
                                <td>time</td>
                                <td>genre</td>
                            </tr>
                        </thead>
            <?php
            $query = 'SELECT * FROM lyrics ORDER BY id DESC';
            $result = $dbconnection->query($query);
            while ($data = $result->fetch()) {
                ?>
                
                        <tr class="__row">
                            <td class="table__element__song-name"><?php echo $data['song_name']; ?></td>
                            <td class="table__element"><?php echo $data['artist']; ?></td>
                            <td class="table__element"><?php echo $data['time_of_upload']; ?></td>
                            <td class="table__element__small"><?php echo $data['genre']; ?></td>
                            <td class="table__element__small action"><a href="edit.php?id=<?php echo $data['id']; ?>" id="edit" class="links action__btn"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="table__element__small action"><a href="traitement.php?action=delete&id=<?php echo $data['id']; ?>" id="edit" class="links action__btn"><i class="fas fa-trash-alt"></i></a></a>
                            </td>
                        </tr>
                <?php
            }
            $result->closeCursor();
            ?></table>
            </div>
        </div>
    <!--</div>-->
    <script type="text/javascript" src="static/js/app.js"></script>
    <script type="text/javascript">

        document.querySelector('.dashboard').style.display = 'none';
        document.querySelector('#add__lyrics').style.display = 'none';
        document.querySelector('.not_logged').style.display = 'none';

        var user = "<?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } else echo ''; ?>";

        if (user === "") {
            document.querySelector('.not_logged').style.display = 'block';
        }
        else {
            console.log('vous etes connectés en tant que <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } else echo ''; ?>');
            document.querySelector('.dashboard').style.display = 'block';
            document.querySelector('#add__lyrics').style.display = 'block';
        }
    </script>
<?php require "footer.php" ?>
