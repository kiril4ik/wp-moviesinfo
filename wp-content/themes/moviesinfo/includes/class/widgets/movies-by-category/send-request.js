$( ".widget-sort-by" ).click(function() {
    console.log(this.id);
    $.get( "/wp-admin/admin-ajax.php", { sort_by: this.id } )
        .done(function( data ) {
            alert( "Data Loaded: " + data );
        });
});