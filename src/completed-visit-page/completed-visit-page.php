<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/completed-visit-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="stylesheet" href="../common/css/table-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>
    <?php
    require_once("../common/php/token-manager.php");
    $page = "chronology";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>
    <main>
        <section>
            <h4 class="completed-visits-text">Le visite completate</h4>
            <table>

            </table>
        </section>
        <section>
            <h4 class="prenotations-text"></h4>
        </section>
    </main>
    <script src="./js/completed-visit-view.js" type="module"></script>
</body>

</html>