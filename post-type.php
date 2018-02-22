<?php
$arquivos = new Cf_Cf7_Download_File_Post_Type(
    __( 'Arquivo', 'cf-cf7-download-file' ), // Nome (Singular) do Post Type.
    'cf-cf7-file' // Slug do Post Type.
);

$arquivos->set_labels(
    array(
    	'name'               => __( 'Arquivos', 'cf-cf7-download-file' ),
    	'singular_name'      => __( 'Arquivo', 'cf-cf7-download-file' ),
    	'view_item'          => __( 'Ver Arquivo', 'cf-cf7-download-file' ),
    	'edit_item'          => __( 'Editar Arquivo', 'cf-cf7-download-file' ),
    	'search_items'       => __( 'Pesquisar Arquivo', 'cf-cf7-download-file' ),
    	'update_item'        => __( 'Atualizar Arquivo', 'cf-cf7-download-file' ),
    	'parent_item_colon'  => __( 'Pai Arquivo:', 'cf-cf7-download-file' ),
    	'menu_name'          => __( 'Arquivos dos Formulários', 'cf-cf7-download-file' ),
    	'add_new'            => __( 'Adicionar Novo', 'cf-cf7-download-file' ),
    	'add_new_item'       => __( 'Adicionar Novo Arquivo', 'cf-cf7-download-file' ),
    	'new_item'           => __( 'Novo Arquivo', 'cf-cf7-download-file' ),
    	'all_items'          => __( 'Todos Arquivos', 'cf-cf7-download-file' ),
    	'not_found'          => __( 'Nenhum Arquivo encontrado', 'cf-cf7-download-file' ),
    	'not_found_in_trash' => __( 'Nenhum Arquivo encontrado na lixeira', 'cf-cf7-download-file' )
    )
);

$arquivos->set_arguments(
    array(
        'supports' 			=> array( 'revisions' ),
        'has_archive'		=> false,
        'menu_position'		=> 27
    )
);

add_filter( 'wp_insert_post_data', 'add_custom_title', 10, 2 );

function add_custom_title( $data, $postarr ) {

	if( $data['post_type'] == 'cf-cf7-file' ) :
		$post_id = $_POST['post_ID'];
		if( isset( $_POST['cf_cf7_download_file'] ) && !empty( $_POST['cf_cf7_download_file'] ) ) :
			$title = view_shortcode_download_file( $_POST['cf_cf7_download_file'] );
		elseif( get_post_meta( $post_id, 'cf_cf7_download_file', true ) ) :
			$title = view_shortcode_download_file( get_post_meta( $post_id, 'cf_cf7_download_file', true ) );
		else :
			$title = __( 'Nenhum arquivo adicionado.', 'cf-cf7-download-file' );
		endif;
		$data['post_title'] = $title;
	endif;
	return $data;
}