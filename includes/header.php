<?php
require_once 'helpers.php';
session_start();
?>
<header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-0f21">
    <a href="../../tatie_odette/index" class="u-image u-logo u-image-1">
        <img src="../../tatie_odette/images/TatieOdette.png" class="u-logo-image u-logo-image-1" data-image-width="112" alt="logo">
    </a>
    <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" style="margin-top: -80px;">
        <div class="menu-collapse u-custom-font"
             style="font-size: 1rem; letter-spacing: 0; font-family: 'Libre Baskerville;',serif">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
               href="#">
                <svg>
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                            <rect y="1" width="16" height="2"></rect>
                            <rect y="7" width="16" height="2"></rect>
                            <rect y="13" width="16" height="2"></rect>
                        </symbol>
                    </defs>
                </svg>
            </a>
        </div>
        <div class="u-custom-menu u-nav-container">
            <ul class="u-custom-font u-nav u-unstyled u-nav-1">
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                       href="../../tatie_odette/index" style="padding: 10px 20px;">Accueil</a>
                </li>
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                       href="../../tatie_odette/patterns" style="padding: 10px 20px;">Les modèles</a>
                </li>
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                       href="../../tatie_odette/contests" style="padding: 10px 20px;">Concours</a>
                </li>
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                       href="../../tatie_odette/contact-us" style="padding: 10px 20px;">Contacter</a>
                </li>
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                       href="../../tatie_odette/faq" style="padding: 10px 20px;">FAQ</a>
                </li>
                <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                       href="../../tatie_odette/blog/posts" style="padding: 10px 20px;">Blog</a>
                </li>
                <li class="u-nav-item">
                    <?php if (!isset($_SESSION['auth_id'])): ?>
                        <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2" href="../../tatie_odette/login" style="padding: 10px 20px 10px 8px; display: flex; align-items: center;">
                            <i class="fas fa-sign-in-alt fa-2x mr-1"></i>
                            <div class="ml-2">Me connecter</div>
                        </a>
                    <?php else: ?>
                        <div class="d-flex">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2 pr-0 mr-1" href="../../tatie_odette/profile?id=<?php echo $_SESSION['auth_id'] ?>"
                               style="padding: 10px 20px 10px 8px; display: flex; align-items: center;">
                                <i class="fas fa-user-circle fa-2x"></i>
                                <div class="ml-2">Mon profil</div>
                            </a>
                            <form class="form-inline px-0 mx-2 mb-0" method="post" action="../../tatie_odette/assets/logout.php">
                                <button class="btn text-light my-2 shadow-none" type="submit" title="Déconnexion"><i class="fas fa-power-off fa-2x"></i></button>
                            </form>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-sidenav-overflow">
                    <div class="u-menu-close"></div>
                    <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link" href="../../tatie_odette/index" style="padding: 10px 20px;">Accueil</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link" href="../../tatie_odette/patterns" style="padding: 10px 20px;">Les modèles</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link" href="../../tatie_odette/contests" style="padding: 10px 20px;">Concours</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link" href="../../tatie_odette/contact-us" style="padding: 10px 20px;">Contacter</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link" href="../../tatie_odette/faq" style="padding: 10px 20px;">FAQ</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2"
                               href="../../tatie_odette/blog/posts" style="padding: 10px 20px;">Blog</a>
                        </li>
                        <li class="u-nav-item">
                            <?php if (!isset($_SESSION['auth_id'])): ?>
                                <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2" href="../../tatie_odette/login" style="padding: 10px 20px 10px 8px; display: flex; align-items: center;">
                                    <i class="fas fa-sign-in-alt fa-2x mr-1"></i>
                                    <div class="ml-2">Me connecter</div>
                                </a>
                            <?php else: ?>
                                <div class="d-flex">
                                    <a class="u-button-style u-nav-link u-text-active-white u-text-hover-custom-color-2 pr-0 mr-1" href="../../tatie_odette/profile?id="<?php echo $_SESSION['auth_id'] ?>
                                       style="padding: 10px 20px 10px 8px; display: flex; align-items: center;">
                                        <i class="fas fa-user-circle fa-2x"></i>
                                        <div class="ml-2">Mon profil</div>
                                    </a>
                                    <form class="form-inline px-0 mx-2 mb-0" method="post" action="../../tatie_odette/assets/logout.php">
                                        <button class="btn text-light my-2 shadow-none" type="submit" title="Déconnexion"><i class="fas fa-power-off fa-2x"></i></button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
    </nav>
</header>