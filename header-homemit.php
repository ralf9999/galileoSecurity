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
        <div class="cl_whatsappButton"><?php echo do_shortcode('[njwa_button id="171"]');?></div> 
    <!--#######################################-->
    <header class="cl_headerBox">
    <div class="cl_menuBox">
            <div class="cl_logoArea">
                <a href="<?= $url ?>">
                    <img src="<?= $url ?>/wp-content/uploads/2024/03/base_logo_transparent_background-white.svg" alt="Galileo Security Technology">
                </a>
            </div>
            <div class="cl_bluebackground"></div>
            <nav class="cl_navArea cl_mobileNavClose">
                <?php wp_nav_menu( array(
                                'menu' => 'Hauptmenu',
                                'menu_class' => 'cl_menu',
                                'menu_id' => 'id_hauptmenu',
                                'container' => 'ul',
                                'depth' => '2',
                        ) ); ?>

            </nav>
            <div class="cl_mobilArea">
                <div class="cl_burgerBox">
                    <span class=" cl_burgerLine cl_lineUp"></span>
                    <span class=" cl_burgerLine cl_lineMiddle"></span>
                    <span class=" cl_burgerLine cl_lineDown"></span>
                </div>
            </div>
        </div>
    </div>
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