<?php $url = home_url()?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body>
    <header class="cl_headerBox cl_headerBGimageHome">
       <img src="<?=$url?>/wp-content/themes/galileoSecurity/assets/img/r-architecture-MAnVoJlQUvg-unsplash.jpg" alt="" class="cl_bgHome"> 
        <!-- mobile -->
    <div id="id_menuarea_mobil_hp" class="cl_menuarea_mobil_hp cl_mobilNone">
            <div class="cl_areaNavBoxMobil">
                <?php wp_nav_menu( array(
                                'menu' => 'Boxen Hauptmenu',
                                'menu_class' => 'cl_navBox',
                                'menu_id' => 'id_hauptmenu',
                                'container' => 'li',
                                'depth' => '2',
                        ) ); ?>
            </div>
        </div>
        <button id="id_burgerBox02" class="hp_burger_button_cl btn-none" aria-controls="primary-navigation"
            aria-expanded="false">
            <svg class="hamburger" viewBox="-10 -10 120 120" width="65">
                <path class="line" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"
                    d="m 5 30 h 60 a 1 1 0 0 1 0 20 h -60 a 1 1 0 0 1 0 -40 h 30 v 70">
                </path>
            </svg>
        </button>
         <!-- desktop -->
        <div class="cl_logoText">
            <img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/Logo_galileo_neu_3_pfade.svg" alt="Galileo Security Technology">
        </div>
        <div id="id_menuareaSecond_hp" class="cl_menuareaSecondHome_hp">
            <div class="cl_areaNavBox">
                <?php wp_nav_menu( array(
                                'menu' => 'Hauptmenu',
                                'menu_class' => 'cl_navBox02',
                                'menu_id' => 'id_hauptmenu',
                                'container' => 'ul',
                                'depth' => '2',
                        ) ); ?>

            </div>
        </div>
        <article class="cl_headline">
            <h1>Galileo System Technology</h1>
            <p class="cl_subline">Der Profi in Bereich Objektüberwachung</p>
        </article>
    </header>
    <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>