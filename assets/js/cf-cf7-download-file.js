jQuery( function( $ ) {

	$(document).ready(function(){
		wpcf7_trigger();
	}); // $(document).ready

	var wpcf7_trigger = function() {
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			var inputs = event.detail.inputs;
			var file = '';
			for ( var i = 0; i < inputs.length; i++ ) {
				if ( 'file-to-download' == inputs[i].name ) {
					file = site_url + '/wp-content/uploads/' + inputs[i].value;
					break;
				}
			}
			if( file ) {
				console.log('Sucesso: ' + file);
				$( 'body' ).append( '<a href="' + file + '" id="temp-file-to-download-click"></a> ');
				$( '#temp-file-to-download-click' ).get(0).click();
				$( '#temp-file-to-download-click' ).remove();
			} else {
				console.log('Nenhum arquivo encontrado: ' + file);
			}
		}, false );

	};

});
