<?php require 'header.php' ?>
            
            <div class="form">
                <div class="form-header">
                    <p class="logo-content">somewords<p>
                    <h3>Sign in to somewords</h3>
                </div>
                
                <form action="traitement.php?action=login" method="post">
                    <label> Username
                        <input type="text" name="username" required>
                    </label>
                    <label> Password
                        <input type="password" name="password" required>
                    </label>
                    <input type="submit" value="Login" class="btn main__btn">
                </form>
            </div>

<?php //require 'footer.php' ?>
