<?php
defined( 'ABSPATH' ) ||  exit; // Exit if accessed directly
if( !is_admin() && empty( $_POST ) ){
	if( !isset( $_GET['page_id'] ) && !isset( $_GET['p'] ) ){
		$uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$uriArr = explode( '?',$uri );
		$uri = $uriArr[0];
		$home_uri = str_replace( 'https://','',str_replace( 'http://','',home_url( '/' ) ) );
		if( $uri !== $home_uri ){
			$arr = explode( '/',$uri );
			if( $arr[count( $arr ) - 1] !== '' ){
				$uri = $arr[count( $arr ) - 1];
			}
			else{
				$uri = isset( $arr[count( $arr ) - 2] ) ? str_replace( $home_uri,'',$uri ) : false;
			}
			$p = $uri ? get_page_by_path( esc_attr( $uri ),'OBJECT',eos_sw_get_post_types() ) : false;
			$eos_page_id = is_object( $p ) ? $p->ID : false;
		}
		else{
			$eos_page_id = get_option( 'page_on_front' );
		}
	}
	else{
		$eos_page_id = isset( $_GET['page_id'] ) ? absint( $_GET['page_id'] ) : absint( $_GET['p'] );
	}
	if( defined( 'EOS_SW_CUSTOM_URLS' ) ){
		$themes_by_url = EOS_SW_CUSTOM_URLS;
		if( isset( $themes_by_url[$uri] ) ){
			define( 'EOS_SW_THEME_BY_URL',esc_attr( $themes_by_url[$uri] ) );
		}
	}
	if( $eos_page_id || defined( 'EOS_SW_THEME_BY_URL' ) ){
		add_action( 'plugins_loaded','eos_replace_theme',99 );
	}

}
function eos_replace_theme(){
	global $eos_page_id;
	$value = false;
	if( $eos_page_id ){
		$value = get_post_meta( $eos_page_id, '_eos_replace_theme_always_key', true ) != '' ? get_post_meta( $eos_page_id, '_eos_replace_theme_always_key', true ) : false;
	}
	if( defined( 'EOS_SW_THEME_BY_URL' ) || $value || ( isset( $_GET['freesoul_off_nonce'] ) && wp_verify_nonce( $_GET['freesoul_off_nonce'],'freesoul_off_nonce' ) ) ){
		add_filter( 'stylesheet','eos_swt_get_theme' );
		add_filter( 'template','eos_swt_get_parent_theme' );
	}
}

//Replace theme for preview
function eos_swt_get_theme( $stylesheet ){
	global $eos_page_id;
	$theme = false;
	if( defined( 'EOS_SW_THEME_BY_URL' ) ){
		$theme = EOS_SW_THEME_BY_URL;
	}
	else{
		if( isset( $_GET['theme'] ) ){
			$theme = $_GET['theme'];
		}
		else{
			$theme = get_post_meta( $eos_page_id,'_theme_name_replace_key',true );
		}
	}
	return $theme ? esc_attr( $theme ) : $stylesheet;
}
//Return parent theme
function eos_swt_get_parent_theme( $template ){
	global $eos_page_id;
	if( defined( 'EOS_SW_THEME_BY_URL' ) ){
		$child_theme = EOS_SW_THEME_BY_URL;
	}
	else{
		if( isset( $_GET['theme'] ) ){
			$child_theme = sanitize_key( $_GET['theme'] );
		}
		else{
			$child_theme = get_post_meta( $eos_page_id,'_theme_name_replace_key',true );
		}
	}
	$themes = wp_get_themes();
	if( !isset( $themes[$child_theme] ) ) return $child_theme;
	$theme = $themes[$child_theme];
	if( isset( $theme->template ) ){
		return $theme->template;
	}
	return $template;
}

//Return post types supported by the plugin
function eos_sw_get_post_types(){
	return defined( 'EOS_SW_POST_TYPES' ) ? EOS_SW_POST_TYPES : array( 'page','post' );
}
