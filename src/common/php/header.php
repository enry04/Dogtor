<header>
    <div class="logo-container"></div>
    <?php
    if (TokenManager::isAuthenticated()) {
    ?>
        <div class="right-header-container isAuth">
            <h3>
                <a <?= ($page == "main") ? $active : '' ?> class="header-option" href="../main-page/main-page.php"> Home </a>
            </h3>
            <?php
            if ($_COOKIE['user_type'] == 'utente') {
            ?>
                <h3>
                    <a <?= ($page == "prenote") ? $active : '' ?> class="header-option" href="../prenote-page/prenote-page.php"> Prenota visita </a>
                </h3>
            <?php
            } else if ($_COOKIE['user_type'] == 'medico') {
            ?>
                <h3>
                    <a <?= ($page == "prenote") ? $active : '' ?> class="header-option" href="../doctor-page/doctor-page.php"> Gestione visite </a>
                </h3>
            <?php
            } else if ($_COOKIE['user_type'] == 'admin') {
            ?>
                <h3>
                    <a <?= ($page == "prenote") ? $active : '' ?> class="header-option" href="../admin-page/admin-page.php"> Gestione visite </a>
                </h3>
            <?php
            }
            ?>
            <h4 class="popUp-block">
                <div class="hamburger-container">
                    <input type="checkbox" class="option-btn">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <input type="checkbox" class="option-btn">
                <div class="popUp-menu-container hide">
                    <div class="popUp-arrow">
                    </div>
                    <div class="popUp-inner">
                        <div class="popUp-line">
                            <h5 class="logout-btn">
                                <a href="../common/php/logout.php">Logout</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </h4>
            </input>
        </div>
        <script src="../common/js/pop-up-manager.js" type="module"></script>
    <?php
    } else {
    ?>
        <div class="right-header-container notAuth">
            <h3>
                <a <?= ($page == "main") ? $active : '' ?> class="header-option" href="../main-page/main-page.php"> Home </a>
            </h3>
            <h3>
                <a <?= ($page == "login") ? $active : '' ?> class="header-option" href="../login-page/login-page.php"> Accedi </a>
            </h3>
        <?php
    }
        ?>

        </div>
</header>