$(document).ready(function(){
    $('#academic_info :input').prop('readonly',true);
     $('#personal_btn').click(function(){
        $('#personal_information').show();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').hide();
    });
    $('#address_btn').click(function(){
        $('#personal_information').hide();
        $('#address').show();
        $('#guardian_info').hide();
        $('#educational_background').hide();
    });
    $('#guardian_btn').click(function(){
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').show();
        $('#educational_background').hide();
    });
    $('#educational_btn').click(function(){
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').show();
    });
    $('.update_personal_info').click(function(){
        $.ajax({
            type: "POST",
            url: base_url + 'studentpage/updateStudentPersonalInfo',
            dataType: 'json',
            data: {
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
    $('.update_address_info').click(function(){
        $.ajax({
            type: "POST",
            url: base_url + 'studentpage/updateStudentAddressInfo',
            dataType: 'json',
            data: {
                'lrn':$('#update_lrn').val(),
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
    $('.update_guardian_info').click(function(){
        $.ajax({
            type: "POST",
            url: base_url + 'studentpage/updateStudentGuardianInfo',
            dataType: 'json',
            data: {
                'lrn':$('#update_lrn').val(),
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
    $('.update_education_info').click(function(){
        $.ajax({
            type: "POST",
            url: base_url + 'studentpage/updateStudentEducationalInfo',
            dataType: 'json',
            data: {
                'lrn':$('#update_lrn').val(),
                'curriculum':$('#update_curriculum').val(),
                'school':$('#update_school').val(),
                's_brgy':$('#update_sbrgy').val(),
                's_municipality':$('#update_smunicipality').val(),
                's_province':$('#update_sprovince').val(),
                's_yearfrom':$('#update_syearfrom').val(),
                's_yearto':$('#update_syearto').val(),
                's_average':$('#update_saverage').val(),
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