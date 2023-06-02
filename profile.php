<?php

    include './includes/header.php';
    include './classes/dbh.classes.php';
    include './UserProfile/classes/profileinfo.classes.php';
    include './UserProfile/classes/profileinfo-view.classes.php';

    $profileInfo = new ProfileInfoView($_SESSION['id']);        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profle page</title>
</head>
<body>
    <div id="container">
        <figure id="basic_info">
            <h1 class="figure-title">
                <?php echo $_SESSION["username"] ?>
            </h1>
            <a href="">
                <button class="btn-settings">PROFILE SETTINGS</button>
            </a>
            <section class="profile-info">
                <h3>ABOUT</h3>
                <p class="profile-info-about">
                    <?php echo $profileInfo->about; ?>
                </p>
                <h3>FOLLOWERS</h3>
                <h3>FOLLOWING</h3>
            </section>
        </figure>
        <section class="welcome">
            <h2><?php echo $profileInfo->introtitle; ?></h2>
            <p class="profile-welcome">
                <?php echo $profileInfo->introtext; ?>
            </p>
        </section>
        <section id="posts">
            <div class="post">
                <h2>POST 1</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam rerum a ducimus magnam quod omnis?</p>
                <small>01/01/2021</small>
            </div>
            <div class="post">
                <h2>POST 2</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo fuga mollitia ex nobis quidem iste.</p>
                <small>01/01/2021</small>
            </div>
        </section>
    </div>
</body>
</html>