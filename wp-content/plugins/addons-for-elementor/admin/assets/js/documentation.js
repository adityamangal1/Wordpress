jQuery(document).ready(function ($) {

    // Tabs
    $( ".inline-list" ).each( function() {
        $( this ).find( "li" ).each( function(i) {
            $( this).click( function(){
                $( this ).addClass( "current" ).siblings().removeClass( "current" )
                    .parents( "#wpbody" ).find( "div.panel-left" ).removeClass( "visible" ).end().find( 'div.panel-left:eq('+i+')' ).addClass( "visible" );
                return false;
            } );
        } );
    } );


    // Scroll to anchor
    $( ".anchor-nav a, .toc a" ).click( function(e) {
        e.preventDefault();

        var href = $( this ).attr( "href" );
        $( "html, body" ).animate( {
            scrollTop: $( href ).offset().top - 50
        }, 'slow', 'swing' );
    } );


    // Back to top links
    $( ".livemesh-doc .panel-left h3" ).append( $( "<a class='back-to-top' href='#panel'><span class='dashicons dashicons-arrow-up-alt2'></span> Back to top</a>" ) );


    // Add lightbox to cloud links
    $( "a[href*='cl.ly']:not(.direct-link)" ).each( function() {

        // Add thickbox class to each cloud link
        $( this ).addClass( 'thickbox' );

        // Add the iframe code to each cloud link
        var imgUrl = $( this ).attr( "href" ) + '?TB_iframe=true&width=1200&height=700';

        // Set the new url
        $( this ).attr( "href", imgUrl );
    } );

});