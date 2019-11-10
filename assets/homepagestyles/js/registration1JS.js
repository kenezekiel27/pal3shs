$(document).ready(function(){
    var old_curriculum= 0;
    var type = "";
    $('#oldcurriculum-transferee').change(function(){
        if ($(this).is(':checked')) {
            $('.old_curriculum :input').prop("disabled", false);
            $('#jshs :input').prop("disabled", true);
            old_curriculum = 1;
        }
        else{
            $('.old_curriculum :input').prop("disabled", true);
            $('#jshs :input').prop("disabled", false);
            old_curriculum = 0;

        }
    });
    $(document).ready(function(){
        $('.new').click(function(){
            $('.new_student').show();
            $('.old_student').hide();
            $('.transferee_student').hide();
            $('.registration_form').show();
            type="new";
        });
        $('.old').click(function(){
            $('.new_student').hide();
            $('.old_student').show();
            $('.transferee_student').hide();
            $('.registration_form').show();
            type="old";
        });
         $('.transferee').click(function(){
            $('.new_student').hide();
            $('.old_student').hide();
            $('.transferee_student').show();
            $('.registration_form').show();
            type="transferee";
        });
    });
	$('.sendBtn1').click(function(){
		$.ajax({
			type: "POST",
            url: base_url + 'homepage/addstudent',
            dataType: 'json',
            data: {
                'old_curriculum' :old_curriculum,
                'type' :type,
                /*academic info*/
                'new_acad_level' :$('#new_acad_level').val(),
                'new_course' :$('#new_course').val(),
                'new_semester' :$('#new_semester').val(),
                'new_year' :$('#new_year').val(),
                /*'new_yearto' :$('#new_yearto').val(),*/
                'old_course' :$('#old_course').val(),
                'old_acad_level' :$('#old_acad_level').val(),
                'old_semester' :$('#old_semester').val(),
                'old_year' :$('#old_year').val(),
                /*'old_to' :$('#old_to').val(),*/
                'transfer_course' : $('#transfer_course').val(),
                'transfer_acad_level' : $('#transfer_acad_level').val(),
                'transfer_semester' : $('#transfer_semester').val(),
                'transfer_year' : $('#transfer_year').val(),
               /* 'transfer_to' : $('#transfer_to').val(),*/
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
                /*student address*/
                'brgy':$('#brgy').val(),
                'municipality':$('#municipality').val(),
                'province':$('#province').val(),
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
                'old_school':$('#old_school').val(),
                'old_brgy':$('#old_brgy').val(),
                'old_municipality':$('#old_municipality').val(),
                'old_province':$('#old_province').val(),
                'old_yearfrom':$('#old_yearfrom').val(),
                'old_yearto':$('#old_yearto').val(),
                'old_average':$('#old_average').val(),
                'jshs_school':$('#jshs_school').val(),
                'jshs_brgy':$('#jshs_brgy').val(),
                'jshs_municipality':$('#jshs_municipality').val(),
                'jshs_province':$('#jshs_province').val(),
                'jshs_yearfrom':$('#jshs_yearfrom').val(),
                'jshs_yearto':$('#jshs_yearto').val(),
                'jshs_average':$('#jshs_average').val(),
        	},
        	success: function(response){
        		$('.send_info_warning').show();
        		
        		if (response.status== "success") {
                    $('#new_acad_level').val("");
                    $('#new_course').val("");
                    $('#new_semester').val("");
                    $('#new_yearfrom').val("");
                    $('#new_yearto').val("");
                    $('#old_course').val("");
                    $('#old_acad_level').val("");
                    $('#old_semester').val("");
                    $('#old_from').val("");
                    $('#old_to').val("");
                    $('#transfer_course').val("");
                    $('#transfer_acad_level').val("");
                    $('#transfer_semester').val("");
                    $('#transfer_from').val("");
                    $('#transfer_to').val("");
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
                    $('#old_school').val("");
                    $('#old_brgy').val("");
                    $('#old_municipality').val("");
                    $('#old_province').val("");
                    $('#old_yearfrom').val("");
                    $('#old_yearto').val("");
                    $('#old_average').val("");
                    $('#jshs_school').val("");
                    $('#jshs_brgy').val("");
                    $('#jshs_municipality').val("");
                    $('#jshs_province').val("");
                    $('#jshs_yearfrom').val("");
                    $('#jshs_yearto').val("");
                    $('#jshs_average').val("");

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