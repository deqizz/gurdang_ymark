$(document).ready(function() {
	initValidatorStyle();
	initValidatorFormMain();
	initValidatorFormPass();
	// console.log(idx);
	
});
function initValidatorFormMain(){
	var validator = $( "#myForm" ).validate({
		rules: {
			email:{
		        required: true,
		        remote: {
		          url: base_url+"/admin/provider/check_code",
		          type: "post",
		          data: {
		            id: function() {
		              return $( "input[name=user_login_id]" ).val();
		            }
		          }
		        }
			},
           password: { 
             required: true,
                minlength: 6,
                maxlength: 50

           } , 
               password_conf: { 
                equalTo: "#password",
                 minlength: 6,
                 maxlength: 50
           }
        },
        messages:{
	      email:{
	        required: "This field is required.",
	        remote: "This email already exist."
	      }
	    }
	});
}
function initValidatorFormPass(){
	var validator = $( "#passwordForm" ).validate({
		rules: {
			old_password:{
		        required: true,
		        remote: {
		          url: base_url+"/data/pegawai/check_password",
		          type: "post",
		          data: {
		            id: function() {
		              return $( "input[name=id]" ).val();
		            }
		          }
		        }
			},
           new_password: { 
             required: true,
                minlength: 6,
                maxlength: 50

           } , 
               new_password_conf: { 
                equalTo: "#new_password",
                 minlength: 6,
                 maxlength: 50
           }
        },
        messages:{
	      old_password:{
	        required: "This field is required.",
	        remote: "Password salah"
	      }
	    }
	});
}

$('#modal-admin').on('hide.bs.modal', function () {
    $("#myForm").trigger("reset");
	$('.password').show();
    $("#myForm").validate().resetForm();
    $("#myForm").get(0).reset();
    $("#myForm").data('changed', 0);
});


$(document).on('click','.change-pass',function(){
	var id = $(this).attr('id');
	$('[name="id"]').val(id);
});

function change_pass(){
	var validator = $( "#passwordForm" ).validate();
	  if(validator.form()){
	    var data = $('#passwordForm').serialize();
	    // $.post('url', data);
	    var api = base_url+"data/pegawai/change_pass";
	    
	    $.post(api, data).done(function( data ) {
	      if (data == "1"){
	        bootbox.alert("Password berhasil diubah.", function(){
	          location.reload();
	        })
	      }else{
	        bootbox.alert("Gagal mengubah password.");
	      }   
	    });
	    console.log(base_url);
	  }
}