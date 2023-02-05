<header>
    <div class="logo-container"></div>
    <div class="right-header-container">
        <h4>
            <a <?= ($page == "main") ? $active : '' ?> class="header-option" href=""> Home <a>
        </h4>
        <h4>
            <a <?= ($page == "prenote") ? $active : '' ?> class="header-option" href=""> Prenota visita <a>
        </h4>
        <h4>
            <a <?= ($page == "login") ? $active : '' ?> class="header-option" href=""> accedi <a>
        </h4>
    </div>
</header>