<?php
function yui_remove_scripts() {

    // sample
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    //wp_dequeue_script( 'understrap-scripts' );
    //wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'yui_remove_scripts', 20 );

function theme_enqueue_styles() {
	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'yui-parent-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'yui-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), $the_theme->get( 'Version' ) );
    //wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


if ( ! function_exists( 'yui_all_excerpts_get_more_link' ) ) {

    function all_excerpts_get_more_link( $post_excerpt ) {
        return $post_excerpt;
    }

    function yui_all_excerpts_get_more_link( $post_excerpt ) {
        return $post_excerpt . ' [...]<div class="understrap-read-more-link-block"><a class="btn understrap-read-more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More...', 'yui' ) . '</a></div>';
    }

}
add_filter( 'wp_trim_excerpt', 'yui_all_excerpts_get_more_link' );

