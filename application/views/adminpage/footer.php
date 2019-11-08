	<!-- Footer -->
	<footer class="footer text-center">
		<script>document.write(new Date().getFullYear());</script> All rights reserved | Paliparan III Senior High School</p>
	</footer>

	<script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/dashboard1.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/studentInfoJS.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/addSubjectJS.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/addCourseJS.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/updateCourse.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/remove_subject.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/subjectData.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminpagestyles/js/addSection.js"></script>


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
   
    

    <script type="text/javascript">
        $(document).ready(function() {
            $('.subjects').select2();
            $('.removesubjects').select2();
            //$('.allcourse').select2();
            $('.importyearlevel').select2();
            $('.importsem').select2();
            $('.teachers').select2();
            $('.removeteachers').select2();
            $('.openCourse').select2();

            $('#example').DataTable();
            $('#example1').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();
        } );
    </script>
    <script>
        var base_url = '<?php echo base_url() ?>';
        function render_response(container,status,message){
            $(container).empty();
            var div = $('<div class="alert alert-'+status+'" >'+message+ '<a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a></div>');
            $(container).append(div);

        }
        
    </script>

    