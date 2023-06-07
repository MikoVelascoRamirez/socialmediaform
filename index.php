<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>
<body>
    <?php include './includes/header.php'; ?>
    <main>
        <section>
            <h2>SIGN UP</h2>
            <form action="./includes/signup.inc.php" method="post">
                <small>Don't have an account yet? Sign up here</small>
                <fieldset>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="signup_password" placeholder="Password">
                    <input type="password" name="signup_rep_password" placeholder="Repeat Password">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="submit" value="SIGN UP" name="inp_signup">
                </fieldset>
            </form>
        </section>
        <section>
            <h2>LOGIN</h2>
            <form action="./includes/login.inc.php" method="post">
            <small>Don't have an account yet? Sign up here</small>
                <fieldset>
                    <input type="text" name="login_username" placeholder="Username">
                    <input type="password" name="login_password" placeholder="Password">
                    <input type="submit" value="LOGIN" name="inp_login">
                </fieldset>
            </form>
            <a href="./reset_password.php">Have you forgot your password?</a>
        </section>
    </main>
</body>
</html>