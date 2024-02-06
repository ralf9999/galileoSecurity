<?php 
$url = home_url();
$attachment_id = 56;

?>

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
    <header class="cl_headerBox">
        <!-- mobile -->
    <div id="id_menuarea_mobil_hp" class="cl_menuarea_mobil_hp cl_menuarea_mobil_slid_hp cl_mobilNone">
            <div class="cl_logoTex cl_mobilLogo">
                <img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/Logo_galileo_neu_3_pfade.svg" alt="Galileo Security Technology">
            </div>
            <div class="cl_areaNavBoxMobil">
                <?php wp_nav_menu( array(
                                'menu' => 'Hauptmenu',
                                'menu_class' => 'cl_navBoxMobil',
                                'menu_id' => 'id_hauptmenu',
                                'container' => 'li',
                                'depth' => '2',
                        ) ); ?>
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
         <H1>Hallo Welt</H1>
        <div class="cl_logoText">
            <img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/Logo_galileo_neu_3_pfade.svg" alt="Galileo Security Technology">
        </div>
        <div id="id_menuareaSecond_hp" class="cl_menuareaSecondHome_hp">
            <div class="cl_areaNavBox">
                <?php wp_nav_menu( array(
                                'menu' => 'Hauptmenu',
                                'menu_class' => 'cl_navBox',
                                'menu_id' => 'id_hauptmenu',
                                'container' => 'ul',
                                'depth' => '2',
                        ) ); ?>

            </div>
        </div>
    <div class="slider-container">
        <div class="slider">
          <div class="slide">
          <div class="slidContent">
                <div class="slidOff_Content">
                    <figure class="imgCam01">
                        <img src="<?php echo wp_get_attachment_image_url(61, 'full')?>" alt="">
                    </figure>
                    <figure class="imgCam02">
                        <img src="<?php echo wp_get_attachment_image_url(60, 'full')?>" alt="">
                    </figure>
                    <figure class="imgCam03">
                    <img src="<?php echo wp_get_attachment_image_url(63, 'full')?>" alt="">
                </figure>
                    <div class="singleContent">
                        <h3>Überwachungssysteme für Private Objekte</h3>
                        <p>Schutzen Sie Ihr eigen Heim mit unsere Systemen</p>
                    </div>
                </div>
                <img src="<?php echo wp_get_attachment_image_url( 66, 'full' )?>" alt="">
            </div>
          </div>
          <div class="slide">
            <div class="slidContent">
            <div class="slidOff_Content">
                    <figure class="imgCam01">
                        <img src="<?php echo wp_get_attachment_image_url(61, 'full')?>" alt="">
                    </figure>
                    <figure class="imgCam02">
                        <img src="<?php echo wp_get_attachment_image_url(60, 'full')?>" alt="">
                    </figure>
                    <figure class="imgCam03">
                    <img src="<?php echo wp_get_attachment_image_url(63, 'full')?>" alt="">
                </figure>
                    <div class="singleContent">
                        <h3>Überwachungssysteme für Private Objekte</h3>
                        <p>Schutzen Sie Ihr eigen Heim mit unsere Systemen</p>
                    </div>
                </div>
                <img src="<?php echo wp_get_attachment_image_url( 65, 'full' )?>" alt="">
            </div>
        </div>
          <div class="slide">
                <div class="slidContent">
                    <div class="slidOff_Content">
                        <figure class="imgCam01">
                            <img src="<?php echo wp_get_attachment_image_url(61, 'full')?>" alt="">
                        </figure>
                        <figure class="imgCam02">
                            <img src="<?php echo wp_get_attachment_image_url(60, 'full')?>" alt="">
                        </figure>
                        <figure class="imgCam03">
                        <img src="<?php echo wp_get_attachment_image_url(63, 'full')?>" alt="">
                        </figure>
                        <div class="singleContent">
                            <h3>Überwachungssysteme für Private Objekte</h3>
                            <p>Schutzen Sie Ihr eigen Heim mit unsere Systemen</p>
                        </div>
                    </div>
                    <img src="<?php echo wp_get_attachment_image_url( 64, 'full' )?>" alt="">
                </div>
            </div>
            <div class="slide">
                <div class="slid slidContent">
                    <div class="slidOff_Content">
                        <figure class="imgCam01">
                            <img src="<?php echo wp_get_attachment_image_url(61, 'full')?>" alt="">
                        </figure>
                        <figure class="imgCam02">
                            <img src="<?php echo wp_get_attachment_image_url(60, 'full')?>" alt="">
                        </figure>
                        <figure class="imgCam03">
                        <img src="<?php echo wp_get_attachment_image_url(63, 'full')?>" alt="">
                        </figure>
                        <div class="singleContent">
                            <h3>Überwachungssysteme für Private Objekte</h3>
                            <p>Schutzen Sie Ihr eigen Heim mit unsere Systemen</p>
                        </div>
                    </div>
                    <img src="<?php echo wp_get_attachment_image_url( 65, 'full' )?>" alt="">
                </div>
            </div>
          <!-- Weitere Folien hier einfügen -->
        </div>
        <button class="prev">Zurück</button>
        <button class="next">Weiter</button>
      </div>
    </header>
    <div class="cl_polyDreieck" >
    <svg xmlns="http://www.w3.org/2000/svg" width="1955" height="70.783" viewBox="0 0 1955 70.783">
        <path id="Pfad_29" data-name="Pfad 29" d="M694.04,43.217,1955,114H0Z" transform="translate(0 -43.217)" fill="#fff"/>
    </svg>
    </div>

    <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>