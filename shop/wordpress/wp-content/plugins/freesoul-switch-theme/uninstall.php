<?php
if( !defined( 'WP_UNINSTALL_PLUGIN') ){
    die;
}
delete_site_option( 'eos_themes' );
delete_site_option( 'EOS_SW_VERSION' );
delete_post_meta_by_key( '_eos_replace_theme_always_key' );
delete_post_meta_by_key( '_theme_name_replace_key' );
