<?php
/**
 * This file is checking for updates.
 *
 * @package loose
 */

$api_url = 'https://api.fatthemes.com/updates/';

if ( function_exists( 'wp_get_theme' ) ) {
	$theme_data = wp_get_theme( get_option( 'template' ) );
	$theme_version = $theme_data->get( 'Version' );
} else {
	return;
}
$theme_base = get_option( 'template' );


add_filter( 'pre_set_site_transient_update_themes', 'loose_check_for_update' );

/**
 * Check for update.
 *
 * @global type $wp_version ??.
 * @global type $theme_version ??.
 * @global type $theme_base ??.
 * @global string $api_url ??.
 * @param type $checked_data ??.
 * @return type
 */
function loose_check_for_update( $checked_data ) {
	global $wp_version, $theme_version, $theme_base, $api_url;

	$request = array(
		'slug' => $theme_base,
		'version' => $theme_version,
	);
	// Start checking for an update.
	$send_for_check = array(
		'body' => array(
			'action' => 'theme_update',
			'request' => serialize( $request ),
			'api-key' => md5( esc_url( home_url() ) ),
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . esc_url( home_url() ),
	);
	$raw_response = wp_remote_post( $api_url, $send_for_check );
	if ( ! is_wp_error( $raw_response ) && ( 200 == $raw_response['response']['code'] ) ) {
		$response = unserialize( $raw_response['body'] ); }

	// Feed the update data into WP updater.
	if ( ! empty( $response ) ) {
		$checked_data->response[ $theme_base ] = $response; }

	return $checked_data;
}

// Take over the Theme info screen on WP multisite.
add_filter( 'themes_api', 'loose_theme_api_call', 10, 3 );

/**
 * Call to API to check updates.
 *
 * @global type $theme_base
 * @global string $api_url
 * @global type $theme_version
 * @global string $api_url
 * @param type $def ??.
 * @param type $action ??.
 * @param type $args ??.
 * @return \WP_Error|boolean
 */
function loose_theme_api_call( $def, $action, $args ) {
	global $theme_base, $api_url, $theme_version, $api_url;

	if ( $args->slug != $theme_base ) {
		return false; }

	// Get the current version.
	$args->version = $theme_version;
	$request_string = prepare_request( $action, $args );
	$request = wp_remote_post( $api_url, $request_string );

	if ( is_wp_error( $request ) ) {
		$res = new WP_Error( 'themes_api_failed', __( 'An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>', 'loose' ), $request->get_error_message() );
	} else {
		$res = unserialize( $request['body'] );

		if ( false === $res ) {
			$res = new WP_Error( 'themes_api_failed', __( 'An unknown error occurred', 'loose' ), $request['body'] ); }
	}

	return $res;
}

if ( is_admin() ) {
	$current = get_transient( 'update_themes' ); }
