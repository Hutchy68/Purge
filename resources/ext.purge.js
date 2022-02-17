
mw.loader.using( [ 'mediawiki.api', 'mediawiki.notify' ] ).then( function () {

	document.querySelector( '#ca-purge a' ).addEventListener( 'click', function ( e ) {
		var postArgs = { action: 'purge', titles: mw.config.get( 'wgPageName' ) };
		new mw.Api().post( postArgs ).then( function () {
			location.reload();
		}, function () {
			mw.notify( mw.msg( 'purge-failed' ), { type: 'error' } );
		} );
		e.preventDefault();
	} );

} );
