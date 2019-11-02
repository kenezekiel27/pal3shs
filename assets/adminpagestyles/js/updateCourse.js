$(document).ready(function(){
	$('.viewAvailableSubjectBtn').click(function(){
		$('.subjectToAdd').show();
		$('.coursesubject').hide();
	})
	$('.courseSubjectBtn').click(function(){

		$('.subjectToAdd').hide();
		$('.coursesubject').show();
		
	})
	$('.subjects').change(function(){
		var subjects = $('.subjects').val();
		var saveBtn = $('.saveBtn');
		if(subjects != null){
			saveBtn.show();
		}
		else{
			saveBtn.hide();
		}
	});
	$('.removesubjects').change(function(){
		var subjects = $('.removesubjects').val();
		var saveBtn = $('.removeBtn');
		if(subjects != null){
			saveBtn.show();
		}
		else{
			saveBtn.hide();
		}
	});
	$('.removeBtn').click(function(){
		var id = $('.id').val();
		$.ajax({
			url: base_url + 'adminpage/removeCourseData',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'removesubjects' : $('.removesubjects').val()
			},
			success: function (respone){
				$(".removeBtn").prop("disabled",true);
				$.toast({
					text: 'Subject removed.',
					position: 'bottom-center',
					loaderBg: '#ff6849',
					icon: 'error',
					hideAfter: 44000,
					stack: 6
		      	});
				setTimeout(function(){
					window.location = base_url + 'course/'+id;
				},2000);
			}
		})
		

	});
	$('.saveBtn').click(function(){
		var id = $('.id').val();
		$.ajax({
			url: base_url + 'adminpage/updateCourseData',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'subjects' : $('.subjects').val(),
				'year_level' : $('.yearlevel').val(),
				'semester': $('.semester').val()
			},
			success: function (response){
				if(response.status == 'error'){
					render_response('.addsubjecttocoursewarning','danger',response.msg);
				}
				else{
					render_response('.addsubjecttocoursewarning','success',response.msg);
					$(".saveBtn").prop("disabled",true);
					$.toast({
						text: 'Subject added.',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 44000,
						stack: 6
	              	});
					setTimeout(function(){
						window.location = base_url + 'course/'+id;
					},2123000);
				}
				
			}
		});
	})
	$('.semester').change(function(){
		var yearlevel = $('.yearlevel').val();
		var semester = $('.semester').val();
		var forgrade11one = $('.forgrade11one');
		var status = 0;
		if(!yearlevel){
			render_response('.addsubjecttocoursewarning','danger','Please select Year Level');
		}
		else{
			$('.forgrade11one').show();
			if(yearlevel == "Grade 11" && semester == "1st Sem"){
				status = 1;
				
			}
			else if(yearlevel == "Grade 11" && semester == "2nd Sem"){
				status = 2;
			}
			$.ajax({
				url: base_url + 'adminpage/updateCourseData',
				type: 'post',
				dataType: "json",
				data:{
					'id' : $('.id').val(),
					'subjects' : $('.subjects').val(),
					'year_level' : $('.yearlevel').val(),
					'semester': $('.semester').val(),
					'status' : status
				},
				success: function(response){
					$('.subjects').empty();
					$.each(response.subjects, function(idx, obj) {
						console.log(obj.id);
						var option = $('<option value="'+obj.id+'">'+obj.id+'</option>');
						$('.subjects').append(option);
					});
				}
			});
		}
	});
	$('.yearlevel').change(function(){
		$('.addsubjecttocoursewarning').empty();
	})
	$('.btn-success').click(function(){
		$(this).css({
            "background-color": "#28a745",
            "color": "#fff",
            "border-color" : "#28a745"
        });
	})
})