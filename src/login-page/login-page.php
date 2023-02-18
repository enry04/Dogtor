<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="./css/login-page-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>

    <?php
    require_once("../common/php/token-manager.php");
    $page = "login";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>
    <main>
        <section>
            <h4>
                Effettua il login
            </h4>
            <h5 class="error-info">

            </h5>
            <div class="form-container">
                <form method="post">
                    <div class="input-container">
                        <input type="email" class="email-text" required>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="text" class="username-text" required>
                        <span>Nome utente</span>
                    </div>
                    <div class="input-container">
                    <input type="password"  class="password-text" required>
                        <span>Password</span>
                    </div>
                    <input type="submit" class="submit-btn" value="Conferma">
                </form>
            </div>
            <div class="registration-container">
                <h5>
                    <a href="../register-page/register-page.php">Non hai un account?<br>Clicca qui</a>
                </h5>
            </div>
        </section>
    </main>
    <script src="./js/login-view.js" type="module"></script>
</body>

</html>