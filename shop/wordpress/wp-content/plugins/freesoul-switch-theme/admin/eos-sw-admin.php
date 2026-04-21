<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'admin_init', function(){
	$previous_version = get_option( 'EOS_SW_VERSION' );
	$version_compare = version_compare( $previous_version, EOS_SW_VERSION,'<' );
	if( $version_compare && EOS_SW_NEED_UPDATE_MU ){
		//if the plugin was updated and we need to update also the mu-plugin
		define( 'EOS_SW_DOING_MU_UPDATE',true );
		unlink( WPMU_PLUGIN_DIR.'/eos-switch-theme.php' );
		require EOS_SW_PLUGIN_DIR.'/plugin-activation.php';
		update_option( 'EOS_SW_VERSION',EOS_SW_VERSION );
		set_transient( 'freesoul-sw-updating-mu',5 );
	}
} );
add_action( 'admin_notices', function(){
	//It creates the transient needed for displaing plugin notices after activation
	if( get_transient( 'freesoul-sw-notice-fail' ) ){
		delete_transient( 'freesoul-sw-notice-fail' );
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php _e( 'You have no direct write access, Freesoul Switch Theme was not able to create the necessary mu-plugin and will not work.', 'eos-sw' ); ?></p>
	</div>
	<?php
	}
}, 100 );