<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/**
 * Adds a box to the main column on the Posts, Pages and Custom Posts.
 */
function eos_sw_add_meta_box() {
	if( !function_exists( 'eos_sw_get_post_types' ) ) return;
	$screens = eos_sw_get_post_types();
	foreach ( $screens as $screen ) {
			add_meta_box(
				'eos_sw_sectionid',
				__( 'Freesoul Switch Theme', 'eos-sw' ),
				'eos_sw_meta_box_callback',
				$screen,
				'normal',
				'default'
			);
	}
}
add_action( 'add_meta_boxes', 'eos_sw_add_meta_box' );
//Add metabox to switch theme
function eos_sw_meta_box_callback( $post ){
	wp_nonce_field( 'eos_sw_meta_boxes', 'eos_sw_meta_boxes_nonce' );
	?>
	<div id="eos-theme-switch-check" style="margin-top:16px">
		<h2><?php _e( 'Select a different theme for this page.','eos-sw' ); ?></h2>
		<?php $value = get_post_meta( $post->ID,'_theme_name_replace_key',true ); ?>
		<select id="eos-theme-selection" name="eos_sw_admin_meta[_theme_name_replace_key]">
		<?php
		foreach ( wp_get_themes() as $theme => $v ){
			?><option value="<?php echo $theme; ?>"<?php echo $value === $theme ? ' selected' : ''; ?>><?php echo $theme; ?></option><?php
		}
		?>
		</select>
		<a id="eos-switch-theme" class="button" target="_blank" href="<?php echo wp_nonce_url( add_query_arg( array( 'freesoul_off' => 'true','theme' => 'unknown' ),get_permalink() ),'freesoul_off_nonce','freesoul_off_nonce' ); ?>"><?php _e( 'Debug now','eos-sw' ); ?></a>
		<p>
		<?php
		$value = get_post_meta( $post->ID, '_eos_replace_theme_always_key', true ) != '' ? get_post_meta( $post->ID, '_eos_replace_theme_always_key', true ) : false;
		?>
			<input type="checkbox" name="eos_sw_admin_meta[_eos_replace_theme_always_key]" id="eos-replace-theme-always" value="1" <?php checked( $value ); ?> />
			<span><?php _e( 'Check it to always use a different theme for this page. If not checked the chosen theme will be used only for debugging, pressing the button above.','eos-sw' ); ?></span>
		</p>
	</div>
	<?php
}
/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved and object $post the post object.
 */
function eos_sw_save_meta_box_data( $post_id,$post ) {
	if ( ! isset( $_POST['eos_sw_admin_meta'] ) ) return;
	//* Merge user submitted options with fallback defaults
	$data = wp_parse_args( $_POST['eos_sw_admin_meta'], array( '_eos_replace_theme_always_key'  => '','_theme_name_replace_key' => '' ) );
	//* Sanitize
	foreach ( (array) $data as $key => $value ) {
		$data[$key] = sanitize_text_field( $value );
	}
	eos_sw_save_metaboxes( $data, 'eos_sw_meta_boxes', 'eos_sw_meta_boxes_nonce', $post, 'edit_posts' );
}
add_action( 'save_post', 'eos_sw_save_meta_box_data',10,2 );
/**
 *  @brief Save metaboxes
 *
 *  @param [in] $data Array containing the metaboxes field names and values
 *  @param [in] $nonce_action Nonce action
 *  @param [in] $nonce_name Nonce name
 *  @param [in] $post Post where we want to save the metaboxes values
 *  @param [in] $capability Required capability of the user that will save the meta data
 */
function eos_sw_save_metaboxes( array $data, $nonce_action, $nonce_name, $post, $capability = 'edit_posts' ){
	//* Verify the nonce
	if ( ! isset( $_POST[ $nonce_name ] ) || ! wp_verify_nonce( $_POST[ $nonce_name ], $nonce_action ) )
		return;
	//* Don't try to save the data under autosave, ajax, or future post.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) return;
	if ( defined( 'DOING_CRON' ) && DOING_CRON ) return;
	$post = get_post( $post );
	//* Don't save if WP is creating a revision (same as DOING_AUTOSAVE?)
	if ( 'revision' === get_post_type( $post ) ) return;
	//* Check that the user is allowed to edit the post
	if ( ! current_user_can( $capability, $post->ID ) ) return;
	//* Cycle through $data, insert value or delete field
	foreach ( (array) $data as $field => $value ) {
		//* Save $value, or delete if the $value is empty
		if ( false !== $value ) update_post_meta( $post->ID, $field, $value );
	}
	update_option( 'eos_themes', wp_get_themes() );//if a new theme was downloaded we nedd to update this option
}
