<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change your password</title>
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main>
        <br><form action="" method="post">
            <input type="password" name="pass" placeholder="Enter new password"><br><br>
            <input type="password" name="pass_repeat" placeholder="Repeat new password"><br><br>
            <input type="submit" value="Reset password" name="reset_pass">
        </form>
    </main>
</body>
</html>