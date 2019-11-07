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

	$('.updateSubjectCodeBtn').click(function(){
		$.ajax({
			url: base_url + 'adminpage/updateNameOfSubject',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'newName' : $('.subjectCode').val(),
				'rowName' : 'subject_code',
				'originalSubjectCode' : $('.originalSubjectCode').val()
			},
			success: function(response){
				if(response.status == "error"){
					render_response('.updatenamesofsubject','danger',response.msg);
				}
				else{
					$('.originalSubjectCode').val($('.subjectCode').val());
					$('.updatenamesofsubject').empty();
					$.toast({
						heading: 'Subject Code has been updated',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 2000,
						stack: 6,
			      	});
				}
			}
		})
	})
	$('.updateSubjectDescriptionBtn').click(function(){
		$.ajax({
			url: base_url + 'adminpage/updateNameOfSubject',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'newName' : $('.subjectDescription').val(),
				'rowName' : 'subject_description',
				'originalSubjectDescription' : $('.originalSubjectDescription').val()
			},
			success: function(response){
				if(response.status == "error"){
					render_response('.updatenamesofsubject','danger',response.msg);
				}
				else{
					$('.originalSubjectDescription').val($('.subjectDescription').val());
					$('.updatenamesofsubject').empty();
					$.toast({
						heading: 'Subject Description has been updated',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 2000,
						stack: 6,
			      	});
				}
			}
		})
	})
	$('.updateSubjectTypeBtn').click(function(){
		$.ajax({
			url: base_url + 'adminpage/updateNameOfSubject',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'newName' : $('.subjectType').val(),
				'rowName' : 'subject_type',
				'originalSubjectType' : $('.originalSubjectType').val()
			},
			success: function(response){
				if(response.status == "error"){
					render_response('.updatenamesofsubject','danger',response.msg);
				}
				else{
					$('.originalSubjectType').val($('.subjectType').val());
					$('.updatenamesofsubject').empty();
					$.toast({
						heading: 'Subject Type has been updated',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 2000,
						stack: 6,
			      	});
				}
			}
		})
	})
})