jQuery( function( $ ){
    $( '#filtercat' ).change(function(){ // submit
        var filter = $(this);

        $.ajax({
            url : filterjs.url, // url ajax.php
            data : filter.serialize(),
            type : 'POST', // POST / GET
            beforeSend : function( xhr ){
               // filter.find( 'button' ).text( 'Loading...' );
            },
            success : function( data ){
                //filter.find( 'button' ).text( 'Filter' );
                $( '#filterresult' ).html(data);
                console.log( data );
            }
        });
        return false;
    });
});
