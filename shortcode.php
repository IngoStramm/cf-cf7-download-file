<?php
// add_shortcode( 'file_to_download', 'file_to_download_func' );

function file_to_download_func( $atts ) {
    $a = shortcode_atts( array(
    	'file' => null
    ), $atts );
    $file = wp_upload_dir( null, false, false );
    $file =  $file['baseurl'] . '/' . $a['file'];
    ob_start(); ?>
    <?php /* ?><input type="text" name="file_to_download" id="file_to_download" class="file_to_download" value="<?php echo $file; ?>"><?php */ ?>
    [text file-to-download id:file-to-download class:file-to-download "<?php echo $file; ?>"]
    <?php
}

// exibe o shortcode sem renderizá-lo
function view_shortcode_download_file( $file ) {
	if( $file ) :
		$url_pieces = explode( '/', $file );
		return '[hidden file-to-download id:file-to-download class:file-to-download "' . $url_pieces[count( $url_pieces ) - 3] . '/' . $url_pieces[count( $url_pieces ) - 2] . '/' . $url_pieces[count( $url_pieces ) - 1] . '"]';
		// return '[file_to_download file="' . $url_pieces[count( $url_pieces ) - 3] . '/' . $url_pieces[count( $url_pieces ) - 2] . '/' . $url_pieces[count( $url_pieces ) - 1] . '"]';
	endif;
}

// Permite que o shortcode funcione no wpcf7
add_filter( 'wpcf7_form_elements', 'cf_cf7_download_files_wpcf7_form_elements' );

function cf_cf7_download_files_wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );
	return $form;
}