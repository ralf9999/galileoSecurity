<?php
/*
 Template Name: Boxer Seite
 Template Post Type: post
*/
?>
<?php get_header('subhome'); ?>
<section class="cl_boxingArea_hp">
    <div class="container">
        <div class="titleUp">
            <h1><?= the_title() ?></h1>
        </div>
        <div class="boxerImage">
        <?php if ( has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
        <?php endif; ?>
    </div>
        <div class="attribute01">
            <div class="cl_attribute01Box">
                <div class="fightBox">
                    <div class="fight01">
                        <h3 class="cl_number"><?php the_field('ko_box_gold'); ?>
                        </h3>
                        <p class="cl_ko"><?php the_field('ko_text_gold_unten'); ?> KOs</p>
                    </div>
                    <div class="fight02">
                        <h3 class="cl_number"><?php the_field('ko_box_bronze'); ?></h3>
                        <p class="cl_ko"><?php the_field('ko_text_bronze_unten'); ?> KOs</p>
                    </div>
                    <div class="fight03">
                        <h3 class="cl_number"><?php the_field('ko_box_silver'); ?></h3>
                        <p class="cl_ko"><?php the_field('ko_text_silver_unten'); ?> KOs</p>
                    </div>
                </div>
                <div class="cl_attributlist">
                <?php the_field('boxertabelle'); ?>
                </div>
            </div>
        </div>
        <div class="attribute02">
            <h3 class="cl_rating">rating</h3>
            <div class="cl_starsymbole">
            <img src="<?php the_field('starimage'); ?>" alt="">
            </div>
            <div class="cl_worldInfo">
                <img src="http://localhost:8888/WordPress-projekte/pizzeria-01/wp-content/uploads/2023/04/world-icon.svg" alt="">
                <p>#<?php the_field('welt_rating_nummer'); ?></p>
            </div>
            <div class="cl_worldInfo">
                <img src="<?php the_field('flag_bild'); ?>" alt="">
                <p>#<?php the_field('flag_rating'); ?></p>
            </div>
        </div>

    </div>
    <?php the_content()?>
</section>
<?php get_footer(); ?>