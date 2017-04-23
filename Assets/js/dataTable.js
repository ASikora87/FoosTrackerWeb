// Order by total goals by default
var table;
$(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
    table = $('#dataTable').DataTable();
} );