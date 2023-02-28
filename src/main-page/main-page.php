<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="./css/main-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="icon" href="../common/images/page-logo.png">

    <title>dogtor</title>
</head>

<body>
    <?php
    require_once("../common/php/token-manager.php");
    $page = "main";
    $active = 'class="active-page"';
    require_once('../common/php/header.php');
    ?>

    <main>
        <div class="text-container">
            <h3 class="title-text">Benvenuto nella clinica <br>veterinaria Dogtor!</h3>
            <h5 class="description-text">Registrati ed effettua il login al sito <br> per prenotare una visita riservata <br> al tuo cucciolo con il nostro medico!</h5>
        </div>
        <div class="dog-container"></div>
    </main>

</body>

</html>