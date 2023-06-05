<?php 
    include './UserProfile/includes/getProfileData.inc.php';    
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
        <form action="./UserProfile/includes/profile-settings.inc.php" method="post">
            <fieldset>
                <legend>Profile Settings</legend>

                <small>Change your about section here!</small>
                <textarea name="about" cols="30" rows="10" placeholder="Profile about section..."><?php echo $profileInfo->about; ?></textarea>

                <small>Change your profile page page intro here!</small>
                <input name="title_intro" type="text" placeholder="Profile title" value="<?php echo $profileInfo->introtitle; ?>">

                <textarea name="text_intro" placeholder="Profile introduction..." cols="30" rows="10"><?php echo $profileInfo->introtext; ?></textarea>

                <input type="submit" value="SAVE" name="inp_save_profile-settings">
            </fieldset>
        </form>
    </div>
</body>
</html>