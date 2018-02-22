<?php

add_action( 'wp_enqueue_scripts','cf_cf7_download_file_scripts' );

function cf_cf7_download_file_scripts() {
    wp_enqueue_script( 'cf-cf7-download-file-js', plugins_url( '/assets/js/cf-cf7-download-file.js', __FILE__ ), array( 'jquery' ), null,  true );
}

