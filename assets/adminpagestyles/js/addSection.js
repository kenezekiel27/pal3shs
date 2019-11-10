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

    $('.add_new_section').click(function(){
    	$('.add_new_section').text("Loading");
    	$.ajax({
    		url: base_url + 'adminpage/addNewSection',
			type: 'post',
			dataType: "json",
			data:{
				'no_of_section' : $('.noOfSection').val(),
				'sec_grade' : $('#sec_grade').val(),
				'sec_semester' : $('#sec_semester').val(),
				'sec_acadyear' : $('#sec_acadyear').val(),
				'sec_status' : $('#sec_status').val(),
				'sec_acad_course': $('#sec_acad_course').val()

			},
			success: function(response){
				$('.add_new_section').prop("disabled", true);
				$('.add_new_section').text("Add");
				if (response.status == "success") {
					$('.add_new_section').text("Loading");
					$.toast({
						heading: 'New section is available',
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
				else{
					$('.add_new_section').prop("disabled", false);
					render_response('.add_section_warning',response.status, response.msg);
				}

			}
		});
    })
    $('#sec_acad_course').change(function(){
    	
    	
    	callAjax();
    })


    $('#sec_status').change(function(){
		callAjax();
    })

    $('#sec_grade').change(function(){
    	if($('#sec_status').val() == null){

    	}
    	else{
    		$('#sec_semester').empty();
    		$.ajax({
	    		url: base_url + 'adminpage/checkAcademicLevel',
				type: 'post',
				dataType: "json",
				data:{
					'academiccourse' : $('#sec_acad_course').val(),
					'academiclevel' : $('#sec_grade').val(),
					'academicyear' : $('#sec_acadyear option:selected').text(),
					'status' : $('#sec_status').val(),
					'forgrade': 1
				},
				success: function (response){

					var optionSelected1 = $('<option selected disabled>Select</option>');
					$('#sec_semester').append(optionSelected1);
					if (response.academiclevel == ""){
						$('#sec_grade').append($('<option disabled>All levels has a sections already</option>'));
						$('#sec_semester').append($('<option disabled>All semester has a sections already</option>'));
					}
					else{
						$.each(response.semester, function(idx, obj){
							$('#sec_semester').append($('<option>'+obj+'</option>'));

						})
					}
					
				}
	    	})
    	}
    })
    function callAjax(){
    	if($('#sec_status').val() == null){

    	}
    	else{
    		$('#sec_grade').empty();
    		$('#sec_semester').empty();
    		$.ajax({
	    		url: base_url + 'adminpage/checkAcademicLevel',
				type: 'post',
				dataType: "json",
				data:{
					'academiccourse' : $('#sec_acad_course').val(),
					'academiclevel' : $('#sec_grade').val(),
					'academicyear' : $('#sec_acadyear option:selected').text(),
					'status' : $('#sec_status').val(),
				},
				success: function (response){
					var optionSelected = $('<option selected disabled>Select</option>');
					$('#sec_grade').append(optionSelected);

					var optionSelected1 = $('<option selected disabled>Select</option>');
					$('#sec_semester').append(optionSelected1);
					if (response.academiclevel == ""){
						$('#sec_grade').append($('<option disabled>All levels has a sections already</option>'));
						$('#sec_semester').append($('<option disabled>All semester has a sections already</option>'));
					}
					else{
						
						$.each(response.academiclevel, function(idx, obj) {
							console.log(obj.id);
							$('#sec_grade').append($('<option>'+obj+'</option>'));
						});
						$.each(response.semester, function(idx, obj){
							$('#sec_semester').append($('<option>'+obj+'</option>'));

						})
					}
					
				}
	    	})
    	}
    }

    // add adviser

    var idOfSection;
    $('.openAdviser').click(function(e){
    	$('.selectAdviser').empty();
    	var id = e.target.id;
    	idOfSection = id;
    	$.ajax({
    		url: base_url + 'adminpage/checkIfAdviser',
			type: 'post',
			dataType: "json",
			data:{},
			success: function(response){
				if (response.teachers == "") {
					$('.hideifnoteacheravailable').hide();
					$('.showifnoteacheravailable').show();
				}
				else{
					$('.hideifnoteacheravailable').show();
					$('.showifnoteacheravailable').hide();
					var optionSelected = $('<option selected disabled>Select</option>');
					$('.selectAdviser').append(optionSelected);
					// var string = JSON.stringify(response.teachers);
					// var data = JSON.parse(string);
					$.each(response.teachers, function(idx, obj) {
					
						$('.selectAdviser').append($('<option value='+obj.id+'>'+obj.name+'</option>'));
					});
				}
				
			}
    	});
    })
    $('.addAdviserBtn').click(function(){
    	var adviserid = $('.selectAdviser').val();
    	$.ajax({
    		url: base_url + 'adminpage/addAdviserToSection',
			type: 'post',
			dataType: "json",
			data:{
				'adviserid' : adviserid,
				'id': idOfSection
			},
			success: function(response){
				if (response.status == "danger") {
					render_response('.addadvisertosectionwarning', response.status, response.msg)
				}
				else{
					
			    	$('.addAdviserBtn').text("Loading");
			    	$('.addAdviserBtn').prop("disabled", true);

			      	setTimeout(function(){
			      		$('.adviser'+idOfSection).empty();
				    	$('.adviser'+idOfSection).append('<p>'+response.name+'</p>');
			      		$('.addAdviserBtn').text("Add");
			    		$('.addAdviserBtn').prop("disabled", false);
			      		$.toast({
							heading: 'Teacher has been assigned',
							position: 'bottom-center',
							loaderBg: '#ff6849',
							bgColor: '#28a745',
							textColor:'white',
							textAlign: 'center',
							hideAfter: 2000,
							stack: 6,
				      	});
						$('#add_adviser_form').modal('hide');
					},2500);
				}
			}
    	})
    	
    });
    $('#add_adviser_form').on('hidden.bs.modal', function(){
      $('.selectAdviser').val("Select");
    });

    // REMOVE SECTION
    $('.removeSectionBtn').click(function(e){
    	var id = e.target.id;
    	var answer = confirm("Are you sure you want to remove this?");
    	if (answer) {
    		if ($('.noOfStudent'+id).val() != '0') {
    			
    			$.toast({
					heading: "Can't remove section with existing student.",
					position: 'bottom-center',
					loaderBg: '#ff6849',
					bgColor: '#dc3545',
					textColor:'white',
					textAlign: 'center',
					hideAfter: 2000,
					stack: 6,
		      	});
    		}
    		else{
    			

    			$.ajax({
    				url: base_url + 'adminpage/removeSection',
					type: 'post',
					dataType: "json",
					data:{
						'id': id
					},
					success: function(response){
						if (response.status == "success") {
							
							$('.adviser'+id).prop("disabled", true);
			    			$('.removesection'+id).prop("disabled", true);
			    			$('.viewSectionBtn'+id).attr("disabled", true);
			    			setTimeout(function(){
			    				$.toast({
									heading: 'Section has been removed',
									position: 'bottom-center',
									loaderBg: '#ff6849',
									bgColor: '#28a745',
									textColor:'white',
									textAlign: 'center',
									hideAfter: 2000,
									stack: 6,
						      	});
			                	$('.sectionrow-'+id).hide("slow");
			                }, 1000);
						}
						
					}
    			})
    		}
    	}
    })
})