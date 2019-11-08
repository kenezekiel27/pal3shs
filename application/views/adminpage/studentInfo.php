<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">

	<!-- page content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Student Information</h4>
				</div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button class="btn btn-success">Personal Information</button>
						<button class="btn btn-success">Address</button>
						<button class="btn btn-success">Guardian Information</button>
						<button class="btn btn-success">Educational Background</button>
						<hr>
						<div class="Academic_info form-material">
							<?php $key ?>
								<?php 
									$course="";
									$acad_level="";
									$semester="";
									$year_from="";
									$year_to="";
									$new = json_decode($student_info['acad_level'],true);
									foreach ($new as $key => $value2) {
										$course=$value2['course'];
										$acad_level=$value2['acad_level'];
										$semester=$value2['semester'];
										$year_from=$value2['yearfrom'];
										$year_to=$value2['yearto'];
									}
									// foreach ($student_info as $value) {
									// 	echo $value['acad_level'];
									// 	$new = json_decode($value['acad_level'],true);
									// 	// foreach ($new as $key => $value2) {
									// 	// 	$course=$value2->course;
									// 	// 	$acad_level=$value2['acad_level'];
									// 	// 	$semester=$value2['semester'];
									// 	// 	$year_from=$value2['yearfrom'];
									// 	// 	$year_to=$value2['yearto'];
									// 	// }
									// }
							 	?> 
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Course</label>
									<input type="text" class="form-control" value="<?php echo $course?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Academic Level</label>
									<input type="text" class="form-control" value="<?php echo $acad_level ?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Semester</label>
									<input type="text" class="form-control" value="<?php echo $semester ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic year from:</label>
									<input type="text" class="form-control" value="<?php echo $year_from ?>">
								</div>
								<div class="col-md-4 form-group">
									<label>to:</label>
									<input type="text" class="form-control" value="<?php echo $year_to ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of section 1 -->
		</div>
	</div>
	<!-- end of page content -->