<?php
function anyplugin_plugin_query_vars($vars) {
	$vars[] = 'wp_ihs';
	return $vars;
}
add_filter('query_vars', 'anyplugin_plugin_query_vars');

function anyguide_plugin_parse_request($wp) {
	if (array_key_exists('wp_ihs', $wp->query_vars) && $wp->query_vars['wp_ihs'] == 'editor_plugin_js') {
		require( dirname( __FILE__ ) . '/editor_plugin.js.php' );
		die;
	}
}

add_action('parse_request', 'anyguide_plugin_parse_request');