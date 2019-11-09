$(document).ready(function(){
	$('.confirmBtn1').click(function(e){
		var id = e.target.id;
		$.ajax({
			url: base_url + 'adminpage/confirmStudent',
			type: 'post',
			dataType: "json",
			data:{
				'id' : id
			},
			success: function(response){
				$.toast({
					text: 'Student registration has been confirmed.',
					position: 'bottom-center',
					loaderBg: '#ff6849',
					icon: 'success',
					hideAfter: 2000,
					stack: 6
		        });
		        $('.viewBtn1'+id).attr("disabled",true);
				$('.con1'+id).attr("disabled", true);
				$('.id1'+id).prop("disabled", true);
				setTimeout(function(){
				  $('.row1-'+id).hide("slow");
				  //$('.totalno').text(parseInt($('.totalno').text()) -1);
				}, 1000);
			}
		})
	});
})