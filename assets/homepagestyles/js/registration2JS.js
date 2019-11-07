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
                /*adress*/
                'brgy': $('#brgy').val(),
                'municipality': $('#municipality').val(),
                'province': $('#province').val(),
                /*guardian info*/
                'g_lname':$('#g_lname').val(),
                'g_fname':$('#g_fname').val(),
                'g_mname':$('#g_mname').val(),
                'g_relationship':$('#g_relationship').val(),
                'g_contact':$('#g_contact').val(),
                'g_brgy':$('#g_brgy').val(),
                'g_municipality':$('#g_municipality').val(),
                'g_province':$('#g_province').val(),
                /*educational background*/
                'school_name':$('#school_name').val(),
                'degree':$('#degree').val(),
                'course':$('#course').val(),
                's_brgy':$('#s_brgy').val(),
                's_municipality':$('#s_municipality').val(),
                's_province':$('#s_province').val(),
                'year_from':$('#year_from').val(),
                'year_to':$('#year_to').val(),
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
                    $('#brgy').val("");
                    $('#municipality').val("");
                    $('#province').val("");
                    $('#g_lname').val("");
                    $('#g_fname').val("");
                    $('#g_mname').val("");
                    $('#g_relationship').val("");
                    $('#g_contact').val("");
                    $('#g_brgy').val("");
                    $('#g_municipality').val("");
                    $('#g_province').val("");
                    $('#school_name').val("");
                    $('#degree').val("");
                    $('#course').val("");
                    $('#s_brgy').val("");
                    $('#s_municipality').val("");
                    $('#s_province').val("");
                    $('#year_from').val("");
                    $('#year_to').val("");
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