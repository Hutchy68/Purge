
mw.loader.using( [ 'mediawiki.api' ] ).then( function () {

	$( "#ca-purge-ext a" ).on( 'click', function ( e ) {
		var postArgs = { action: 'purge', titles: mw.config.get( 'wgPageName' ) };
		new mw.Api().post( postArgs ).then( function () {
			location.reload();
		}, function () {
			mw.notify( mw.msg( 'purge-failed' ), { type: 'error' } );
		} );
		e.preventDefault();
	} );

} );
