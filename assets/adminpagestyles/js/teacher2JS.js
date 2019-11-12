$(document).ready(function(){
    $('#personalbtn').click(function(){
    	$('#Academic_info').show();
        $('#personal_information').show();
		$('#address').hide();
		$('#guardian_info').hide();
		$('#educational_background').hide();
		
    });
    $('#addressbtn').click(function(){
    	$('#Academic_info').hide();
        $('#personal_information').hide();
		$('#address').show();
		$('#guardian_info').hide();
		$('#educational_background').hide();
    });
    $('#guardianbtn').click(function(){
    	$('#Academic_info').hide();
        $('#personal_information').hide();
		$('#address').hide();
		$('#guardian_info').show();
		$('#educational_background').hide();
    });
    $('#educationalbtn').click(function(){
    	$('#Academic_info').hide();
        $('#personal_information').hide();
		$('#address').hide();
		$('#guardian_info').hide();
		$('#educational_background').show();
    });
    $('.update_teacher_personal_info').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateTeacherPersonalInfo',
            dataType: 'json',
            data: {
                'id':id,
                'lrn':$('#update_lrn').val(),
                'lname':$('#update_lname').val(),
                'fname':$('#update_fname').val(),
                'mname':$('#update_mname').val(),
                'sex':$('#update_sex').val(),
                'bday':$('#update_bday').val(),
                'bplace':$('#update_bplace').val(),
                'age':$('#update_age').val(),
                'height':$('#update_height').val(),
                'weight':$('#update_weight').val(),
                'language':$('#update_language').val(),
                'religion':$('#update_religion').val(),
                'egroup':$('#update_egroup').val(),
                'telephone':$('#update_telephone').val(),
                'mobile':$('#update_mobile').val(),
                'email':$('#update_email').val(),
            },
            success: function(response){
                $('.personal_warning').show();
                if (response.status== "success") {
                    render_response('.personal_warning', 'success', response.msg);
                }
                else{
                    render_response('.personal_warning', 'danger', response.msg);
                }

            }
        })
    });
     $('.update_teacher_address/**/').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateTeacherAddressInfo',
            dataType: 'json',
            data: {
                'id':id,
                'brgy':$('#update_brgy').val(),
                'municipality':$('#update_municipality').val(),
                'province':$('#update_province').val(),
            },
            success: function(response){
                $('.address_warning').show();
                if (response.status== "success") {
                    render_response('.address_warning', 'success', response.msg);
                }
                else{
                    render_response('.address_warning', 'danger', response.msg);
                }

            }
        })
    });
    $('.update_teacher_guardian').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateTeacherGuardianInfo',
            dataType: 'json',
            data: {
                'id':id,
                'g_lname':$('#update_g_lname').val(),
                'g_fname':$('#update_g_fname').val(),
                'g_mname':$('#update_g_mname').val(),
                'g_relation':$('#update_g_relation').val(),
                'g_contact':$('#update_g_contact').val(),
                'g_brgy':$('#update_g_brgy').val(),
                'g_municipality':$('#update_g_municipality').val(),
                'g_province':$('#update_g_province').val(),
            },
            success: function(response){
                $('.guardian_warning').show();
                if (response.status== "success") {
                    render_response('.guardian_warning', 'success', response.msg);
                }
                else{
                    render_response('.guardian_warning', 'danger', response.msg);
                }

            }
        })
    });
    $('.update_teacher_education').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateTeacherEducationalInfo',
            dataType: 'json',
            data: {
                'id':id,
               	'school':$('#update_school').val(),
				'degree':$('#update_degree').val(),
				'course':$('#update_course').val(),
				'sbrgy':$('#update_sbrgy').val(),
				'smunicipality':$('#update_smunicipality').val(),
				'sprovince':$('#update_sprovince').val(),
				'syearfrom':$('#update_syearfrom').val(),
				'syearto':$('#update_syearto').val(),
            },
            success: function(response){
                $('.education_warning').show();
                if (response.status== "success") {
                    render_response('.education_warning', 'success', response.msg);
                }
                else{
                    render_response('.education_warning', 'danger', response.msg);
                }

            }
        })
    });
});