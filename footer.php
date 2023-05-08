<?php $datum = date("Y");?>
<footer>
<article class="footerUp cl_footerBoxingArea_hp">
<div class="box_title2">
            <?php
                    $footerUp_args = array(
                        'post_type' => 'post',
                        'cat' => 2,// Kategorie der posts/Beiträge "footer"
                        'posts_per_page' => 4,
                        'order' => 'ASC',
                        'orderby' => 'date'
                    )
                ?>
                <?php $footerUp = new WP_Query( $footerUp_args ); ?>
                <?php if ( $footerUp->have_posts() ) : ?>
                    <?php $footerUp_item_number = 0; ?>
                    <?php while ( $footerUp->have_posts() ) : $footerUp->the_post(); ?>
                        <div class="<?php if( $footerUp_item_number == 0) echo 'cl_footerBox_hp'; ?> <?php echo join( ' ', get_post_class( '' ) ) ?>"> 
                            <?php the_content(); ?> 
                        </div>
                        <?php $footerUp_item_number++; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
</article>
<article class="cl_footerDown_hp">
        <div class="cl_footerCopyright_hp"><p>Copyright <?php echo '&copy; ',$datum , ' | '; ?>Alle Rechte liegen bei Galileo System Technology</p>
        </div>
        <div class="cl_footerSecondNavBox_hp">
        <?php wp_nav_menu( array(
                'menu' => 'footermenu',
                'menu_class' => 'cl_footerSecondBox',
                'menu_id' => 'id_secondMenu_hp',
                'container' => 'li',
                'depth' => '2',
                ) 
            );
        ?>
        </div>
</article>
    </footer>
        <?php wp_footer(); ?>
    </body>
</html>
