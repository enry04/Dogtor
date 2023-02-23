<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/admin-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="stylesheet" href="../common/css/table-style.css">
    <link rel="stylesheet" href="../common/css/modal-style.css">
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
            <h4>Prenotazioni da gestire</h4>
            <div class="table-container" id="prenotations">
                <h4 class="no-prenotation-text no-data-text hide">Non c'è nessuna prenotazione da gestire</h4>
                <table class="prenotations-table">

                </table>
            </div>
        </section>
    </main>
    <?php
    require_once("../common/html/popup-template.html");
    ?>
    <script src="./js/admin-view.js" type="module"></script>
</body>

</html>