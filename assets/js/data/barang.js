$(document).ready(function() {
    // console.log("Blablabla");
  // $("form[name='form-requester-institutions']").validate();
  // $("#myForm").validate({
  //      submitHandler: function(form) {
  //        form.submit();
  //    }
  // });
  initCloseBtn();
});
function initCloseBtn(){
  var $form = $('form'),
    origForm = $form.serialize();

  $('form :input').on('change input', function() {
      if($form.serialize() !== origForm){
        $("#myForm").data('changed', 1);
      }
  });

  $('.close-modal').on('click', function(e){
    e.preventDefault();
    if($("#myForm").data('changed') == 1) {
      bootbox.dialog({
        message: "Apakah anda yakin akan menutup form ini? form akan direset ketika ditutup",
        buttons: {
          close: {
            label: "Cancel",
            className: "btn-default flat",
            callback: function () {
              $(this).modal('hide');
            }
          },
          danger: {
            label: "Confirm",
            className: "btn-primary flat",
            callback: function () {
              $('#modal-admin').modal('hide');
            }
          }
        }
      });
    }else{
      $('#modal-admin').modal('hide');
    }
  });
}

function post_data(){

  var validator = $( "#myForm" ).validate();
  if(validator.form()){
    var data = $('#myForm').serialize();
    // $.post('url', data);
    var api = base_url+"data/barang/post";
    
    $.post(api, data).done(function( data ) {
      if (data == "1"){
        bootbox.alert("Data barang berhasil disimpan.", function(){
          location.reload();
        })
      }else{
        bootbox.alert("Gagal menyimpan data.");
      }   
    });
    console.log(base_url);
  }
}

$('#modal-admin').on('hide.bs.modal', function () {
    $("#myForm").validate().resetForm();
    $("#myForm").trigger("reset");
    $("#myForm").get(0).reset();
    $("#myForm").data('changed', 0);
});

$(document).on('click','.delete',function(){
  var idx = $(this).closest('tr').attr('idx');
  var tr = $(this).closest('tr');
  
  bootbox.confirm("Apakah anda yakin akan menghapus data barang "+$(tr).find('td').eq(1).html()+" - "+$(tr).find('td').eq(2).html()+"? ", function(result){
    if (result) {
      $.post( base_url+"data/barang/delete", {id : idx}).done(function( data ) {
        if (data == '0'){
          bootbox.alert("Data berhasil dihapus.", function(){
            location.reload();
          })
        } else {
          bootbox.alert('Data gagal dihapus.');
        }
      });
    }else{
    }
  });
});

$(document).on('click','.update',function(){
  $('#myForm').trigger("reset");
  var idx = $(this).closest('tr').attr('idx');
  var tr = $(this).closest('tr');
  $('#active').show();
  $.post( base_url+"data/barang/get_by_id", {idx: idx}).done(function( data1 ) {
    var json = $.parseJSON(data1);
    console.log(json)
    $('[name="kode_brg"]').val(json.kode_brg);
    $('[name="nama_brg"]').val(json.nama_brg);
    $('[name="kode_kategori"]').val(json.kode_kategori);
    $('[name="merk"]').val(json.merk);
    $('[name="harga"]').val(json.harga);
    $('[name="nip_bag_gudang"]').val(json.nip_bag_gudang);
    $('[name="id_supplier"]').val(json.id_supplier);
  });
});
