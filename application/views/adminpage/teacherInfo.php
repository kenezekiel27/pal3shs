<br>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminpagestyles/css/adminpage.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- page content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title">Teacher Information</h4>
				</div>
			</div>
			<!-- section 1 -->
			<div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<button class="btn btn-success personalbtn">Personal Information</button>
						<button class="btn btn-success addressbtn">Address</button>
						<button class="btn btn-success guardianbtn">Guardian Information</button>
						<button class="btn btn-success educationalbtn">Educational Background</button>
						<hr>
						<!-- div for personal info -->
						<div class="form-material personal_information" style="display: block;">
							<?php $key ?>
								<?php 
									$lrn="";
									$lname="";
									$fname="";
									$mname="";
									$sex="";
									$bday="";
									$bplace="";
									$age="";
									$height="";
									$weight="";
									$language="";
									$religion="";
									$egroup="";
									$telephone="";
									$mobile="";
									$email="";
									$new = json_decode($teacher_info['personal_info'],true);
									foreach ($new as $key => $value1) {
										$lrn=$teacher_info['lrn'];
										$lname=$value1['lname'];
										$fname=$value1['fname'];
										$mname=$value1['mname'];
										$sex=$value1['sex'];
										$bday=$value1['bday'];
										$bplace=$value1['bplace'];
										$age=$value1['age'];
										$height=$value1['height'];
										$weight=$value1['weight'];
										$language=$value1['language'];
										$religion=$value1['religion'];
										$egroup=$value1['ethnic_group'];
										$telephone=$value1['telephone'];
										$mobile=$value1['mobile'];
										$email=$value1['email'];
										
									}
									
							 	?> 
							<h1>Personal Information</h1>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>LRN</label>
									<input type="text" class="form-control" value="<?php echo $lrn?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($lname)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>First Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($fname)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Middle Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($mname)?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Sex</label>
									<input type="text" class="form-control" value="<?php echo ucfirst($sex)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Birth Date</label>
									<input disabled type="text" class="form-control" value="<?php echo $bday?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Birth Place</label>
									<input type="text" class="form-control" value="<?php echo $bplace?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Age</label>
									<input type="text" class="form-control" value="<?php echo $age?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Height</label>
									<input type="text" class="form-control" value="<?php echo $height?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Weight</label>
									<input type="text" class="form-control" value="<?php echo $weight?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>Language</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($language)?>">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Religion</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($religion)?>">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Ethnic Group</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($egroup)?>">
		 						</div>	
							</div>
							<div class="row">
		 						<div class="col-md-4 form-group">
		 							<label>Telephone Number</label>
		 							<input type="text" class="form-control" value="<?php echo $telephone?>">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Mobile Number</label>
		 							<input type="text" class="form-control" value="<?php echo $mobile?>">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Email Address</label>
		 							<input type="email" class="form-control" value="<?php echo $email?>">
		 						</div>
		 					</div>
						</div>
						<!-- end of personal info -->
						<!-- Address -->
						<div class="form-material address" style="display: none;">
							<?php $key ?>
								<?php 
									$brgy="";
									$municipality="";
									$province="";
									$new = json_decode($teacher_info['address'],true);
									foreach ($new as $key => $value2) {
										
										$brgy=$value2['brgy'];
										$municipality=$value2['municipality'];
										$province=$value2['province'];
									}
									
							 	?> 
							<h1>Teacher's Address</h1>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($brgy)?>">
		 						</div>
		 						<div class="col-md-4">
		 							<label>Municipality</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($municipality)?>">
		 						</div>
		 						<div class="col-md-4">
		 							<label>Province</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($province)?>">
		 						</div>
							</div>
						</div>
						<!-- end of Address -->
						<!-- guardian information -->
						<div class="form-material guardian_info" style="display: none;">
							<?php $key ?>
								<?php 
									$g_lname="";
									$g_fname="";
									$g_mname="";
									$g_relation="";
									$g_contact="";
									$g_brgy="";
									$g_municipality="";
									$g_province="";
									$new = json_decode($teacher_info['guardian_info'],true);
									foreach ($new as $key => $value3) {
										$g_lname=$value3['g_lname'];
										$g_fname=$value3['g_fname'];
										$g_mname=$value3['g_mname'];
										$g_relation=$value3['g_relationship'];
										$g_contact=$value3['g_contact'];
										$g_brgy=$value3['g_brgy'];
										$g_municipality=$value3['g_municipality'];
										$g_province=$value3['g_province'];
									}
									
							 	?> 
							<h1>Guardian Information</h1>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_lname)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>first Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_fname)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Middle Name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($g_mname)?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Relationship</label>
									<input type="text" class="form-control" value="<?php echo ucfirst($g_relation)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Contact Number</label>
									<input type="text" class="form-control" value="<?php echo $g_contact?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
		 							<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($g_brgy)?>">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Municipality</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($g_municipality)?>">
		 						</div>
		 						<div class="col-md-4 form-group">
		 							<label>Province</label>
		 							<input type="text" class="form-control" value="<?php echo ucwords($g_province)?>">
		 						</div>
							</div>		
						</div>
						<!-- end of guardian information -->
						<!-- educational background -->
						<div class="form-material educational_background" style="display: none;">
							<?php $key ?>
								<?php 
									$school="";
									$degree="";
									$course="";
									$s_brgy="";
									$s_municipality="";
									$s_province="";
									$s_yearfrom="";
									$s_yearto="";
									

									$new = json_decode($teacher_info['education'],true);
									foreach ($new as $key => $value4) {
										$school=$value4['school_name'];
										$degree=$value4['degree'];
										$course=$value4['course'];
										$s_brgy=$value4['s_brgy'];
										$s_municipality=$value4['s_municipality'];
										$s_province=$value4['s_province'];
										$s_yearfrom=$value4['year_from'];
										$s_yearto=$value4['year_to'];
					
									}
									
							 	?> 
							<h1>Educational Background</h1>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>School name</label>
									<input type="text" class="form-control" value="<?php echo ucwords($school)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Degree</label>
									<input type="text" class="form-control" value="<?php echo ucwords($degree)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Course</label>
									<input type="text" class="form-control" value="<?php echo ucwords($course)?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>House#/Street/Blk/Lot/Subdivision/Brgy</label>
									<input type="text" class="form-control" value="<?php echo ucwords($s_brgy)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Municipality</label>
									<input type="text" class="form-control" value="<?php echo ucwords($s_municipality)?>">
								</div>
								<div class="col-md-4 form-group">
									<label>Province</label>
									<input type="text" class="form-control" value="<?php echo ucwords($s_province)?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Academic year from</label>
									<input type="text" class="form-control" value="<?php echo $s_yearfrom?>">
								</div>
								<div class="col-md-4 form-group">
									<label>to</label>
									<input type="text" class="form-control" value="<?php echo $s_yearto?>">
								</div>
							</div>
						</div>
						<!-- end of educational background -->
					</div>
				</div>
			</div>
			<!-- end of section 1 -->
		</div>
	</div>
	<!-- end of page content -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.personal_information :input').prop("readonly", true);
			$('.address :input').prop("readonly", true);
			$('.guardian_info :input').prop("readonly", true);
			$('.educational_background :input').prop("readonly", true);

	        $('.personalbtn').click(function(){
	        	$('.Academic_info').show();
	            $('.personal_information').show();
				$('.address').hide();
				$('.guardian_info').hide();
				$('.educational_background').hide();

				
	        });
	        $('.addressbtn').click(function(){
	        	$('.Academic_info').hide();
	            $('.personal_information').hide();
				$('.address').show();
				$('.guardian_info').hide();
				$('.educational_background').hide();
	        });
	        $('.guardianbtn').click(function(){
	        	$('.Academic_info').hide();
	            $('.personal_information').hide();
				$('.address').hide();
				$('.guardian_info').show();
				$('.educational_background').hide();
	        });
	        $('.educationalbtn').click(function(){
	        	$('.Academic_info').hide();
	            $('.personal_information').hide();
				$('.address').hide();
				$('.guardian_info').hide();
				$('.educational_background').show();
	        });
	    });
	</script>