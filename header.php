<?php 
// some traitement before loading up the page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Somewords | The Best Lyrics Website!</title>
    <link rel="stylesheet" href="static/css/all.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/query.css">
    <link rel="shortcut icon" href="static/images/soma-logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/29e3c799c5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="headbox">
        <div class="logo_box">
            <div class="logo"><a href="index.php">somewords</a></div>
        </div>
        <div class="user__box">
            <?php if (isset($_COOKIE['username'])): ?>
            <div class="auth__user">
                <p class="links__text"><a href="admin_page.php" class="links">Dashboard</a></p>
                <p><a href="traitement.php?action=logout" class="links"><i class="fas fa-sign-out-alt"></i></a></p>
            </div>
            <?php else: ?>
            <div class="not-auth__user">
                <a href="login.php"><i class="fas fa-sign-in-alt"></i></a>
            </div>
            <?php endif ?>
        </div>
    </div>
    <div class="container">
    