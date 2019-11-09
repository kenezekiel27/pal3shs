$(document).ready(function(){
	$('.confirmBtn2').click(function(e){
		var id = e.target.id;
		$.ajax({
			url: base_url + 'adminpage/confirmTeacher',
			type: 'post',
			dataType: "json",
			data:{
				'id' : id
			},
			success: function(response){
				$.toast({
					text: 'Teacher registration has been confirmed.',
					position: 'bottom-center',
					loaderBg: '#ff6849',
					icon: 'success',
					hideAfter: 2000,
					stack: 6
		        });
		        $('.viewBtn2'+id).attr("disabled",true);
				$('.con2'+id).attr("disabled", true);
				$('.id2'+id).prop("disabled", true);
				setTimeout(function(){
				  $('.row2-'+id).hide("slow");
				  //$('.totalno').text(parseInt($('.totalno').text()) -1);
				}, 1000);
			}
		})
	});
})