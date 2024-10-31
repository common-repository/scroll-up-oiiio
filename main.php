<?php
/*
Plugin Name: scroll up oiiio
Plugin URI: http://oiiio.us/plugins/scroll-up-oiiio/
Description: scroll up button for website
Author: Mahamud Hasan Rashel
Version: 1.0
Author URI: http://www.oiiio.us
*/

// Adding jQuery from Wordpress */
function oiiio_scroll_up_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'oiiio_scroll_up_jquery');


// Calling other essential file */
function oiiio_scroll_to_top_jquery() {
	
wp_enqueue_style( 'scrolltotop-style', plugins_url('css/scrollToTop.css', __FILE__) );
wp_enqueue_style( 'easing-style', plugins_url('css/easing.css', __FILE__) );

	wp_enqueue_script(
		'scrolltotop',
		plugins_url( '/js/jquery-scrollToTop.js' , __FILE__ ),
		array( 'jquery' ),
		'',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'oiiio_scroll_to_top_jquery' );


// Adding deshbord menu
function oiiio_menu_options()  
{  
	add_options_page('scroll up oiiio', 'scroll up', 'manage_options', 'scroll-up-oiiio','oiiio_options_page');  
}  
add_action('admin_menu', 'oiiio_menu_options');

// Default options values
$oiiioscrollup_options = array(
	'speed' => 1000,
	'theme' => 'cycle'
);

if ( is_admin() ) :

function scroll_up_register_settings() {
	
	register_setting( 'scroll_p_options', 'oiiioscrollup_options', 'scroll_validate_options' );
}

add_action( 'admin_init', 'scroll_up_register_settings' );

// Plugin options page functions
function oiiio_options_page() {
	require('inc/options.php');
}

// Form validation
function scroll_validate_options( $input ) {
	global $oiiioscrollup_options;

	$settings = get_option( 'oiiioscrollup_options', $oiiioscrollup_options );

	$input['speed'] = wp_filter_post_kses( $input['speed'] );
	$input['theme'] = wp_filter_post_kses( $input['theme'] );
	
	return $input;
}
endif;

// Active hook
function oiiio_active_hook() {?>
<?php global $oiiioscrollup_options; $scrollup_settings = get_option( 'oiiioscrollup_options', $oiiioscrollup_options ); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('body').scrollToTop({
			speed: <?php echo $scrollup_settings["speed"]; ?>,
			easing: 'linear', // CSS easings
			distance: 200,
			text: 'Scroll To Top',
			animation: 'fade', // fade, slide, none
			animationSpeed: 500,
			skin: '<?php echo $scrollup_settings["theme"]; ?>', // default, cycle, square, text or triangle
			namespace: 'scrollToTop'
			});
		});	
	</script>
<?php
}
add_action('wp_footer', 'oiiio_active_hook');