$(document).ready(function(){
	

    $('.add_acad_year_btn').click(function(){
    	$(this).text("Loading");
    	$.ajax({
    		url: base_url + 'adminpage/addAcadYear',
			type: 'post',
			dataType: "json",
			data:{
				'acadYear' : $('.selectAcadYear').val(),
				'courseOpen' : $('.openCourse').val()
			},
			success : function(response){
				$('.add_acad_year_btn').text("Add");
				$('.add_acad_year_btn').prop("disabled", true);
				if(response.status == "danger"){
					render_response('.add_acadyear_warning', response.status , response.msg);
					$('.add_acad_year_btn').prop("disabled", false);
				}
				else{
					$('.add_acad_year_btn').text("Loading");
					$.toast({
						heading: 'New academic year is available',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 4123000,
						stack: 6,
			      	});
			      	setTimeout(function(){
						window.location = base_url + 'section';
					},2500);
				}
			}
    	})
    });

    $('.selectAcadYear').change(function(){
    	var course = $('.openCourse').val();
    	if(course != null && $(this).val() != null ){
    		$('.add_acad_year_btn').show();
    		
    	}
    	else{
    		$('.add_acad_year_btn').hide();
    	}
    })
     $('.openCourse').change(function(){
    	var year = $('.selectAcadYear').val();
    	if(year != null && $(this).val() != null){
    		$('.add_acad_year_btn').show();
    		
    	}
    	else{
    		$('.add_acad_year_btn').hide();
    	}
    })


     //for add section
     $('.noOfSection').on('keyup keydown', function(e){
        if($(this).val() < 0){
            e.preventDefault();
            $(this).val("1");
        }
        else if ($(this).val() > 20){
            e.preventDefault();
            $(this).val("20");
        }
    })

     $('#sec_acadyear').change(function(){
     	$('#sec_acad_course').empty();
     	$.ajax({
    		url: base_url + 'adminpage/getOpenCoursePerAcadYear',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('#sec_acadyear').val()
			},
			success: function(response){
				var optionSelected = $('<option selected disabled>Select</option>');
				$('#sec_acad_course').append(optionSelected);
				$.each(response.open_course, function(idx, obj) {
					console.log(obj.id);
					$('#sec_acad_course').append($('<option>'+obj.course_name+'</option>'));
				});

			}
		});
     })
})