<header>
    <div class="logo-container"></div>
    <?php
    if (TokenManager::isAuthenticated()) {
    ?>
        <div class="right-header-container isAuth">
            <h4>
                <a <?= ($page == "main") ? $active : '' ?> class="header-option" href="../main-page/main-page.php"> Home </a>
            </h4>
            <h4>
                <a <?= ($page == "prenote") ? $active : '' ?> class="header-option" href="../prenote-visit/prenote-page.php"> Prenota visita </a>
            </h4>
            <h4 class="popUp-block">
                Account
                <input type="checkbox" class="option-btn">
                <div class="popUp-menu-container hide">
                    <div class="popUp-arrow">
                    </div>
                    <div class="popUp-inner">
                        <div class="popUp-line">
                            <h5 class="logout-btn">
                                Logout
                            </h5>
                        </div>
                    </div>
                </div>
            </h4>
            </input>
        </div>

    <?php
    } else {
    ?>
        <div class="right-header-container notAuth">
            <h4>
                <a <?= ($page == "main") ? $active : '' ?> class="header-option" href="../main-page/main-page.php"> Home </a>
            </h4>
            <h4>
                <a <?= ($page == "login") ? $active : '' ?> class="header-option" href="../login-page/login-page.php"> Accedi </a>
            </h4>
        <?php
    }
        ?>

        </div>
</header>
<script src="../common/js/pop-up-manager.js" type="module"></script>