<?php
/**
 * Custom Admin panel
 *
 * @package     sw-css-debug
 * @author      Sebastian Wesołowski
 * @license     MIT License
 *
 * Plugin Name: SW CSS Debuger
 * Plugin URI:  https://github.com/sebastianwesolowski/sw-css-debug
 * Description: Small debuger for css
 * Version:     1.0.1
 * Author:      Sebastian Wesołowski
 * Author URI:  http://warsztatkodu.pl, http://wesolowski.dev
 * Text Domain: sw-css-debug
 * Domain Path: /resources/lang
 * License:     MIT License
 * License URI: http://opensource.org/licenses/MIT
 */

add_action( 'wp_enqueue_scripts', function () {
	if ( env( 'WP_ENV' ) === 'development' ) {
		wp_enqueue_style( 'sw-css-debug/style', plugins_url( 'assets/css/sw-css-debug-main.css', __FILE__ ) );
		wp_enqueue_script( 'sw-css-debug/script', plugins_url( 'assets/scripts/sw-css-debug-main.js' ), __FILE__, ['jquery'] );
		do_action( 'sw_css_debug_init' );
	}
}, 100 );

add_action( 'sw_css_debug_init', 'draw_gui' );

add_filter( 'body_class', 'add_classes_mode' );

/**
 * Create GUI element for css debuger
 */
function draw_gui() {

	$mode    = ( env( ' WP_ENV ' ) );
	$version = ( env( ' VERSION ' ) );

	?>
		<div class="version">
			<div class="line">
					<div class="key">📄 Version: </div>
					<div class="value">
						<?php	esc_html( $version ); ?>
					</div>
			</div>
			<div class="line">
					<div class="key">⚙️ Mode: </div>
					<div class="value">
						<?php	esc_html( $mode ); ?>
					</div>
			</div>
		</div>
	<?php
}

/**
 * Expan Body class list
 *
 * @param string $classes actual list class.
 * @return mixed
 */
function add_classes_mode( $classes ) {
	$classes[] = env( 'WP_ENV' );

	return $classes;
}
