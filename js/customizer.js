/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	wp.customize( 'zerif_logo', function( value ) {		value.bind( function( to ) {			if( to != '' ) {				$( '.navbar-brand img' ).removeClass( 'zerif_hidden_if_not_customizer' );				$( '.zerif_header_title' ).addClass( 'zerif_hidden_if_not_customizer' );			}			else {				$( '.navbar-brand img' ).addClass( 'zerif_hidden_if_not_customizer' );				$( '.zerif_header_title' ).removeClass( 'zerif_hidden_if_not_customizer' );			}			$( '.navbar-brand img' ).attr( 'src', to );		} );	} );	wp.customize( 'zerif_copyright', function( value ) {		value.bind( function( to ) {			if( to != '' ) {				$( 'footer .copyright' ).removeClass( 'zerif_hidden_if_not_customizer' );			}			else {				$( 'footer .copyright' ).addClass( 'zerif_hidden_if_not_customizer' );			}			$( 'footer .copyright' ).text( to );		} );	} );
	
	
	
	
} )( jQuery );
