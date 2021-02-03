<?php require 'header.php' ?>

<div class="container box">
    <div class="form__box">
        <h3 class="h">Create account</h3>
        <div class="form__">
        <img src="static/svg/user-circle.png" alt="user__icon" class="user__icon">
            <form action="traitement.php">
                    <input type="text" name="firstname" id="firstname" placeholder="First Name">
                    <input type="text" name="lastname" id="lastname" placeholder="Last Name">
                    <input type="text" name="username" id="username" placeholder="username">
                    <input type="password" name="password" id="password" placeholder="password">
                    <input type="submit" value="Create" class="btn">
                    <p class="or">or</p>
                    <a href="login.php" class="sec-btn">have account? login here</a>
            </form>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>