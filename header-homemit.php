<?php
$url = home_url();
$attachment_id = 56;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body>
        <!-- Kontaktbox links
    ###############################-->
    <div class="cl_blurbg_hp">
        <div class="cl_phoneActive_hp"><p class="cl_kreuzClose_hp">X</p><a href="tel:+4915127005762">+49 (0) 1512 7005762</a></div>
    </div>
        <div class="cl_mailContact_hp">
            <a href="mailto:info@galileo-security.de" name="Galileo Security Service"><img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/email.svg" alt=""><p>E-Mail</p></a>
        </div>
        <div class="cl_phoneContact_hp">
            <img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/phone-plus.svg" alt=""><p>Telefon</p>
        </div>   
    <!--#######################################-->
    <header class="cl_headerBox">
        <!-- mobile -->
        <div id="id_menuarea_mobil_hp" class="cl_menuarea_mobil_hp cl_menuarea_mobil_slid_hp cl_mobilNone">
            <div class="cl_logoTex cl_mobilLogo">
            <a href="<?= $url ?>">
                <img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/base_logo_transparent_background-white.svg"
                    alt="Galileo Security">
            </a>
            </div>
            <div class="cl_areaNavBoxMobil">
                <?php wp_nav_menu(
                    array(
                        'menu' => 'Hauptmenu',
                        'menu_class' => 'cl_navBoxMobil',
                        'menu_id' => 'id_hauptmenu',
                        'container' => 'li',
                        'depth' => '2',
                    )); ?>
            </div>
        </div>
        <div id="id_burger" class="cl_hp_burger_button cl_btn-none" aria-controls="primary-navigation"
            aria-expanded="false">
            <svg class="cl_svgBurger" viewBox="-10 -10 120 120" width="65">
                <path class="line" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"
                    d="m 5 30 h 60 a 1 1 0 0 1 0 20 h -60 a 1 1 0 0 1 0 -40 h 30 v 70">
                </path>
            </svg>
        </div>
        <!-- desktop -->
        <div class="cl_logoText">
        <a href="<?= $url ?>">
            <img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/base_logo_transparent_background-white.svg"
                alt="Galileo Security Technology">
        </a>
        </div>
        <div id="id_menuareaSecond_hp" class="cl_menuareaSecondHome_hp">
            <div class="cl_areaNavBox">
                <?php wp_nav_menu(
                    array(
                        'menu' => 'Hauptmenu',
                        'menu_class' => 'cl_navBox',
                        'menu_id' => 'id_hauptmenu',
                        'container' => 'ul',
                        'depth' => '2',
                    )); ?>

            </div>
        </div>
        <div class="cl_whatsappButton"><?php echo do_shortcode('[njwa_button id="171"]');?></div>
    </header>
    <div class="cl_headerWrapper">
        <div class="cl_headerSlider_hp"><?php echo do_shortcode('[smartslider3 slider="2"]');?>
            <div class="cl_header-content_hp">
                <h1>Baustellenüberwachung</h1>
                <h5>Sichern Sie Ihre Baustelle vor Diebstahl und Vandalismus ab!</h5>
            </div>

        </div>
    </div>
    <?php if (function_exists('wp_body_open'))
        wp_body_open(); ?>