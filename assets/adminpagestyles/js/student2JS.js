$(document).ready(function(){
    $('.personal_btn').click(function(){
        $('#Academic_info1').show();
        $('#Academic_info2').hide();
        $('#personal_information').show();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').hide();
        
    });
    $('.address_btn').click(function(){
        $('#Academic_info1').hide();
        $('#Academic_info2').hide();
        $('#personal_information').hide();
        $('#address').show();
        $('#guardian_info').hide();
        $('#educational_background').hide();
        $('#enrollment').hide();
    });
    $('.guardian_btn').click(function(){
         $('#Academic_info1').hide();
        $('#Academic_info2').hide();
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').show();
        $('#educational_background').hide();
        $('#enrollment').hide();
    });
    $('.educational_btn').click(function(){
         $('#Academic_info1').hide();
        $('#Academic_info2').hide();
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').show();
        $('#enrollment').hide();
    });
    $('.enrollment_btn').click(function(){
         $('#Academic_info1').hide();
        $('#Academic_info2').hide();
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').hide();
        $('#enrollment').show();
    });
    $('#academic_year').change(function(){
        $('.dummy').val("sad");
        $('#academic_course').empty();
        $.ajax({
            url: base_url + 'adminpage/getOpenCoursePerAcadYear',
            type: 'post',
            dataType: "json",
            data:{
                'id' : $('#academic_year').val()
            },
            success: function(response){
                var optionSelected = $('<option selected disabled>Select</option>');
                $('#academic_course').append(optionSelected);
                $.each(response.open_course, function(idx, obj) {
                    console.log(obj.id);
                    $('#academic_course').append($('<option value='+obj.course_name+'>'+obj.course_name+'</option>'));
                });

            }
        });
    })
    $('.update_personal_info').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateStudentPersonalInfo',
            dataType: 'json',
            data: {
                /*acad_info*/
                'acad_status':$('#update_acad_status').val(),
                'course':$('#update_course').val(),
                'acad_level':$('#update_acad_level').val(),
                'acad_sem':$('#update_acad_sem').val(),
                'academic_year':$('#update_academic_year option:selected').text(),
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
    $('.update_address_info').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateStudentAddressInfo',
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
    $('.update_guardian_info').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateStudentGuardianInfo',
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
    $('.update_education_info').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateStudentEducationalInfo',
            dataType: 'json',
            data: {
                'id':id,
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