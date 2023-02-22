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
            <h4 class="title-text">
                Inserisci paziente
            </h4>
            <h5 class="error-info">

            </h5>
            <div class="form-container">
                <form method="post">
                    <section class="step" id="0">
                        <div class="row">
                            <div class="input-container">
                                <input type="text" required class="patient-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                                <span>Nome paziente</span>
                            </div>
                            <div class="input-container">
                                <input type="date" class="birth-date" required max="<?= date('Y-m-d') ?>" min="1850-01-01" placeholder=" ">
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
                            <input type="button" class="submit-btn next-btn" value="Prosegui">
                        </div>
                    </section>
                    <section class="step hide" id="1">
                        <div class="row">
                            <div class="input-container">
                                <input type="text" required class="motivation-text">
                                <span>Motivazione</span>
                            </div>
                            <div class="input-container">
                                <input type="text" required class="description-text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                                <span>Descrizione</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-container">
                                <input type="date" required class="visit-date" min="<?= date('Y-m-d') ?>" placeholder=" ">
                                <span>Data visita</span>
                            </div>
                            <div class="input-container">
                                <input type="time" required class="visit-time" min="09:00" max="19:00" placeholder=" ">
                                <span>Ora visita</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-container">
                                <select required>
                                    <option value="" selected disabled hidden>-- Selezione gravità --</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="non urgente">Non urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <input type="button" value="Indietro" class="submit-btn previous-btn">
                            <input type="submit" value="Conferma" class="submit-btn confirm-btn">
                        </div>
                    </section>
                </form>
            </div>
        </section>
    </main>
    <script src="./js/prenote-view.js" type="module"></script>
</body>

</html>