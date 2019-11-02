$(document).ready(function(){

  $('#add_course_form').on('hidden.bs.modal', function(){
      $('#track').val("");
      $('#strand').val("");
      $('.add_course_warning').empty();
    });


	$('.add_new_course').click(function(){
        $('.add_new_course').text("Submit");
        var track = $('#track').val();
        var strand = $('#strand').val();
        var totalno = parseInt($('.totalno').text()) +1;

        //alert(parseInt(totalno) + 1);
        $.ajax({
            url: base_url + 'adminpage/addCourse',
            type: 'post',
            dataType: 'json',
            data:{
                'track':track,
                'strand':strand
            },
            success: function(response){
                if (response.status == "error"){
                    render_response('.add_course_warning','danger',response.msg);
                }
                else{
                  $('.add_new_course').prop("disabled", true);
                  $('.add_course_warning').empty();
                  $('.add_new_course').text("Loading");
                  setTimeout(function(){
                      $('#add_course_form').fadeOut(200,function(){
                        $('#add_course_form').modal('hide');

                        $('.add_new_course').prop("disabled", false);
                        
                          $('#track').val("");
                          $('#strand').val("");

                          var newrow = $('<tr class="row-'+response.data.id+'"><td >'+totalno+'</td><td><p style="color:black">'
                            +response.data.course_name+'</p></td><td><center><a title="Edit" data-toggle="tooltip"  class="btn btn-success btn-sm " href="'+base_url+'course/'+response.data.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>&nbsp;'
                            +'<button title="Remove" data-toggle="tooltip" class="btn btn-danger removed_course btn-sm" id="'+response.data.id+'"  ><i class="fa fa-times" aria-hidden="true" id="'+response.data.id+'"></i></button></center></td></tr>');
                          $('#example').append(newrow);
                          $('.totalno').text(totalno);
                          $.toast({
                              text: 'New course is available.',
                              position: 'bottom-center',
                              loaderBg: '#ff6849',
                              icon: 'success',
                              hideAfter: 2000,
                              stack: 6
                          });
                     });
                  },2000)
                  
                }
            }
        })

	});
    $(document).on('click', '.removed_course', function(e){
      var id = e.target.id;
       $('#'+id).prop("disabled", true);
       var totalno = parseInt($('.totalno').text()) +1;
      $.ajax({
          type: "POST",
          url: base_url + 'adminpage/removeCourse',
          dataType: "json",
          data:{
              'id':id,
          },  
          success: function(response){
              if (response.status == "success") {
                $.toast({
                    text: 'Course has been removed.',
                    position: 'bottom-center',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    stack: 6
                });
                $('.updateBtn'+id).prop("disabled", true);
                $(this).prop("disabled", true);
                setTimeout(function(){
                    $('.row-'+id).hide("slow");
                    $('.totalno').text(parseInt($('.totalno').text()) -1);
                  }, 1000);
              }
          }
      })
    });


    $(document).on('click', '.updateBtn',function(e){
      var id = e.target.id;
      $.ajax({
        type:"post",
        url : base_url + 'adminpage/updateCourse',
        dataType: 'json',
        data:{
          'id': id
        },
        success: function(response){
          if (response.status == "success") {
            window.location = base_url +'courseUpdate';
          }
          
        }
      })
    })

	function render_response(container,status,message){
	    $(container).empty();
	    var div = $('<div class="alert alert-'+status+'" >'+message+ '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
	    $(container).append(div);
	}

})