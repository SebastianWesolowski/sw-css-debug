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
 * Version:     1.0.0
 * Author:      Sebastian Wesołowski
 * Author URI:  http://warsztatkodu.pl, http://wesolowski.dev
 * Text Domain: sw-css-debug
 * Domain Path: /resources/lang
 * License:     MIT License
 * License URI: http://opensource.org/licenses/MIT
 */

add_action( 'wp_enqueue_scripts', function () {
	if ( env( 'WP_ENV' ) === 'development' ) {
		wp_enqueue_style( 'sw-css-debug/style', plugins_url( 'assets/les/sw-css-debug-main.css', __FILE__ ) );
		wp_enqueue_script( 'sw-css-debug/script', plugins_url( 'assets/scripts/sw-css-debug-main.js' ), ['jquery'], null, true );
	}
}, 100 );
