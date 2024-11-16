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
    $socials = pods('socials');
    $themeSettings = pods('theme_settings');
    ?>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div hidden class="home-url" data-home_url="<?php echo home_url(); ?>"></div>

<div class="header-stripe">
    <div class="container">
        <div class="row">
            <div class="stripe-col">
                <?php
                $phone = $themeSettings->field('phone');
                $email = $themeSettings->field('email');
                $facebook = $socials->field('facebook');
                if ($phone != '') {
                    ?>
                    <a class="stripe-phone stripe-link"
                       href="tel:<?php echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
                    <?php
                }

                if ($phone != '' && $email != '') {
                    ?>
                    <span class="stripe-vertical-divider"></span>
                    <?php
                }

                if ($email != '') {
                    ?>
                    <a class="stripe-email stripe-link"
                       href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    <?php
                }
                ?>
                <span class="stripe-vertical-divider"></span>
                <a class="stripe-gdpr stripe-link"
                   href="<?php echo get_permalink(413); ?>">Ochrana osobných údajov</a>

                <span class="stripe-vertical-divider"></span>

                <a class="stripe-gdpr stripe-link"
                   href="<?php echo get_permalink(415); ?>">Cookies</a>
                <div class="socials">

                <?php
                if ($facebook != '') {
                ?>
                <a class="stripe-facebook socials-link facebook social-icon"
                   target="_blank"
                   href="<?php echo $facebook; ?>">
                </a>
                <?php
                }
                ?>
                </div>

                <a class="stripe-login stripe-link" target="_blank" href="<?php
                echo esc_url(site_url());
                ?>/wp-admin">login</a>
            </div>
        </div>
    </div>
</div>
<div id="page" class="site">
    <header id="masthead">
        <div class="container main-header-container">
            <div class="row">
                <div class="header-container col">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>

                    <div class="search-container">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <input class="header-search-input" name="s" id="search" placeholder="vyhľadať na stránke"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</header>
<div class="container mobile-menu-row-container">
    <div class="row">
        <div class="col menu-outer-container">
            <div class="mobile-logo-container">
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
            <div class="js-main-menu-mobile-container">
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'primary',
                        'menu_class' => 'header-menu',
                    ]
                );
                ?>
                <div class="socials socials-mobile">
		            <?php
		            if ($facebook != '') {
			            ?>
                        <a class="stripe-facebook socials-link facebook social-icon"
                           target="_blank"
                           href="<?php echo $facebook; ?>">
                        </a>
			            <?php
		            }
		            ?>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content">