$(document).ready(function(){
	$('.teachers').change(function(){
		if($(this).val() != null){
			$('.addTeacherBtn').show();
		}
		else{
			$('.addTeacherBtn').hide();
		}
	})
	$('.addTeacherBtn').click(function(){
		var id = $('.id').val();
		$(".addTeacherBtn").prop("disabled",true);
		$.ajax({
			url: base_url + 'adminpage/addTeacherToSubject',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'teachers' : $('.teachers').val()
			},
			success: function(response){
				if(response.status == "success"){
					$.toast({
						heading: 'Successfully added a teacher',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 4123000,
						stack: 6,
			      	});
					setTimeout(function(){
						window.location = base_url + 'subject/'+id;
					},2500);
				}
				
			}
		})
		
	});
	$('.viewTeacher').click(function(){
		$('.addTeacherToSubject').hide();
		$('.viewTeacherDiv').show();
		$('.teachers').select2("val",'');
		
	})
	$('.addTeacher').click(function(){
		$('.addTeacherToSubject').show();
		$('.viewTeacherDiv').hide();
		$('.removeteachers').select2("val",'');
	})
	$('.removeteachers').change(function(){
		if($(this).val() != null){
			$('.removeTeacherBtn').show();
		}
		else{
			$('.removeTeacherBtn').hide();
		}
	})
	$('.removeTeacherBtn').click(function(){
		var id = $('.id').val();
		$(".removeTeacherBtn").prop("disabled",true);
		$.ajax({
			url: base_url + 'adminpage/removeTeacherFromSubject',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'removeteachers' : $('.removeteachers').val()
			},
			success: function(response){
				if (response.status == "success") {
					$.toast({
						heading: 'Successfully removed a teacher',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 4123000,
						stack: 6,
			      	});
					setTimeout(function(){
						window.location = base_url + 'subject/'+id;
					},2500);
				}
			}
		})
		
	})
})