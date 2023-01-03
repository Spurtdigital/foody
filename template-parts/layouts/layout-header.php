<header class="nav-bar d-flex justify-content-between align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="nav-bar__left">
            <a href="<?php echo get_home_url();?>" class="nav-bar__logo"></a>
        </div>
        <div class="nav-bar__right js-nav-bar-right">
            <nav class="js-nav-bar-menu">
                <?php creators_hoofdmenu(); ?>
            </nav>
        </div>
    </div>
    <div class="js-nav-toggle nav-toggle"><span class="nav-toggle__icon"><span></span></span></div>
</header>