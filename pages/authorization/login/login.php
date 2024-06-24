<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/null.css">
    <link rel="stylesheet" href="../../../styles/style.css">
    <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <main class="login">
        <div class="login__img login__column">
            <img src="../../../img/auth.png" alt="">
        </div>
        <div class="login__body login__column">
            <form name="login" class="form-login">
                <h4 class="form-login__title">Sign in</h4>
                <div class="form-login__field">
                    <input type="email" minlength="3" maxlength="64" required name="email" class="form-login__field_input" placeholder="Your Email@com">
                </div>
                <div class="form-login__field">
                    <input type="password" minlength="3" maxlength="12" required name="password" class="form-login__field_input" placeholder="Your password">
                </div>
                <div class="form-login__send">
                    <button type="submit" class="form-login__send_btn button-green">Sign In</button>
                </div>
                <div class="form-login__line">
                    <span class="form-login__line_span"></span>
                    <span class="form-login__line_text">or</span>
                    <span class="form-login__line_span"></span>
                </div>
                <div class="form-login__link">
                    <a href="../registration/registration.php" class="form-login__link_login">Don't have an account? <span>Sign Up!</span></a>
                </div>
            </form>
        </div>
    </main>
    <script src="../../../script.js"></script>
</body>