<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/page-style.css">
    <link rel="stylesheet" href="../common/css/header-style.css">
    <link rel="stylesheet" href="../common/css/form-style.css">
    <link rel="stylesheet" href="./css/visit-result-page-style.css">
    <link rel="stylesheet" href="../common/css/pop-up-style.css">
    <link rel="stylesheet" href="../common/css/table-style.css">
    <link rel="icon" href="../common/images/page-logo.png">
    <title>Dogtor</title>
</head>

<body>
    <?php
    require_once("../common/php/token-manager.php");
    $page = "result";
    $active = 'class="active-page"';
    require('../common/php/header.php');
    ?>
    <main>
        <section>
            <h4>Compila il risultato della visita</h4>
            <div class="form-container">
                <form method="post">
                    <div class="row">
                        <div class="input-container">
                            <input type="text" class="motivation-text" required>
                            <span>Motivazione</span>
                        </div>
                        <div class="input-container">
                            <input type="text" class="diagnosis-text" required>
                            <span>Diagnosi</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-container">
                            <input type="text" class="cure-text" required>
                            <span>Cura</span>
                        </div>
                        <div class="input-container">
                            <input type="number" class="price-text" value="35" min="35" max="100" required>
                            <span>Prezzo</span>
                        </div>
                    </div>
                    <input type="submit" value="Conferma">
                </form>
            </div>
        </section>
    </main>
    <script src="./js/visit-result-view.js" type="module"></script>
</body>

</html>