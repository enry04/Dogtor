<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/register-page-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>
    <?php
    $page = "register";
    require('../common/php/header.php');
    ?>
    <main>
        <section>
            <h4>
                Registrati
            </h4>
            <div class="form-container">
                <form method="post">
                    <div class="row">
                        <div class="input-container">
                            <input type="text" required class="name-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Nome</span>
                        </div>
                        <div class="input-container">
                            <input type="text" required class="surname-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Cognome</span>
                        </div>
                        <div class="input-container">
                            <input type="text" required class="tax-code">
                            <span>Codice fiscale</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="text" required class="username-text">
                            <span>Nome utente</span>
                        </div>
                        <div class="input-container">
                            <input type="password" required class="password-text">
                            <span>Password</span>
                        </div>
                        <div class="input-container">
                            <input type="email" required class="email-text">
                            <span>Email</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="number" required class="postal-code" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                            <span>CAP</span>
                        </div>
                        <div class="input-container">
                            <input type="text" required class="street-text">
                            <span>Via</span>
                        </div>
                        <div class="input-container">
                            <input type="number" required class="house-number" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                            <span>N. civico</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="number" required class="telephone-number" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                            <span>N. di telefono (principale)</span>
                        </div>
                        <div class="plus-container"></div>
                    </div>
                    <div class="row">
                        <input type="submit" class="submit-btn" value="Conferma">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="./js/register-view.js" type="module"></script>
</body>

</html>