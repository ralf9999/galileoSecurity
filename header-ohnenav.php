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
         <!-- desktop -->
        <div class="cl_logoText">
        <a href="<?=$url?>"><img src="<?= $url ?>/wp-content/themes/galileoSecurity/assets/img/Logo_galileo_neu_3_pfade.svg" alt="Galileo Security Technology"></a>
        </div>
        <div id="id_menuareaSecond_hp" class="cl_menuareaSecondHome_hp">
        </div>
        <article class="cl_headline">
            <p class="cl_subline">Wir bauen unsere Homepage für Sie um.</p>
            <h1>Galileo System Technology</h1>
            <p class="cl_subline">Der Profi in Bereich Objektüberwachung</p>
        </article>
    </header>
    <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>