$(document).ready(function(){
	$('.noOfSection').on('keyup keydown', function(e){
        if($(this).val() < 0){
            e.preventDefault();
            $(this).val("1");
        }
        else if ($(this).val() > 20){
            e.preventDefault();
            $(this).val("20");
        }
    })

    $('.add_new_section').click(function(){
    	
    })
})