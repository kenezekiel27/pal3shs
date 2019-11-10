$(document).ready(function(){
    $('.personal_information :input').prop("readonly", true);
    $('.address :input').prop("readonly", true);
    $('.guardian_info :input').prop("readonly", true);
    $('.educational_background :input').prop("readonly", true);
    $('.Academic_info :input').prop("readonly", true);

    $('.personalbtn').click(function(){
        $('.Academic_info').show();
        $('.personal_information').show();
        $('.address').hide();
        $('.guardian_info').hide();
        $('.educational_background').hide();
        $('.enrollment').hide();

        
    });
    $('.addressbtn').click(function(){
        $('.Academic_info').hide();
        $('.personal_information').hide();
        $('.address').show();
        $('.guardian_info').hide();
        $('.educational_background').hide();
        $('.enrollment').hide();
    });
    $('.guardianbtn').click(function(){
        $('.Academic_info').hide();
        $('.personal_information').hide();
        $('.address').hide();
        $('.guardian_info').show();
        $('.educational_background').hide();
        $('.enrollment').hide();
    });
    $('.educationalbtn').click(function(){
        $('.Academic_info').hide();
        $('.personal_information').hide();
        $('.address').hide();
        $('.guardian_info').hide();
        $('.educational_background').show();
        $('.enrollment').hide();
    });
    $('.enrollmentbtn').click(function(){
        $('.Academic_info').hide();
        $('.personal_information').hide();
        $('.address').hide();
        $('.guardian_info').hide();
        $('.educational_background').hide();
        $('.enrollment').show();
    });
    $('#acadyear_current').change(function(){
        $('.dummy').val("sad");
        $('#acad_course').empty();
        $.ajax({
            url: base_url + 'adminpage/getOpenCoursePerAcadYear',
            type: 'post',
            dataType: "json",
            data:{
                'id' : $('#acadyear_current').val()
            },
            success: function(response){
                var optionSelected = $('<option selected disabled>Select</option>');
                $('#acad_course').append(optionSelected);
                $.each(response.open_course, function(idx, obj) {
                    console.log(obj.id);
                    $('#acad_course').append($('<option value='+obj.course_name+'>'+obj.course_name+'</option>'));
                });

            }
        });
    })
    $('.enrollbtn').click(function(e){
        var id = e.target.id;
        
        $.ajax({
            type: "POST",
            url: base_url + 'homepage/enrollStudent',
            dataType: 'json',
            data: {
                'id':id,
                'acad_status':$('#acad_status').val(),
                'course':$('#acad_course').val(),
                'acad_level':$('#enroll_acad_level').val(),
                'acad_sem':$('#enroll_acad_sem').val(),
                'acad_year':$('#acadyear_current option:selected').text(),
                'dummy' : $('.dummy').val()
            },
            success: function(response){
                $('.send_info_warning').show();
                if (response.status== "success") {
                    $('#acad_course').val("");
                    $('#enroll_acad_level').val("");
                    $('#enroll_acad_sem').val("");
                    $('#acadyear_current').val("");
                    render_response('.send_info_warning', 'success', response.msg);
                }
                else{
                    render_response('.send_info_warning', 'danger', response.msg);
                }

            }
        })
    });
})