$(document).ready(function(){
	$('.removed_student').click(function(e){
		var id = e.target.id;
		var answer = confirm('Are you sure you want to remove this?');
		if(answer){
			$.ajax({
				url: base_url + 'adminpage/removeStudent',
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
			        $('.viewBtn1'+id).attr("disabled",true);
					$('.confirmBtn1'+id).attr("disabled", true);
					$('.id1'+id).prop("disabled", true);
					setTimeout(function(){
					  $('.row1-'+id).hide("slow");
					  //$('.totalno').text(parseInt($('.totalno').text()) -1);
					}, 1000);
				}
			})
			
		}
	});
})