<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
</head>
<body>
    <div id="profile-settings">
        <form action="" method="post">
            <fieldset>
                <legend>Profile Settings</legend>

                <small>Change your about section here!</small>
                <textarea name="about" cols="30" rows="10" placeholder="Profile about section..."></textarea>

                <small>Change your profile page page intro here!</small>
                <input name="intro" type="text" placeholder="Profile title"></input>

                <textarea name="intro" placeholder="Profile introduction..."></textarea>

                <input type="submit" value="SAVE" name="inp_save_profile-settings">
            </fieldset>
        </form>
    </div>
</body>
</html>