<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../styles/null.css">
    <link rel="stylesheet" href="../../../styles/style.css">
    <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon">
    <title>Registration</title>
</head>

<body>
    <main class="registration">
        <div class="registration__img registration__column">
            <img src="../../../img/auth.png" alt="">
        </div>
        <div class="registration__body registration__column">
            <form name="registration" class="form-registration">
                <h4 class="form-registration__title">Sign up</h4>
                <div class="form-registration__field">
                    <input type="text" name="name" class="form-registration__field_input" placeholder="Name">
                </div>
                <div class="form-registration__field">
                    <input type="text" name="surname" class="form-registration__field_input" placeholder="Last Name">
                </div>
                <div class="form-registration__field">
                    <input type="text" name="address" class="form-registration__field_input" placeholder="Address">
                </div>
                <div class="form-registration__field">
                    <input type="email" name="email" minlength="3" maxlength="64" required class="form-registration__field_input" placeholder="Your Email@com">
                </div>
                <div class="form-registration__field">
                    <input type="password" name="password" minlength="3" maxlength="12" required class="form-registration__field_input" placeholder="Your password">
                </div>
                <div class="form-registration__send">
                    <button type="submit" class="form-registration__send_btn button-green">Sign Up</button>
                </div>
                <div class="form-registration__line">
                    <span class="form-registration__line_span"></span>
                    <span class="form-registration__line_text">or</span>
                    <span class="form-registration__line_span"></span>
                </div>
                <div class="form-registration__link">
                    <a href="../login/login.php" class="form-registration__link_login">Already have an account? <span>Sign In</span></a>
                </div>
            </form>
        </div>
    </main>
    <script src="../../../script.js"></script>
</body>