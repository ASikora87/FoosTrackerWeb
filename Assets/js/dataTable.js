// Order by total goals by default
$(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );

// Init table
$(document).ready(function() {
    $('#dataTable').DataTable();
} );