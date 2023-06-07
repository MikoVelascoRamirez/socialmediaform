<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main>
        <section>
            <h1>Reset your password</h1>
            <small>An e-mail will be send to you with instructions on how to reset your password.</small><br><br>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Enter your e-mail address"><br><br>
                <input type="submit" name="inp_rec_new_pass" value="Recieve new password by mail">
            </form>
        </section>
    </main>
</body>
</html>