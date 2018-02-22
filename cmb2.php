<?php

add_action( 'cmb2_admin_init', 'cf_cf7_download_file_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cf_cf7_download_file_register_demo_metabox() {
	$prefix = 'cf_cf7_download_';
	$post_id = isset( $_GET['post'] ) ? $_GET['post'] : false;
	$file = get_post_meta( $post_id, 'cf_cf7_download_file', true );

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_1 = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Opções', 'cf-cf7-download-file' ),
		'object_types'  => array( 'cf-cf7-file' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
	) );

	$cmb_1->add_field( array(
		'name' => esc_html__( 'Arquivo', 'cf-cf7-download-file' ),
		'desc' => esc_html__( 'Faça o upload de um arquivo ou digite uma URL.', 'cf-cf7-download-file' ),
		'id'   => $prefix . 'file',
		'type' => 'file',
		'attributes' => array(
			'placeholder' => 'http://'
		),
	) );

	if( $file ) :

		$cmb_2 = new_cmb2_box( array(
			'id'            => $prefix . 'shortcode',
			'title'         => esc_html__( 'Use este Shortcode', 'cf-cf7-download-file' ),
			'object_types'  => array( 'cf-cf7-file' ), // Post type
			// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
			'context'    => 'side',
			// 'priority'   => 'high',
			// 'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
			// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
			// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
		) );
		

		$cmb_2->add_field( array(
			'name' => view_shortcode_download_file( $file ),
			'desc' => esc_html__( 'Copie o código acima e cole dentro do formulário de contato.', 'cmb2' ),
			'id'   => $prefix . 'shortcode',
			'type' => 'title',
		) );

	endif;

}