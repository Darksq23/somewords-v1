<?php require 'header.php' ?>
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

<?php //require 'footer.php' ?>
