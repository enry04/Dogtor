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
                        <input type="text" placeholder="Nome" required class="name-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                        <input type="text" placeholder="Cognome" required class="surname-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                        <input type="text" placeholder="Codice fiscale" required class="tax-code">
                    </div>
                    <div class="row">
                        <input type="text" placeholder="Nome utente" required class="username-text">
                        <input type="password" placeholder="password" required class="password-text">
                        <input type="email" placeholder="Email" required class="email-text">
                    </div>
                    <div class="row">
                        <input type="number" placeholder="CAP" required class="postal-code">
                        <input type="text" placeholder="Via" required class="street-text">
                        <input type="number" placeholder="N. civico" required class="house-number">
                    </div>
                    <div class="row">
                        <input type="number" placeholder="N. di telefono (principale)" required class="telephone-number">
                    </div>
                    <div class="row">
                        <input type="submit" class="submit-btn" value="Conferma">
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>