<?php
/**
 * @package ConverteFácil: Contact Form 7 Download File
 */
/*
Plugin Name: ConverteFácil: Contact Form 7 Download File
Plugin URI: https://convertefacil.com.br
Description: Plugin que permite adicionar um arquivo para ser baixado após o envio do formulário. Este plugin funciona em conjunto com o <a href="https://br.wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> e o plugin <a href="https://br.wordpress.org/plugins/cmb2/" target="_blank">CMB2</a>.
Version: 1.0.1
Author: Ingo Stramm
Author URI: https://convertefacil.com.br
License: GPLv2 or later
Text Domain: cf-cf7-download-file
*/

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
require_once dirname( __FILE__ ) . '/required_plugins.php';
require_once dirname( __FILE__ ) . '/class-post-type.php';
require_once dirname( __FILE__ ) . '/post-type.php';
require_once dirname( __FILE__ ) . '/cmb2.php';
require_once dirname( __FILE__ ) . '/shortcode.php';
require_once dirname( __FILE__ ) . '/assets.php';

add_action( 'wp_head', 'add_global_site_url' );

function add_global_site_url() {
	?>
	<script>var site_url = '<?php echo get_site_url(); ?>';</script>
	<?php
}