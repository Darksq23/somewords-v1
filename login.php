<?php require 'header.php' ?>

            <div class="form">
                <form action="traitement.php?action=login" method="post">
                    <h1 class="title">Login here</h1>
                    <label> Username :
                        <input type="text" name="username" required>
                    </label>
                    <label> Password :
                        <input type="password" name="password" required>
                    </label>
                    <input type="submit" value="Login" class="btn">
                </form>
            </div>

<?php require 'footer.php' ?>
