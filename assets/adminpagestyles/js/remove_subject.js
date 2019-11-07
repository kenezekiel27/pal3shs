$(document).ready(function(){
	$('.remove_subject').click(function(e){
		var id = e.target.id;
		var answer = confirm('Are you sure you want to remove this?');
		if(answer){
			$.ajax({
				url: base_url + 'adminpage/removeSubject',
				type: 'post',
				dataType: "json",
				data:{
					'id' : id
				},
				success: function(response){
					$.toast({
						text: 'Subject has been removed.',
						position: 'bottom-center',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 2000,
						stack: 6
			        });
					$('.updateSubjectBtn'+id).attr("disabled", true);
					$('.remove_subject').prop("disabled", true);
					setTimeout(function(){
					  $('.row-'+id).hide("slow");
					  //$('.totalno').text(parseInt($('.totalno').text()) -1);
					}, 1000);
				}
			})
			
		}
	});
	$('.removeOneSubject').click(function(){
		var answer = confirm('Are you sure you want to remove this?');
		if(answer){
			$.ajax({
				url: base_url + 'adminpage/removeSubject',
				type: 'post',
				dataType: "json",
				data:{
					'id' : $('.id').val(),
				},
				success: function(response){
					window.location = base_url + 'subject';
				}
			});
		}
		
	})
	
})