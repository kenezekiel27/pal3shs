$(document).ready(function(){
	$('.add_new_subject').click(function(){
		$.ajax({
			type: "POST",
            url: 'addSubjectPHP.php',
            dataType: 'json',
            data: {
            	'subjectcode': $('#subject_code').val(),
            	'subjectdescription': $('#subject_description').val(),
            	'subjecttype': $('#subject_type').val(),
        	},
        	success: function(response){
        		$('.add_subject_warning').show();
        		render_response('.add_subject_warning', response.type, response.msg);
        		if (response.type == "success") {
        			$('#subject_code').val("");
        			$('#subject_description').val("");
					$('#subject_type').val("");
        		}
        	}
		})

	});
    $('.removed_subject').click(function(e){
        var id = e.target.id;
        
        $('#'+id).css({
            "background-color": "white",
            "color": "black",
            "border" : "2px solid #f44336"
        });
        $(this).text("Removed");
        $(this).prop("disabled", true);
        $.ajax({
            type: "POST",
            url: "removedSubjectPHP.php",
            dataType: "json",
            data:{
                'id':id,
            },  
        });
        setTimeout(function(){
            $('.row'+id).hide("slow");
        }, 1000);
    })
	function render_response(container,status,message){
	    $(container).empty();
	    var div = $('<div class="alert alert-'+status+'" >'+message+ '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
	    $(container).append(div);
	}

});