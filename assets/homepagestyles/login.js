$(document).ready(function(){
	$('.loginBtn').click(function(){
		var username = $('.username').val();
		var password = $('.password').val();
		// if (username == "" || password == "") {
		// 	$('.loginwarning').show();
		// 	render_response('.loginwarning','danger','All fields are required!');
		// }
		// else{
		// 	$('.loginwarning').show();
		// 	render_response('.loginwarning','success','Logging in. Please wait!');

		// 	var div = $('<div class="spinner-border" role="status"><span class="sr-only">Loading..</span></div>');
		// 	$('.alert-success').append(div);


		// }
		$.ajax({
			url : base_url + 'homepage/login',
			type:'post',
			dataType: 'JSON',
			data:{
				'username':username,
				'password':password
			},
			success: function(response){
				$('.loginwarning').show();
				if (response.status == "error") {
					
					render_response('.loginwarning','danger',response.msg);
					
				}
				else{
					if(response.credentials.restriction == "admin"){
						window.location = base_url + 'dashboard';
					}
					else if(response.credentials.restriction == "student"){
						window.location = base_url + 'dashboard-student';
					}
					else if(response.credentials.restriction == "teacher"){
						window.location = base_url + 'dashboard-teacher';
					}
					render_response('.loginwarning','success',response.msg);
				}
				
			}
		})
	})
})