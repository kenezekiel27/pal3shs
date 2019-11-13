$(document).ready(function(){
	$('.viewStudent').click(function(e){
		var id = e.target.id;
		var academic_year = $('.academic_year'+id).val();
		var academic_level = $('.academic_level'+id).val();
		var status = $('.status'+id).val();
		var course = $('.course'+id).val();
		var semester = $('.semester'+id).val();
		var sectionName = $('.sectionName'+id).val();
		var subject_code = $('.subject_code'+id).val();
		var subject_description = $('.subject_description'+id).val();
		$.ajax({
			url: base_url + 'teacherpage/setSessionForData',
			type: 'post',
			dataType: "json",
			data:{
				'academic_year':academic_year,
				'academic_level':academic_level,
				'status':status,
				'course':course,
				'semester':semester,
				'sectionName':sectionName,
				'subject_code' : subject_code,
				'subject_description' : subject_description
			},
			success: function(response){
				if (response.status == "success") {
					window.location = base_url+"my-students-list";
				}
			}
		})
	})
})