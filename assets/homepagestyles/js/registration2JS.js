$(document).ready(function(){
	$('.sendBtn').click(function(){
		$.ajax({
			type: "POST",
            url: base_url + 'homepage/addteacher',
            dataType: 'json',
            data: {
                //Personal Info
            	'lrn': $('#lrn').val(),
            	'lname': $('#lname').val(),
            	'fname': $('#fname').val(),
                'mname': $('#mname').val(),
                'sex': $('#sex').val(),
                'bday': $('#bday').val(),
                'bplace': $('#bplace').val(),
                'age': $('#age').val(),
                'height': $('#height').val(),
                'weight': $('#weight').val(),
                'language': $('#language').val(),
                'religion': $('#religion').val(),
                'ethnic_group': $('#ethnic_group').val(),
                'telephone': $('#telephone').val(),
                'mobile': $('#mobile').val(),
                'email': $('#email').val(),
        	},
        	success: function(response){
        		$('.send_info_warning').show();
        		
        		if (response.status== "success") {
        			$('#lrn').val("");
        			$('#lname').val("");
                    $('#fname').val("");
                    $('#mname').val("");
                    $('#sex').val("");
                    $('#bday').val("");
                    $('#bplace').val("");
                    $('#age').val("");
                    $('#height').val("");
                    $('#weight').val("");
                    $('#language').val("");
                    $('#religion').val("");
                    $('#ethnic_group').val("");
                    $('#telephone').val("");
                    $('#mobile').val("");
                    $('#email').val("");
                    render_response('.send_info_warning', 'success', response.msg);
        		}
                else{
                    render_response('.send_info_warning', 'danger', response.msg);
                }

        	}
		})

	});
	function render_response(container,status,message){
	    $(container).empty();
	    var div = $('<div class="alert alert-'+status+'" >'+message+ '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
	    $(container).append(div);
	}

});