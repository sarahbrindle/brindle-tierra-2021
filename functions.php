<?php 
// Starts the engine.
add_action( 'wp_enqueue_scripts', 'brindle_tierra_enqueue_styles' );
function brindle_tierra_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 

  wp_enqueue_style( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/css/easy-responsive-tabs.css' ); 

} 

function your_theme_js() {
    wp_enqueue_script( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/js/easy-responsive-tabs.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-scrolltofixed', get_stylesheet_directory_uri() . '/assets/js/jquery-scrolltofixed-min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'your_theme_js' );

// Includes color stuff
require_once get_stylesheet_directory() . '/inc/defaults.php';
require_once get_stylesheet_directory() . '/inc/customizer.php';
require_once get_stylesheet_directory() . '/inc/css-output.php';



function my_scripts_method() {
   // register your script location, dependencies and version
   wp_register_script('custom_script',
       get_stylesheet_directory_uri() . '/assets/js/all.min.js',
       array('jquery'),
       '1.0',
       true);
   // enqueue the script
   wp_enqueue_script('custom_script');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');


add_theme_support('editor-styles');
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'brindle-tierra', get_stylesheet_directory_uri() . "/block-editor.css", false, '1.0', 'all' );
} );


add_action('wp_body_open', function() {
	?>
	<div class="generatepress-body-wrapper">
	<?php
});
add_action('generate_after_footer', function() {
	?>
	</div>
	<?php
});






function available_neighborhood_function() {
  ob_start(); 
  include_once(get_stylesheet_directory().'/cpt/show_neighborhood.php');
  $content = ob_get_clean();
return $content;
   
}
function register_shortcodes(){
   add_shortcode('available-neighborhood', 'available_neighborhood_function');
}
add_action( 'init', 'register_shortcodes');

include_once(get_stylesheet_directory().'/cpt/neighborhood.php');



function year_shortcode () {
$year = date_i18n ('Y');
return $year;
}
add_shortcode ('year', 'year_shortcode');

require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/sarahbrindle/brindle-tierra-2021/',
  __FILE__,
  'brindle-tierra'
);

// Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');