<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/details-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="stylesheet" href="../common/css/table-style.css">
    <link rel="stylesheet" href="../common/css/modal-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>
    <?php
    require_once("../common/php/token-manager.php");
    $page = "details";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>
    <main>
        <h4>Dettagli della prenotazione</h4>
        <section>
            <h5>Informazioni della prenotazione...</h5>
            <table class="prenotation-table">

            </table>
        </section>
        <section>
            <h5>Informazioni del paziente...</h5>
            <table class="patient-table">

            </table>
        </section>
        <section>
            <h5>Informazioni del proprietario...</h5>
            <table class="owner-table">

            </table>
        </section>
    </main>
    <script src="./js/details-view.js" type="module"></script>
</body>

</html>