<?php
if ( ! function_exists( 'hp_designThink_setup' ) ) :

function hp_designThink_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'hp_designThink', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

    
    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'hp_designThink' ),
        'social'  => __( 'Social Links Menu', 'hp_designThink' ),
        'footer'  => __( 'Footer Menu', 'hp_designThink' ),
    ) );  

/*
     * Register custom menu locations
     */
    /* Pinegrow generated Register Menus Begin */

    /* Pinegrow generated Register Menus End */
    
/*
    * Set image sizes
     */
    /* Pinegrow generated Image sizes Begin */

    /* Pinegrow generated Image sizes End */
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    /*
     * Enable support for Page excerpts.
     */
     add_post_type_support( 'page', 'excerpt' );
}
endif; // hp_designThink_setup

add_action( 'after_setup_theme', 'hp_designThink_setup' );


if ( ! function_exists( 'hp_designThink_init' ) ) :

function hp_designThink_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

}
endif; // hp_designThink_setup

/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
add_action('after_setup_theme', function() {
    	
    // Remove SVG and global styles 
    // WordPress Version 5.9.0 or less:
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
    // WordPress Version 5.9.1 and above:
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
    // WordPress 6.0 coming soon...
    
    // Remove render_block filters and duotones
	remove_filter('render_block', 'wp_render_duotone_support');
	remove_filter('render_block', 'wp_restore_group_inner_container');
	remove_filter('render_block', 'wp_render_layout_support_flag');
    
  });
/* ########## Woocomerce support thinks ############### */
add_action( 'init', 'hp_designThink_init' );
add_theme_support( 'woocommerce' );
add_action( 'wp_enqueue_scripts', 'misha_remove_woo_styles', 20 ); // priority 20 and higher
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
function misha_remove_woo_styles() {
 	wp_deregister_style( 'woocommerce-general' ); // the main CSS file
 	wp_deregister_style( 'woocommerce-smallscreen' ); // for max-width: 768px
 	 // layout only
}
/* ########### --------- End --------##################*/
if ( ! function_exists( 'hp_designThink_custom_image_sizes_names' ) ) :

function hp_designThink_custom_image_sizes_names( $sizes ) {

    /*
     * Add names of custom image sizes.
     */
    /* Pinegrow generated Image Sizes Names Begin*/
    /* This code will be replaced by returning names of custom image sizes. */
    /* Pinegrow generated Image Sizes Names End */
    return $sizes;
}
add_action( 'image_size_names_choose', 'hp_designThink_custom_image_sizes_names' );
endif;// hp_designThink_custom_image_sizes_names
/*------------------------------*/
    // Our custom post type function
    //###########################################################
    function create_posttype() {
  
        register_post_type( 'News',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'News' ),
                    'singular_name' => __( 'News' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'news'),
                'show_in_rest' => true,
      
            )
        );
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'News', 'Post Type General Name', 'da-boxenpromotion' ),
            'singular_name'       => _x( 'News', 'Post Type Singular Name', 'da-boxenpromotion' ),
            'attributes'          => __( 'Page Attributes'),
            'menu_name'           => __( 'News', 'da-boxenpromotion' ),
            'parent_item_colon'   => __( 'Eltern News', 'da-boxenpromotion' ),
            'all_items'           => __( 'Alle News', 'da-boxenpromotion' ),
            'view_item'           => __( 'Ansicht News', 'da-boxenpromotion' ),
            'add_new_item'        => __( 'Erstelle einen neuen News Seite', 'da-boxenpromotion' ),
            'add_new'             => __( 'Erstellen', 'da-boxenpromotion' ),
            'edit_item'           => __( 'Bearbeiten News', 'da-boxenpromotion' ),
            'update_item'         => __( 'Update News', 'da-boxenpromotion' ),
            'search_items'        => __( 'Suche News', 'da-boxenpromotion' ),
            'not_found'           => __( 'Nicht gefunden', 'da-boxenpromotion' ),
            'not_found_in_trash'  => __( 'Nicht in Papierkorb gefunden', 'da-boxenpromotion' ),
        );
        // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'News', 'da-boxenpromotion' ),
            'description'         => __( 'News Promotion', 'da-boxenpromotion' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','page-attributes', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres', 'topics', 'category'),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'query_var'           => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest'        => true,
            
        );
          
        // Registering your Custom Post Type
        register_post_type( 'News', $args );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );
    
    //------------------------ENDE---------------------
    //#################################################

/*-------------------------------*/
    /* Kurz Beschreibung */
// function kuerze_blogtext($text) {
//   if (strlen($text) > 50) {
//     $text = substr($text, 0, 50) . '...';
//   }
//   return $text;
// }

// add_filter('the_excerpt', 'kuerze_blogtext');
// add_filter('the_content', 'kuerze_blogtext');

    /*-----------------------------------------------*/

if ( ! function_exists( 'hp_designThink_widgets_init' ) ) :

function hp_designThink_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'hp_designThink_widgets_init' );
endif;// hp_designThink_widgets_init

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
if ( ! function_exists( 'hp_designThink_customize_register' ) ) :

function hp_designThink_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'hp_designThink_customize_register' );
endif;// hp_designThink_customize_register


if ( ! function_exists( 'hp_designThink_enqueue_scripts' ) ) :
    function hp_designThink_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_deregister_script( 'hp_designThink-standard' );
    wp_enqueue_script( 'hp_designThink-standard', get_template_directory_uri() . '/assets/js/standard.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    // wp_deregister_style( 'hp_designThink-style' );
    // wp_enqueue_style( 'hp_designThink-style', get_template_directory_uri() . 'styles.css', false, null, 'all');

    wp_deregister_style( 'hp_designThink-style' );
    wp_enqueue_style( 'hp_designThink-style', get_template_directory_uri() . '/assets/css/style.css', false, null, 'all');

    wp_deregister_style( 'hp_designThink-style' );
    wp_enqueue_style( 'hp_designThink-style', get_template_directory_uri() . '/assets/css/styles.css', false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'hp_designThink_enqueue_scripts' );
endif;
function wpb_widgets_init() {
    
    register_sidebar( array(
        'name'          => 'Sidebar Food Page Area',
        'id'            => 'sidebar-page-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Sidebar Drink Page Area',
        'id'            => 'sidebar-page-widget-2',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Primary Area',
        'id'            => 'footer-primary-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
     
    register_sidebar( array(
        'name'          => 'Footer Second Area',
        'id'            => 'footer-second-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/custom.php";
require_once "inc/wp_pg_helpers.php";

?>