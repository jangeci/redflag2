<?php
/**
 * The header for our theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php
    wp_head();
    $themeSettings = pods('theme_settings');
    ?>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div hidden class="home-url" data-home_url="<?php echo home_url(); ?>"></div>

<!--<div class="header-stripe">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="stripe-col">-->
<!--                --><?php
//                $phone = $themeSettings->field('phone');
//                $email = $themeSettings->field('email');
//                $facebook = $socials->field('facebook');
//                if ($phone != '') {
//                    ?>
<!--                    <a class="stripe-phone stripe-link"-->
<!--                       href="tel:--><?php //echo str_replace(' ', '', $phone); ?><!--">-->
<?php //echo $phone; ?><!--</a>-->
<!--                    --><?php
//                }
//
//                if ($phone != '' && $email != '') {
//                    ?>
<!--                    <span class="stripe-vertical-divider"></span>-->
<!--                    --><?php
//                }
//
//                if ($email != '') {
//                    ?>
<!--                    <a class="stripe-email stripe-link"-->
<!--                       href="mailto:--><?php //echo $email; ?><!--">--><?php //echo $email; ?><!--</a>-->
<!--                    --><?php
//                }
//                ?>
<!--                <span class="stripe-vertical-divider"></span>-->
<!--                <a class="stripe-gdpr stripe-link"-->
<!--                   href="--><?php //echo get_permalink(413); ?><!--">Ochrana osobných údajov</a>-->
<!---->
<!--                <span class="stripe-vertical-divider"></span>-->
<!---->
<!--                <a class="stripe-gdpr stripe-link"-->
<!--                   href="--><?php //echo get_permalink(415); ?><!--">Cookies</a>-->
<!--                <div class="socials">-->
<!---->
<!--                --><?php
//                if ($facebook != '') {
//                ?>
<!--                <a class="stripe-facebook socials-link facebook social-icon"-->
<!--                   target="_blank"-->
<!--                   href="--><?php //echo $facebook; ?><!--">-->
<!--                </a>-->
<!--                --><?php
//                }
//                ?>
<!--                </div>-->
<!---->
<!--                <a class="stripe-login stripe-link" target="_blank" href="--><?php
//                echo esc_url(site_url());
//                ?><!--/wp-admin">login</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<header class="header-menu-container">
    <div class="container header-menu-container-inner">
        <div class="header-logo-container">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            ?>
        </div>
        <div class="navtoggle-container">
            <div class="navtoggle">
                <div class="navtoggle-inner">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="header-search-container col">
            <div class="header-search-container-inner">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <input class="header-search-input" name="s" id="search" placeholder="vyhľadať na stránke"/>
                </form>
                <button class="icon-button header-search-close-button">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                         width="24px" height="24px"
                         preserveAspectRatio="xMidYMid meet" focusable="false">
                        <path d="M 39.486328 6.9785156 A 1.50015 1.50015 0 0 0 38.439453 7.4394531 L 24 21.878906 L 9.5605469 7.4394531 A 1.50015 1.50015 0 0 0 8.484375 6.984375 A 1.50015 1.50015 0 0 0 7.4394531 9.5605469 L 21.878906 24 L 7.4394531 38.439453 A 1.50015 1.50015 0 1 0 9.5605469 40.560547 L 24 26.121094 L 38.439453 40.560547 A 1.50015 1.50015 0 1 0 40.560547 38.439453 L 26.121094 24 L 40.560547 9.5605469 A 1.50015 1.50015 0 0 0 39.486328 6.9785156 z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="js-main-menu-mobile-container">
            <?php
            wp_nav_menu(
                [
                    'theme_location' => 'primary',
                    'menu_class' => 'header-menu',
                ]
            );
            ?>

            <div class="header-search-button-container">
                <button class="icon-button header-search-button">
                    <svg fill="currentColor"
                         focusable="false"
                         viewBox="0 0 24 24" width="24px" height="24px">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </button>
            </div>
            <?php
            include('parts/socials.php');
            ?>
        </div>
    </div>
</header>

<div id="content" class="site-content">
