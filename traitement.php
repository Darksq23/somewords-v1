<?php
if ($_GET['action'] == "login") {

    require_once "basis.php";
    $query = 'SELECT * FROM admin WHERE username = :username AND password = :password';
    $data = $dbconnection->prepare($query);

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $data->execute(array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ));
        $response = $data->fetch();
        if ( in_array($_POST['username'], $response)) {

            if (in_array($_POST['password'], $response)) {
                    session_start();
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];
                    setcookie('username', $_POST['username'], time() + 86400 * 30, '/'); // 86400 means a day
                    $user = $_SESSION['username'];
                    header("Location: admin_page.php?user=$user");
            } else {
                header('Location: admin_page.php?error=wrong password!');
            }
        } else {
            header('Location: admin_page.php?error=wrong password or username!');
        }
    }
}

else if ($_GET['action'] == "logout") {
    session_start();
    session_destroy();
    unset($_COOKIE['username']);
    setcookie('username', null, time() - 1, '/');
    header('Location: index.php');
    exit();
}

else if ($_GET['action'] == "insert") {
    require_once "basis.php";
    $insert_query = "insert into lyrics values (:id, :song_name, :artist, :lyrics, :genre, now(), :likes, :views, :link)";

    $res = $dbconnection->prepare($insert_query);
    $res->execute(array(
        'id' => 0,
        'likes' => 0,
        'views' => 0,
        'artist' => $_POST['artist'],
        'lyrics' => $_POST['lyrics'],
        'link' => $_POST['link'],
        'genre' => $_POST['genre'],
        'song_name' => $_POST['song_name']
    ));

    if (!$res) {
        header('Location: admin_page.php?error=failed to insert data!');
    }
    else {
        header('Location: admin_page.php?message=successfuly posted the lyric');
    }
}

else if ($_GET['action'] == "edit") {
    require_once "basis.php";
    $query = 'update lyrics set song_name= :song_name, lyrics= :lyrics, artist= :artist where id = :id';
    $data = $dbconnection->prepare($query);
    $res = $data->execute([
        'song_name' => $_POST['song_name'],
        'lyrics' => $_POST['lyrics'],
        'artist' => $_POST['artist'],
        'id' => $_GET['id'],
    ]);
    
    if (!$res) {
        header('Location: admin_page.php?error=failed to edit the lyric');
    }
    else {
        header('Location: admin_page.php?message=successfuly edited the lyric');
    }
}

else if ($_GET['action'] == "delete") {
    require_once "basis.php";
    $query = 'delete from lyrics WHERE id= :id';
    $data = $dbconnection->prepare($query);
    $data->execute([
        'id' => $_GET['id']
    ]);
    
    if (!$data) {
        header('Location: admin_page.php?error=failed to delete the lyric!');
    }
    else {
        header('Location: admin_page.php?message=successfuly deleted the lyric');
    }
}
