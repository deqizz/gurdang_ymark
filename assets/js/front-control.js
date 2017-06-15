
function openCalendar(el){
	// $('#myModalCalendar').show();
	var idx = $(el).attr('data-id');
	var jam_buka = $(el).attr('data-jam-buka');
	var jam_tutup = $(el).attr('data-jam-tutup');
	$('.modal-body').empty();
	$('.modal-body').append("<span class='col-md-2'></span><h4 class='col-md-8'><center>11 November 2016</center></h4><button class='btn btn-default col-md-2'>></button>");
	$('.modal-body').append("<table class='table table-hover table-responsive table-striped table-bordered jadwal' id='table-jadwal'>"+
		"<tr><td>Jam</td><td>Nama Penyewa</td><td></td></tr>"+
	"</table>");
	
	for (var i = parseInt(jam_buka); i <= parseInt(jam_tutup); i++) {
		// console.log(i);
		$('#table-jadwal').append("<tr data-jam = '"+i+"'><td>"+i+".00</td class='nama'><td></td><td class='action'><button class='btn btn-default'>Booking</button></td></tr>");
	}
	$.post( base_url+"welcome/get_jadwal_lapangan", {idx: idx,tgl_sewa:0}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		if(json.length != 0 ){
			for (var i = 0; i < json.length; i++) {
				console.log(json[i]);
				for (var k = parseInt(json[i].jam_mulai); k <= parseInt(json[i].jam_selsai); k++) {
					console.log(k);
					var a =$("tr[data-jam='" + k +"']");
					// $(a).append('<td>asd</td>');
					$(a).addClass('warning');
					$(a).find('td:nth-child(2)').append(json[i].nama);
					$(a).find('td:nth-child(3)').empty();
					// console.log(a);
				}
			}
		}
	});
}