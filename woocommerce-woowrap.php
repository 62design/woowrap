<?php
/**
 * Plugin Name: Woocommerce Woowrap
 * Description: Wraps Woocommerce in Bootstrap classes using the SASS @extend directive.
 * Version: 1.1.1
 * Author: Steve North (62 Design)
 * Author URI: http://62design.co.uk/
 **/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function woowrap() {
		wp_enqueue_style( 'woowrap', plugin_dir_url( __FILE__ ) . 'assets/css/woowrap.css' );
	}
	add_action( 'wp_enqueue_scripts', 'woowrap' );

	// Disable default styles for Woocommerce
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	// Container Wrapping
	function before_content() {
		echo '<div class="container">'; // Start Container
		echo '<div class="row">'; // Start Row
	}
	add_action('woocommerce_before_main_content', 'before_content', 1);

	function after_content() {
		echo '</div>'; // End Row
		echo '</div>';	// End Container
	}
	add_action('woocommerce_sidebar', 'after_content', 20);

	function before_archive_description() {
		echo '<div class="col-sm-12">';
	}
	add_action('woocommerce_archive_description', 'before_archive_description', 1);
	add_action('woocommerce_before_shop_loop', 'before_archive_description', 1);

	function after_archive_description() {
		echo '</div>';
	}
	add_action('woocommerce_archive_description', 'after_archive_description', 40);
	add_action('woocommerce_before_shop_loop', 'after_archive_description', 40);

	function clearfix_append() {
		echo '<div class="clearfix"></div>';
	}
}


