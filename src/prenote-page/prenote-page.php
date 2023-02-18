<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/prenote-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>
    <?php
    require_once("../common/php/token-manager.php");
    $page = "prenote";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>
    <main>
        <section>
            <h4>
                Inserisci paziente
            </h4>
            <h5 class="error-info">

            </h5>
            <div class="form-container">
                <form method="post">
                    <div class="row">
                        <div class="input-container">
                            <input type="text" required class="patient-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Nome paziente</span>
                        </div>
                        <div class="input-container">
                            <input type="date" class="birth-date" required>
                            <span>Data di nascita</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="text" required class="born-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Città natale</span>
                        </div>
                        <div class="input-container">
                            <input type="text" required class="residence-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Residenza</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="text" required class="species-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Specie</span>
                        </div>
                        <div class="input-container">
                            <input type="text" required class="breed-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Razza</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="text" required class="name-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Nome accompagnatore</span>
                        </div>
                        <div class="input-container">
                            <input type="text" required class="surname-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            <span>Cognome accompagnatore</span>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="submit-btn" value="Prosegui">
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>