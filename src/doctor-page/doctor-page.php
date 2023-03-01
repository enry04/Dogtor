<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/doctor-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="stylesheet" href="../common/css/table-style.css">
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
            <div class="input-container">
                <input type="text" class="keyword-text" required>
                <span>Ricerca visita</span>
                <input type="button" class="search-btn" value="Cerca">
            </div>
        </section>
        <section>
            <h4>Le visite odierne</h4>
            <h4 class="no-odiern-text no-data-text hide">Non c'è nessuna visita da effettuare oggi</h4>
            <table class="odiern-table">

            </table>
        </section>
        <section>
            <h4>Le visite passate da completare</h4>
            <h4 class="no-past-text no-data-text hide">Non c'è nessuna visita da completare</h4>
            <table class="past-table">

            </table>
        </section>
        <section>
            <h4>Le visite da effettuare</h4>
            <h4 class="no-future-text no-data-text hide">Non c'è nessuna visita da effettuare nei giorni futuri</h4>
            <table class="future-table">

            </table>
        </section>
        <!--  <section>
            <table class="visits-table">

            </table>

        </section> -->
    </main>
    <script src="./js/doctor-view.js" type="module"></script>
</body>

</html>