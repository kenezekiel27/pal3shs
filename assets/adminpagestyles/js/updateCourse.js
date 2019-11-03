$(document).ready(function(){

	$(document).click(function(e){
		if(e.target.id == "newCourse"){

		}
		else if(e.target.id == "courseDescription"){
			$('.courseDescription').hide();
			$('.newCourse').show();
		}
		else{
			$('.newCourse').hide();
			$('.courseDescription').show();
		}
	});

	$('.viewAvailableSubjectBtn').click(function(){
		$('.subjectToAdd').show();
		$('.coursesubject').hide();

		$('.listofsubject').hide();
		$('.viewsemester').val("default");
		$('.viewyearlevel').val("default");
		$('.addsubjecttocoursewarning2').empty();
		$('.removeBtn').hide();
		$('.removesubjects').select2("val",'');
	})
	$('.courseSubjectBtn').click(function(){

		$('.subjectToAdd').hide();
		$('.coursesubject').show();
		
		$('.listofavailablesubject').hide();
		$('.semester').val("default");
		$('.yearlevel').val("default");
		$('.addsubjecttocoursewarning').empty();
		$('.saveBtn').hide();
		$('.subjects').select2("val",'');
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
		var yearlevel = $('.viewyearlevel').val();
		var semester = $('.viewsemester').val();
		var status = 0;
		
		if(yearlevel == "Grade 11" && semester == "1st Sem"){
			status = 1;
		}
		else if(yearlevel == "Grade 11" && semester == "2nd Sem"){
			status = 2;
		}
		else if(yearlevel == "Grade 12" && semester == "1st Sem"){
			status = 3;
		}
		else if(yearlevel == "Grade 12" && semester == "2nd Sem"){
			status = 4;
		}
		$.ajax({
			url: base_url + 'adminpage/removeCourseData',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'removesubjects' : $('.removesubjects').val(),
				'status' : status
			},
			success: function (response){
				if(response.status == 'error'){
					render_response('.addsubjecttocoursewarning','danger',response.msg);
				}
				else{
					//render_response('.addsubjecttocoursewarning','success',response.msg);
					$(".removeBtn").prop("disabled",true);
					$.toast({
						heading: 'Subject removed from '+semester+' '+' of '+yearlevel+'',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#dc3545',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 4123000,
						stack: 6,
			      	});
					setTimeout(function(){
						window.location = base_url + 'course/'+id;
					},2500);
				}
				
			}
		});
		

	});
	$('.saveBtn').click(function(){
		var id = $('.id').val();
		var yearlevel = $('.yearlevel').val();
		var semester = $('.semester').val();
		var status = 0;
		if(yearlevel == "Grade 11" && semester == "1st Sem"){
			status = 1;
		}
		else if(yearlevel == "Grade 11" && semester == "2nd Sem"){
			status = 2;
		}
		else if(yearlevel == "Grade 12" && semester == "1st Sem"){
			status = 3;
		}
		else if(yearlevel == "Grade 12" && semester == "2nd Sem"){
			status = 4;
		}
		$.ajax({
			url: base_url + 'adminpage/updateCourseData',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'subjects' : $('.subjects').val(),
				'status' : status
			},
			success: function (response){
				if(response.status == 'error'){
					render_response('.addsubjecttocoursewarning','danger',response.msg);
				}
				else{
					//render_response('.addsubjecttocoursewarning','success',response.msg);
					$(".saveBtn").prop("disabled",true);
					$.toast({
						heading: 'Subject added to '+semester+' '+' of '+yearlevel+'',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						bgColor: '#28a745',
						textColor:'white',
						textAlign: 'center',
						hideAfter: 4123000,
						stack: 6,
	              	});
					setTimeout(function(){
						window.location = base_url + 'course/'+id;
					},2500);
				}
				
			}
		});
	})
	$('.semester').change(function(){
		var yearlevel = $('.yearlevel').val();
		if(!yearlevel){
			render_response('.addsubjecttocoursewarning','danger','Please select Year Level');
		}
		else{
			$('.listofavailablesubject').show();
			$('.subjects').val("");
			$('.subjects').select2('val','');
		}
	});
	$('.yearlevel').change(function(){
		var semester = $('.semester').val();
		if(!semester){

			//render_response('.addsubjecttocoursewarning','danger','Please select Year Level');
		}
		else{
			$('.addsubjecttocoursewarning').empty();
			$('.listofavailablesubject').show();
			$('.subjects').select2('val','');
		}
	})
	$('.btn-success').click(function(){
		$(this).css({
            "background-color": "#28a745",
            "color": "#fff",
            "border-color" : "#28a745"
        });
	});

	$('.viewsemester').change(function(){
		var yearlevel = $('.viewyearlevel').val();
		var status = 0;
		if(!yearlevel){
			render_response('.addsubjecttocoursewarning2','danger','Please select Year Level');
		}
		else{
			$('.listofsubjecttext').text("Subjects of " + yearlevel+' '+$(this).val());
			$('.listofsubject').show();
			$('.subjects').val("");
			$('.subjects').select2('val','');


		}
		if(yearlevel == 'Grade 11' && $(this).val() == '1st Sem'){
			status = 1;
		}
		else if(yearlevel == 'Grade 11' && $(this).val() == '2nd Sem'){
			status = 2;
		}
		else if(yearlevel == 'Grade 12' && $(this).val() == '1st Sem'){
			status = 3;
		}
		else if(yearlevel == 'Grade 12' && $(this).val() == '2nd Sem'){
			status = 4;
		}
		$.ajax({
			url: base_url + 'adminpage/listofsubjectperlevel',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'status' : status
			},
			success: function(response){
				$('.removesubjects').empty();
				$.each(response.listofsubject, function(idx, obj) {
					console.log(obj.id);
					var option = $('<option value="'+obj.id+'">'+obj.subject_description+'</option>');
					$('.removesubjects').append(option);
				});
			}
		});
	});
	$('.viewyearlevel').change(function(){
		var semester = $('.viewsemester').val();
		var status = 0;
		if(!semester){
		}
		else{
			$('.addsubjecttocoursewarning2').empty();
			$('.listofsubjecttext').text("Subjects of " + $(this).val()+' '+semester);
			$('.listofsubject').show();
			$('.subjects').select2('val','');
		}
		if(semester == '1st Sem' && $(this).val() == 'Grade 11'){
			status = 1;
		}
		else if(semester == '2nd Sem' && $(this).val() == 'Grade 11'){
			status = 2;
		}
		else if(semester == '1st Sem' && $(this).val() == 'Grade 12'){
			status = 3;
		}
		else if(semester == '2nd Sem' && $(this).val() == 'Grade 12'){
			status = 4;
		}
		$.ajax({
			url: base_url + 'adminpage/listofsubjectperlevel',
			type: 'post',
			dataType: "json",
			data:{
				'id' : $('.id').val(),
				'status' : status
			},
			success: function(response){
				$('.removesubjects').empty();
				$.each(response.listofsubject, function(idx, obj) {
					console.log(obj.id);
					var option = $('<option value="'+obj.id+'">'+obj.subject_description+'</option>');
					$('.removesubjects').append(option);
				});
			}
		});
	})



})