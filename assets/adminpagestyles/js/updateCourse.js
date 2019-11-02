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
				'subjects' : $('.subjects').val()
			},
			success: function (respone){
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
				},2000);
			}
		});
	})
	$('.btn-success').click(function(){
		$(this).css({
            "background-color": "#28a745",
            "color": "#fff",
            "border-color" : "#28a745"
        });
	})
})