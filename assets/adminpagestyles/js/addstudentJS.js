$(document).ready(function(){
	$('.add-student-info').click(function(){
		$.ajax({
			type: "POST",
            url: 'addstudent.php',
            dataType: 'json',
            data: {
            	'lname': $('#lname').val(),
            	'fname': $('#fname').val(),
            	'mname': $('#mname').val(),
            	'bday': $('#bday').val(),
            	'lrn': $('#lrn').val(),
        	},
        	success: function(response){
        		$('.info-warning').show();
        		render_response('.info-warning', response.type, response.msg);
        		if (response.type == "success") {
        			$('#lname').val("");
        			$('#fname').val("");
					$('#mname').val("");
					$('#bday').val("");
					$('#lrn').val("");
        		}
        	}
		})

	})
	function render_response(container,status,message){
	    $(container).empty();
	    var div = $('<div class="alert alert-'+status+'" >'+message+ '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
	    $(container).append(div);

	}
});