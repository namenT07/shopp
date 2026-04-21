<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

$writeAccess = false;
$access_type = get_filesystem_method();
if( $access_type === 'direct' ){
	/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
	$creds = request_filesystem_credentials( admin_url(), '', false, false, array() );
	/* initialize the API */
	if ( ! WP_Filesystem( $creds ) ) {
		/* any problems and we exit */
		return false;
	}
	global $wp_filesystem;
	$writeAccess = true;
	if( empty( $wp_filesystem ) ){
		require_once ( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();
	}
	if( !$wp_filesystem->is_dir( WPMU_PLUGIN_DIR ) ){
		/* directory didn't exist, so let's create it */
		$wp_filesystem->mkdir( WPMU_PLUGIN_DIR );
	}
  $plugin_dir = EOS_SW_PLUGIN_DIR . '/mu-plugins/eos-switch-theme.php';
  $destination = WPMU_PLUGIN_DIR.'/eos-switch-theme.php';
	$copied = @$wp_filesystem->copy( $plugin_dir,$destination );
  if ( !$copied ) {
      echo __( 'Failed to create eos-switch-theme.php mu-plugin','eos-framework' );
  }
	update_option( 'eos_themes', wp_get_themes() );
	set_transient( 'freesoul-sw-notice-succ', true, 5 );
}
else{
	set_transient( 'freesoul-sw-notice-fail', true, 5 ); /* don't have direct write access. Prompt user with our notice */
}
