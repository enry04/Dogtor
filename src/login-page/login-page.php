<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="./css/login-page-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>

    <?php
    $page = "login";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>
    <main>
        <section>
            <h4>
                Effettua il login
            </h4>
            <div class="login-container">
                <form method="post">
                    <input type="email" placeholder="E-mail" class="email-text" required>
                    <input type="text" placeholder="Username" class="username-text" required>
                    <input type="password" placeholder="Password" class="password-text" required>
                    <input type="submit" class="submit-btn">
                </form>
            </div>
            <div class="separate-line"></div>
            <div class="registration-container">
                <h5>
                    <a href="">Non hai un account?<br>Clicca qui</a>
                </h5>
            </div>
        </section>
    </main>
    <script src="./js/login-view.js" type="module"></script>
</body>

</html>