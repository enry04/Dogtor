<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="./css/main-page-style.css">
    <link rel="icon" href="../common/images/page-logo.png">

    <title>dogtor</title>
</head>

<body>
    <?php
    $page = "main";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>

    <main>
        <div class="text-container">
            <h4 class="title-text">Benvenuto nel sito del Ministero <br>dell' ambiente!</h4>
            <h5 class="description-text">Offriamo la possibilità di visualizzare gli<br>
                animali e i vegetali presenti in ogni <br>
                parco italiano!<br>
                Il sito è costantemente aggiornato <br>
                sia nella flora che nella fauna in<br>
                ogni riserva naturale!</h5>
        </div>
        <div class="dog-container"></div>
    </main>

</body>

</html>