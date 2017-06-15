$(document).ready(function() {
	// console.log(idx);
	$(document).ready(function() {
    $('#dataTables-export').DataTable( {
    dom: 'Bfrtip',
         buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
         ]
    } );
} );
});
