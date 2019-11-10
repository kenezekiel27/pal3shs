$(document).ready(function(){
    $('.personal_btn').click(function(){
        $('#Academic_info').hide();
        $('#personal_information').show();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').hide();
        
    });
    $('.address_btn').click(function(){
        $('#Academic_info').hide();
        $('#personal_information').hide();
        $('#address').show();
        $('#guardian_info').hide();
        $('#educational_background').hide();
        $('#enrollment').hide();
    });
    $('.guardian_btn').click(function(){
        $('#Academic_info').hide();
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').show();
        $('#educational_background').hide();
        $('#enrollment').hide();
    });
    $('.educational_btn').click(function(){
        $('#Academic_info').hide();
        $('#personal_information').hide();
        $('#address').hide();
        $('#guardian_info').hide();
        $('#educational_background').show();
        $('#enrollment').hide();
    });
    $('.enrollment_btn').click(function(){
        $('#Academic_info').hide();
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
   /* $('.update_personal_info').click(function(e){
        var id = e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + 'adminpage/updateStudentPersonalInfo',
            dataType: 'json',
            data: {
                'id':id,
                'lrn':$('#update_lrn').val(),
                'lname':$('#update_lname').val(),
                'fname':$('#update_fname').val(),
                'mname':$('#update_mname').val(),
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
    });*/
});