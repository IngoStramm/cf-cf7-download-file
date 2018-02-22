<?php
add_action( 'cmb2_admin_init', 'cf_cf7_download_file_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function cf_cf7_download_file_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cf_cf7_download_file_options = new_cmb2_box( array(
		'id'           => 'cf_cf7_download_file_page',
		'title'        => esc_html__( 'Opções de Download', 'cf-cf7-download-file' ),
		'object_types' => array( 'options-page' ),

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'cf_cf7_download_file', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'cf-cf7-download-file' ), // Falls back to 'title' (above).
		'parent_slug'     => 'wpcf7', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'cf-cf7-download-file' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'      => 'yourprefix_options_page_message_callback',
	) );


	// $group_field_id is the field id string, so in this case: 'demo'
	$group_field_id = $cf_cf7_download_file_options->add_field( array(
		'id'          => 'cf_cf7_download_file',
		'type'        => 'group',
		'description' => esc_html__( 'Gerenciamento de arquivos usados nos formulários', 'cf-cf7-download-file' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Arquivo {#}', 'cf-cf7-download-file' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Adicionar outro arquivo', 'cf-cf7-download-file' ),
			'remove_button' => esc_html__( 'Remover arquivo', 'cf-cf7-download-file' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cf_cf7_download_file_options->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Arquivo', 'cf-cf7-download-file' ),
		'id'         => 'file',
		'type'       => 'file',
		'attributes' => array(
			'placeholder' => 'http://'
		),
		// 'before_row' => 'cf_cf7_download_file_render_row_cb',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
}

function cf_cf7_download_file_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<?php if( $value ) : ?>
		<pre>ID: <?php echo $id; ?></pre>
		<pre>Valor: <?php echo $value; ?></pre>
	<?php endif; ?>
	<?php
}
